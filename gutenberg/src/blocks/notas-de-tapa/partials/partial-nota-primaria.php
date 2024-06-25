<div class="flex flex-col-reverse gap-4 md:gap-8 md:flex-row md:col-span-2">
    <div class="flex flex-col justify-center w-full lg:w-1/2 gap-2">
        <?php
            get_template_part( 'template-parts/post/post', 'header', [
                'category' => [
                    'a' => [
                        'classes' => 'text-background',
                    ],
                ],
                'title' => [
                    'content' => get_the_title(),
                    'tag'     => 'h1',
                    'link'    => get_the_permalink(),
                    'classes' => 'text-3xl text-background',
                ]
            ] ); 
        ?>
        <p class="m-0 text-lg">
            <?php echo get_the_excerpt(); ?>
        </p>
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
    <div class="w-full lg:w-1/2">
        <img 
            src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full'); ?>" 
            alt="" 
            class="m-0 aspect-video w-full h-full object-cover">
    </div>
</div>