import { registerFormatType, toggleFormat } from '@wordpress/rich-text';
import { BlockControls } from '@wordpress/block-editor';
import { ToolbarGroup, ToolbarButton } from '@wordpress/components';
import { useSelect } from '@wordpress/data';

const BorderedSpanToolbarButton = ({ isActive, onChange, value }) => {
	const selectedBlock = useSelect((select) =>
		select('core/block-editor').getSelectedBlock()
	);
	console.log(selectedBlock);
	if (selectedBlock && selectedBlock.name !== 'core/heading') {
		console.log(selectedBlock.name);
		return null;
	}

	return (
		<BlockControls>
			<ToolbarGroup>
				<ToolbarButton
					icon="editor-code"
					title="Span"
					onClick={() => {
						onChange(
							toggleFormat(value, {
								type: 'camalote-blocks/heading-bordered-span-format',
							})
						);
					}}
					isActive={isActive}
				/>
			</ToolbarGroup>
		</BlockControls>
	);
};

registerFormatType('camalote-blocks/heading-bordered-span-format', {
	title: 'Span',
	tagName: 'span',
	className: 'is-format-bordered-span',
	edit: BorderedSpanToolbarButton,
});
