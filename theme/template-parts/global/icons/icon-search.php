<?php
/**
 * Template part for Icon Search
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

?>

<?php

$args = cmlt_er_recursive_parse_args(
    $args,
    [
        'classes' => 'fill-foreground'
    ]
);

$classes = cmlt_er_generate_attr_string( 
    [
    'class' => $args['classes']
    ] 
);

?>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 6.35 6.35"><path d="M4.962 5.292 3.481 3.81a1.435 1.435 0 0 1-.894.306c-.427 0-.789-.148-1.085-.444a1.477 1.477 0 0 1-.444-1.085c0-.427.148-.789.444-1.085a1.476 1.476 0 0 1 1.085-.444c.427 0 .789.148 1.085.444.296.296.444.658.444 1.085a1.435 1.435 0 0 1-.306.894l1.482 1.481zM2.587 3.645c.294 0 .544-.102.75-.308a1.02 1.02 0 0 0 .308-.75c0-.294-.103-.544-.308-.75a1.022 1.022 0 0 0-.75-.308c-.294 0-.544.102-.75.308a1.025 1.025 0 0 0-.308.75c0 .294.102.543.308.75.207.206.457.309.75.308z"/></svg>