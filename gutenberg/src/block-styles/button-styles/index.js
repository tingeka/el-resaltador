import {
	registerBlockStyle,
	unregisterBlockStyle,
	unregisterBlockVariation,
} from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';

wp.domReady(() => {
	registerBlockStyle('core/button', {
		name: 'neutral',
		label: __('Neutral', 'el-resaltador'),
	});

	unregisterBlockStyle('core/button', 'default');
	unregisterBlockStyle('core/button', 'outline');
	unregisterBlockStyle('core/button', 'fill');
});
