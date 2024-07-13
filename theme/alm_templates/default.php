<li class="not-prose list-none m-0 mb-8">
<?php
get_template_part(
    'template-parts/post/content/content',
    'excerpt',
    [
        'container' => [
            'classes' => 'not-prose flex flex-col gap-4 md:gap-8 lg:flex-row',
        ],
        'thumbnail' => [
            'container' => [
                'classes' => 'w-full shrink-0 lg:w-1/2 lg:max-w-64 rounded-md overflow-hidden',
            ],
            'figure' => [
                'classes' => 'h-full'
            ],
            'link' => [
                'classes' => 'flex h-full w-full aspect-video'
            ],
            'image' => [
                'size' => 'large',
                'classes' => 'object-cover'
            ]
        ],
        'content' => [
            'container' => [
                'classes' => 'flex flex-col gap-4 w-full grow',
            ],
            'header' => [
                'category' => [
                    'mode' => 'light',
                    'display' => true,
                    'ul' => [
                        'classes' => '',
                    ],
                    'li' => [
                        'classes' => '',
                    ],
                    'a' => [
                        'classes' => '',
                    ],
                ],
                'title' => [
                    'content' => '',
                    'tag'     => 'h2',
                    'link'    => get_the_permalink(),
                    'classes' => 'text-2xl text-foreground',
                ],
            ],
            'body' => [
                'container' => [
                    'classes' => ''
                ],
                'excerpt' => [
                    'display' => false,
                    'content' => '',
                    'classes' => '',
                ],
            ],
            'footer' => [
                'container' => [
                    'classes'   => '',
                ],
                'author' => [
                    'classes'   => '',
                ],
                'date' => [
                    'classes'   => '',
                ]
            ]
        ]
    ]
);
?>
</li>