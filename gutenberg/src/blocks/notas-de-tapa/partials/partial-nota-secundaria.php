<?php 
    
    $single = $query->post_count <= 2;
    $single_class = $single ? 'md:col-span-2' : 'lg:col-span-1';

    get_template_part(
        'template-parts/post/content/content',
        'excerpt',
        [
            'container' => [
                'classes' => 'not-prose flex flex-col gap-4 md:gap-8 lg:flex-row ' . $single_class,
            ],
            'thumbnail' => [
                'container' => [
                    'classes' => 'w-full shrink-0 lg:w-64',
                ],
                'figure' => [
                    'classes' => 'rounded-md overflow-hidden'
                ],
                'link' => [
                    'classes' => 'flex w-full aspect-video'
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
                        'mode' => 'dark',
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
                        'classes' => 'text-2xl text-background',
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
                        'classes'   => 'm-0 text-background/70',
                    ],
                    'date' => [
                        'classes'   => 'm-0 text-background/70',
                    ]
                ]
            ]
        ]
    );
?>