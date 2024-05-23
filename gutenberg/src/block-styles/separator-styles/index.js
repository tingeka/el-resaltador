import { registerBlockStyle } from '@wordpress/blocks';

wp.domReady( () => {
    registerBlockStyle( 'core/separator', {
        name: 'separator-gradient',
        label: 'Gradiente',
    } );
} );