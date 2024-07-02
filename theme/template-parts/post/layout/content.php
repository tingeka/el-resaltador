<?php
/**
 * Template part for displaying post content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

 ?>

<?php

$args = wp_parse_args(
    $args,
    []  
);

?>

<section class="flex flex-col xl:flex-row justify-between gap-4 xl:max-w-screen-2xl xl:mx-auto">
    <!--  Share column -->
    <div class="flex w-full max-w-xl mx-auto xl:max-w-72">
        <!-- Share column wrapper -->
        <div class="social-share__wrapper ">
            <!-- Share column content -->
            <?php echo do_shortcode('[scriptless heading=""]')?>
        </div>
    </div>
    
    <!--  Post Content column -->
    <div class="mx-auto relative">
        <!-- Post Content -->
        <div <?php cmlt_er_content_class( 'entry-content p-8 mt-8 mx-auto border-t xl:px-0' ); ?>>
            <?php the_content(); ?>
        </div>
    </div>
    <div class="w-full max-w-72 flex flex-col gap-8 mt-8">
        <!-- Right column content -->
        <?php
            get_template_part( 'template-parts/global/components/component', 'cta', [
                'mode' => 'light'
            ]) 
        ?>
    </div>
</section>