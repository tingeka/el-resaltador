import { 
    PostContext, 
    PostTitle, 
    PostExcerpt, 
    PostFeaturedImage, 
    PostDate, 
    PostAuthor, 
    PostCategoryList } from '@10up/block-components';

export const PostsList = ({ selectedPosts }) => {
    return (
        <div className='grid grid-cols-1 lg:grid-cols-2 gap-8'>
            { selectedPosts.map( (post, i) => (
                    <>
                        <PostsListItem post={post} type={ i === 0 ? 'primary' : 'secondary' } />
                    </>
                )
            )}
        </div>
    )
}

const authorLinkTemplate = (postAuthor) => {
    return(
        <a href={postAuthor.link} className="wp-block-example-hero__author m-0 text-foreground/70">
            {postAuthor.name}
        </a>
    )
}

const PostsListItem = ({ post, type }) => {
    
    const width = type === 'primary'? 'w-full' : 'lg:w-1/2'

    return (
        <>
            <PostContext 
                key={post.uuid}
                postId={ post.id} 
                postType={post.type}
                isEditable={false}
            >
                <div className={`flex flex-col-reverse gap-8 lg:flex-row ${ type === 'primary' && 'lg:col-span-2' }`}>
                    <div className="flex flex-col justify-center w-full lg:w-1/2 gap-2">
                        <PostCategoryList className="wp-block-example-hero__categories m-0 p-0 list-none font-mono">
                            <PostCategoryList.ListItem className="wp-block-example-hero__category p-0">
                                <PostCategoryList.TermLink className="wp-block-example-hero__category-link text-foreground" />
                            </PostCategoryList.ListItem>
                        </PostCategoryList>
                        <PostTitle tagName={ type !== 'primary' ? 'h2' : 'h1' } className="wp-block-nota-de-tapa-post__title m-0" />
                        { type !== 'secondary' && <PostExcerpt className="wp-block-nota-de-tapa-post__excerpt m-0 [&>p]:m-0 text-lg" /> }
                        <div className="flex gap-2 text-sm">
                            <PostDate className="wp-block-nota-de-tapa-post__date text-foreground/70" />
                            <PostAuthor className="wp-block-example-hero__author" children={authorLinkTemplate} />
                        </div>
                    </div>
                    <div className="w-full lg:w-1/2">
                        <PostFeaturedImage className="wp-block-nota-de-tapa-post__featured_image m-0 aspect-video w-full h-full object-cover" />
                    </div>
                </div>
            </PostContext>
        </>
    )
}