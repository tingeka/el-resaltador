<?php
    get_template_part(
        'template-parts/post/content/content',
        'excerpt',
        [
            'container' => [
                'classes' => 'not-prose flex flex-col col-span-1 gap-4 lg:gap-8 lg:flex-row md:col-span-2',
            ],
            'thumbnail' => [
                'container' => [
                    'classes' => 'w-full lg:w-1/2 shrink-0',
                ],
                'figure' => [
                    'classes' => ''
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
                        'tag'     => '',
                        'link'    => get_the_permalink(),
                        'classes' => 'text-3xl text-background',
                    ],
                ],
                'body' => [
                    'container' => [
                        'classes' => ''
                    ],
                    'excerpt' => [
                        'display' => true,
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