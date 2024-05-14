/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from "@wordpress/i18n";

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from "@wordpress/block-editor";

import {
    Placeholder
} from "@wordpress/components";

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import "./editor.scss";

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
    PostCategoryList } from '@10up/block-components';


export default function Edit({ attributes, setAttributes, isSelected }) {

    const blockProps = useBlockProps();

    const [selectedPost, setSelectedPost] = useState( attributes.selectedPost || []	);

    const handlePostSelect = (selectedPost) => {
        setSelectedPost(selectedPost);
        setAttributes({ selectedPost })
    }

    const authorLinkTemplate = (postAuthor) => {
        return(
            <a href={postAuthor.link} className="wp-block-example-hero__author m-0 text-foreground/70">
                {postAuthor.name}
            </a>
        )
    }

	return (
        <div {...blockProps} className={`${blockProps.className} flex flex-col gap-4`}>
            <Placeholder 
                label={__('Nota de tapa', 'example')} 
                instructions={ 
                    selectedPost 
                    ? __('Haz click para cambiar una nota de tapa', 'example') 
                    : __('Haz click para elegir la nota de tapa', 'example') 
                }
            >
            {
                isSelected && (
                    <ContentPicker
                        onPickChange={ 
                            (pickedContent) => {
                                handlePostSelect(pickedContent);
                            } 
                        }
                        content={selectedPost}
                        mode="post"
                        singlePickedLabel=""
                        multiPickedLabel=""
                        contentTypes={ [ 'post', 'page' ] }
                    />
                )
            }
            </Placeholder>
            {
                selectedPost && selectedPost.length > 0 && (
                    <PostContext 
                        postId={ selectedPost[0].id} 
                        postType={selectedPost[0].type}
                        isEditable={false}
                    >
                        <div className="flex flex-col-reverse gap-8 lg:flex-row py-16">
                            <div className="flex flex-col justify-center w-full lg:w-1/2 gap-2">
                                <PostCategoryList className="wp-block-example-hero__categories m-0 p-0 list-none font-mono">
                                    <PostCategoryList.ListItem className="wp-block-example-hero__category p-0">
                                        <PostCategoryList.TermLink className="wp-block-example-hero__category-link text-foreground" />
                                    </PostCategoryList.ListItem>
                                </PostCategoryList>
                                <PostTitle tagName="h1" className="wp-block-nota-de-tapa-post__title m-0" />
                                <PostExcerpt className="wp-block-nota-de-tapa-post__excerpt m-0 [&>p]:m-0 text-lg" />
                                <div className="flex gap-2 text-sm">
                                    <PostDate className="wp-block-nota-de-tapa-post__date text-foreground/70" />
                                    <PostAuthor className="wp-block-example-hero__author" children={authorLinkTemplate} />
                                </div>
                            </div>
                            <div className="aspect-video w-full lg:w-1/2">
                                <PostFeaturedImage className="wp-block-nota-de-tapa-post__featured_image m-0 w-full h-full object-cover" />
                            </div>
                        </div>
                    </PostContext>
                )
            }
        </div>
    );
}