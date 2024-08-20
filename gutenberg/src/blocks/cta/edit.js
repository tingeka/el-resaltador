/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';
/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';

import {
	Panel,
	PanelBody,
	SelectControl,
	Placeholder,
} from '@wordpress/components';

import { CtaSuscribirse } from './components';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
const useState = wp.element.useState;

export default function Edit({ attributes, setAttributes, isSelected }) {
	const { type } = attributes;
	console.log(type);
	console.log(attributes);
	const blockProps = useBlockProps();

	return (
		<>
			<InspectorControls>
				<Panel>
					<PanelBody
						title={__('CTA - Suscribirse', 'el-resaltador')}
						icon="admin-plugins"
					>
						<SelectControl
							label={__('Tipo de CTA', 'el-resaltador')}
							help={__(
								'Este campo sirve para elegir el tipo de CTA: claro u oscuro.',
								'el-resaltador'
							)}
							onChange={(type) => setAttributes({ type })}
							value={type}
							options={[
								{
									label: __('Claro', 'el-resaltador'),
									value: 'light',
								},
								{
									label: __('Oscuro', 'el-resaltador'),
									value: 'dark',
								},
							]}
						/>
					</PanelBody>
				</Panel>
			</InspectorControls>
			<div
				{...blockProps}
				className={`${blockProps.className} flex flex-col gap-4`}
			>
				{type === undefined ? (
					<Placeholder
						label={__('CTA - Suscribirse', 'el-resaltador')}
						instructions={__(
							'Añade el tipo de CTA que quieras',
							'el-resaltador'
						)}
					></Placeholder>
				) : (
					<CtaSuscribirse type={type} />
				)}
			</div>
		</>
	);
}
