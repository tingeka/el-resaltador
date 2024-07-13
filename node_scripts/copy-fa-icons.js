const fs = require('fs');
const path = require('path');

const themeDir = path.resolve(__dirname, '../theme');
const assetsDir = path.join(themeDir, 'assets', 'icons');

// Regex pattern for icons with format cmlt_er_fa_{type}_{name}
const iconPattern = /cmlt_er_fa_([^_]+)_([^'"\s]+)/g;

// Object to keep track of found icons
let foundIcons = {};

// Function to find icons in templates and handle copying if necessary
function findIconsInTemplates(dir) {
    try {
        const files = fs.readdirSync(dir);

        files.forEach(file => {
            const filePath = path.join(dir, file);
            const stats = fs.statSync(filePath);

            if (stats.isDirectory()) {
                findIconsInTemplates(filePath); // Recursive call for directories
            } else if (stats.isFile() && path.extname(filePath) === '.php') {
                const content = fs.readFileSync(filePath, 'utf8');
                
                // Match for icons with format cmlt_er_fa_{type}_{name}
                let iconMatch;
                while ((iconMatch = iconPattern.exec(content)) !== null) {
                    const type = iconMatch[1];
                    const name = iconMatch[2];
                    const iconPath = path.join(assetsDir, type, `${name}.svg`);
                    const sourcePath = path.join(__dirname, '../node_modules/@fortawesome/fontawesome-free/svgs', type, `${name}.svg`);

                    // Track found icons
                    if (!foundIcons[type]) {
                        foundIcons[type] = new Set();
                    }
                    foundIcons[type].add(name);

                    // Check if the icon file already exists
                    if (!fs.existsSync(iconPath)) {
                        // Create directory if it doesn't exist
                        const targetDir = path.join(assetsDir, type);
                        if (!fs.existsSync(targetDir)) {
                            fs.mkdirSync(targetDir, { recursive: true });
                        }
                        
                        // Copy the icon file from source to target
                        fs.copyFileSync(sourcePath, iconPath);
                        console.log(`Copied icon: ${name}.svg`);
                    } else {
                        console.log(`Icon ${name}.svg already exists. Skipping.`);
                    }
                }
            }
        });
    } catch (err) {
        console.error('Error reading directory:', err);
    }
}

// Function to remove unused icons
function removeUnusedIcons() {
    try {
        const types = fs.readdirSync(assetsDir);

        types.forEach(type => {
            const typeDir = path.join(assetsDir, type);
            const icons = fs.readdirSync(typeDir);

            icons.forEach(icon => {
                const iconName = path.basename(icon, '.svg');
                if (!foundIcons[type] || !foundIcons[type].has(iconName)) {
                    const iconPath = path.join(typeDir, icon);
                    fs.unlinkSync(iconPath);
                    console.log(`Removed unused icon: ${icon}`);
                }
            });
        });
    } catch (err) {
        console.error('Error removing unused icons:', err);
    }
}

// Run the initial scan and remove unused icons
findIconsInTemplates(themeDir);
removeUnusedIcons();
