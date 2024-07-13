<?php
/**
 * Template part for CTA global component.
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
            'mode' => 'dark'
        ]
    );

    switch ($args['mode']):
        case 'dark':
            $container_classes = 'bg-foreground text-background';
            $span_border_color = 'border-background';
            $isologo = get_template_directory_uri() . '/assets/isologo_blanco.svg';
            break;
        default:
            $container_classes = 'bg-primary-50';
            $span_border_color = 'border-foreground';
            $isologo = get_template_directory_uri() . '/assets/isologo.svg';
            break;
    endswitch;

?>

<div class="flex py-16 p-4 rounded <?php echo $container_classes ?>">
    <div class="w-full flex flex-col items-start gap-4">
        <img src="<?php echo $isologo ?>" alt="Logo El Resaltador" />
        <p 
            class="text-2xl font-heading font-bold"
            >
            Apoya el periodismo 
            <span 
                class="p-1 border rounded <?php echo $span_border_color ?>"
                >
                autogestionado
            </span>
        </p>
        <a href="/suscribite" class="btn btn-primary">Apoyanos</a>
    </div>
</div>