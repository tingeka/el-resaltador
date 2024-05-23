<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<p <?php echo get_block_wrapper_attributes(); ?>>
	<?php esc_html_e( 'Camalote Blocks – hello from a dynamic block!', 'camalote-blocks' ); ?>
</p>

<?php var_dump ($attributes); ?>

<div class="flex flex-col-reverse gap-8 lg:flex-row py-16" <?php echo get_block_wrapper_attributes(); ?>>
	<div class="flex flex-col justify-center w-full lg:w-1/2 gap-2">
		<PostCategoryList class="wp-block-example-hero__categories m-0 p-0 list-none font-mono">
			<PostCategoryList.ListItem class="wp-block-example-hero__category p-0">
				<PostCategoryList.TermLink class="wp-block-example-hero__category-link text-foreground" />
			</PostCategoryList.ListItem>
		</PostCategoryList>
		<PostTitle tagName="h1" class="wp-block-nota-de-tapa-post__title m-0" />
		<PostExcerpt class="wp-block-nota-de-tapa-post__excerpt m-0 [&>p]:m-0 text-lg" />
		<div class="flex gap-2 text-sm">
			<PostDate class="wp-block-nota-de-tapa-post__date text-foreground/70" />
			<PostAuthor class="wp-block-example-hero__author" children={authorLinkTemplate} />
		</div>
	</div>
	<div class="w-full lg:w-1/2">
		<PostFeaturedImage class="wp-block-nota-de-tapa-post__featured_image m-0 aspect-video w-full h-full object-cover" />
	</div>
</div>