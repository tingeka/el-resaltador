<?php 
    
    $single = $query->post_count <= 2;
    $single_class = $single ? 'md:col-span-2' : 'lg:col-span-1' 

?>

<div class="flex flex-col gap-4 md:gap-8 lg:flex-row <?php echo $single_class ?>">
    <div class="w-full lg:w-1/2 lg:max-w-64 rounded-md overflow-hidden">
        <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full'); ?>" alt="" class="wp-block-nota-de-tapa-post__featured_image m-0 aspect-video w-full h-full object-cover">
    </div>
    <div class="flex flex-col justify-center w-full lg:grow gap-2">
        <?php
            get_template_part( 'template-parts/post/post', 'header', [
                'category' => [
                    'a' => [
                        'classes' => 'text-background',
                    ],
                ],
                'title' => [
                    'content' => get_the_title(),
                    'tag'     => 'h2',
                    'classes' => 'text-2xl text-background',
                ]
            ] ); 
        ?>
        <?php 
            get_template_part( 
                'template-parts/post/post', 
                'footer',
                [
                    'wrapper' => [
                        'classes' => 'flex gap-2 text-sm',
                    ],
                    'author' => [
                        'id'              => get_the_author_meta( 'ID' ),
                        'classes'         => 'm-0 text-background/70',
                    ],
                    'date' => [
                        'classes' => 'text-background/70',
                    ]
                ] 
            );
        ?>
    </div>
</div>