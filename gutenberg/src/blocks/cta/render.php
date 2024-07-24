<?php
/**
 * Block Render file
 *
 * This file is responsible for rendering the CTA block in the frontend.
 *
 * @package El_Resaltador
 * @subpackage Gutenberg
 * @since 1.0.0
 */

?>
<div class="not-prose">
<?php
$cmlt_er_blocks_cta_type = $attributes['type'];
get_template_part(
	'template-parts/global/components/component',
	'cta',
	array(
		'mode' => $cmlt_er_blocks_cta_type,
	)
);
?>
</div>