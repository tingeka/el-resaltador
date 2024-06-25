<li class="flex flex-col sm:flex-row gap-4 mb-8 px-4 lg:flex-row">
    <div class="w-full sm:max-w-48 rounded-md overflow-hidden">
        <img 
            src="<?php echo  get_the_post_thumbnail_url( get_the_ID(), 'full'); ?>" 
            alt="" 
            class="m-0 object-cover aspect-video sm:aspect-square w-full sm:w-48">
    </div>
    <div class="flex flex-col justify-center w-full lg:flex-grow gap-2">
        <?php
            get_template_part( 
                'template-parts/post/post', 
                'header', 
                [
                    'category' => [
                        'a' => [
                            'classes' => 'text-foreground',
                        ],
                    ],
                    'title' => [
                        'content' => get_the_title(),
                        'tag'     => 'h2',
                        'classes' => 'text-2xl text-foreground',
                    ]
                ] 
            );
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
                        'classes'         => 'm-0 text-foreground/70',
                    ],
                    'date' => [
                        'classes' => 'text-foreground/70',
                    ]
                ]
            );
        ?>
    </div>
</li>