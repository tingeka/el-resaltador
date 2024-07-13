<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<div class="not-prose">
<?php 
    $type = $attributes['type'];
    get_template_part(
        'template-parts/global/components/component',
        'cta',
        [
            'mode' => $type
        ]
    );
?>
</div>