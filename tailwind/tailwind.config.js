// Set the Preflight flag based on the build target.
const includePreflight = 'editor' === process.env._TW_TARGET ? false : true;
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
	presets: [
		// Manage Tailwind Typography's configuration in a separate file.
		require('./tailwind-typography.config.js'),
	],
	content: [
		// Ensure changes to PHP files and `theme.json` trigger a rebuild.
		'./theme/**/*.php',
		'./gutenberg/**/**/*.js',
		'./gutenberg/**/**/**/*.js',
		'./node_modules/flowbite/**/*.js',
	],
	theme: {
		// Extend the default Tailwind theme.
		extend: {
			fontFamily: {
				sans: ['Arimo', ...defaultTheme.fontFamily.sans],
				heading: ['"Roc Grotesk"', ...defaultTheme.fontFamily.sans],
				mono: ['"IBM Plex Mono"', ...defaultTheme.fontFamily.mono],
			},
			screens: {
				xs: '480px',
			},
		},
	},
	corePlugins: {
		// Disable Preflight base styles in builds targeting the editor.
		preflight: includePreflight,
	},
	plugins: [
		// Add Tailwind Typography (via _tw fork).
		require('@_tw/typography'),

		// Extract colors and widths from `theme.json`.
		require('@_tw/themejson'),
		// Requires Flowbite
		require('flowbite/plugin'),

		// Uncomment below to add additional first-party Tailwind plugins.
		// require('@tailwindcss/forms'),
		// require('@tailwindcss/aspect-ratio'),
		// require('@tailwindcss/container-queries'),
	],
};
