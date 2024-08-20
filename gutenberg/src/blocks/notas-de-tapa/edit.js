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
import { useBlockProps } from '@wordpress/block-editor';

import { Placeholder } from '@wordpress/components';

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

import {
	ContentPicker,
	PostContext,
	PostTitle,
	PostExcerpt,
	PostFeaturedImage,
	PostDate,
	PostAuthor,
	PostCategoryList,
} from '@10up/block-components';

import { PostsList } from './components';

export default function Edit({ attributes, setAttributes, isSelected }) {
	const blockProps = useBlockProps();

	const [selectedPosts, setSelectedPosts] = useState(
		attributes.selectedPosts || []
	);

	const handlePostSelect = (selectedPosts) => {
		setSelectedPosts(selectedPosts);
		setAttributes({ selectedPosts });
	};

	return (
		<div
			{...blockProps}
			className={`${blockProps.className} flex flex-col gap-4`}
		>
			<Placeholder
				label={__('Nota de tapa', 'example')}
				instructions={
					selectedPosts
						? __(
								'Haz click para cambiar una nota de tapa',
								'example'
							)
						: __('Haz click para elegir la nota de tapa', 'example')
				}
			>
				{isSelected && (
					<ContentPicker
						onPickChange={(pickedContent) => {
							handlePostSelect(pickedContent);
						}}
						content={selectedPosts}
						maxContentItems={3}
						mode="post"
						singlePickedLabel=""
						multiPickedLabel=""
						contentTypes={['post']}
					/>
				)}
			</Placeholder>
			{selectedPosts && selectedPosts.length > 0 && (
				<PostsList selectedPosts={selectedPosts} />
			)}
		</div>
	);
}
