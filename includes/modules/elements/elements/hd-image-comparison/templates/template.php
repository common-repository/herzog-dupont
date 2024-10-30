<?php

/* Herzog Dupont for YOOtheme Pro Copyright (C) 2020-2023 Thomas Weidlich GNU GPL v3 */

$uniqid = uniqid('hd-');

$el = $this->el('div');

// Image Before
$image_before = $this->el('image', [

    'class' => [
        'el-image-before',
        'uk-border-{image_border}',
        'uk-box-shadow-{image_box_shadow}',
    ],

    'src' => $props['image_before'],
    'alt' => $props['image_before_alt'],
    'loading' => $props['image_loading'] ? false : null,
    'width' => $props['image_width'],
    'height' => $props['image_height'],
    'focal_point' => $props['image_before_focal_point'],
    'thumbnail' => true,
]);

// Image After
$image_after = $this->el('image', [

    'class' => [
        'el-image-after',
        'uk-border-{image_border}',
        'uk-box-shadow-{image_box_shadow}',
    ],

    'src' => $props['image_after'],
    'alt' => $props['image_after_alt'],
    'loading' => $props['image_loading'] ? false : null,
    'width' => $props['image_width'],
    'height' => $props['image_height'],
    'focal_point' => $props['image_after_focal_point'],
    'thumbnail' => true,
]);

// Slider
$slider = $this->el('div', [

    'class' => [
        'hd-image-comparison-slider',
        'uk-text-{icon_color}',
        'uk-background-{slider_background}',
    ],

    'uk-icon' => [
        'icon: {icon};',
        'width: {icon_width}; height: {icon_width}',
    ],

    'data-start' => [
        '{slider_start}',
    ],

    'data-width' => [
        '{icon_width}',
    ],

    'data-onmousemove' => [
        '{slider_onmousemove}',
    ],

    'data-margin-remove' => [
        '{slider_margin_remove}',
    ],

]);

// Box decoration
$decoration = $this->el('div', [

    'class' => [
        'uk-box-shadow-bottom {@image_box_decoration: shadow}',
        'tm-mask-default {@image_box_decoration: mask}',
        'tm-box-decoration-{image_box_decoration: default|primary|secondary}',
        'tm-box-decoration-inverse {@image_box_decoration_inverse} {@image_box_decoration: default|primary|secondary}',
        'uk-inline {@!image_box_decoration: |shadow}',
    ],

]);

?>

<?php echo $el($props, $attrs) ?>

    <style>
    #<?php echo $uniqid ?> .hd-image-comparison-range::-webkit-slider-thumb {
        height: <?php echo $props['icon_width'] ?>px;
        width: <?php echo $props['icon_width'] ?>px;
    }
    #<?php echo $uniqid ?> .hd-image-comparison-range::-moz-range-thumb {
        height: <?php echo $props['icon_width'] ?>px;
        width: <?php echo $props['icon_width'] ?>px;
    }
    </style>

    <?php if ($props['image_before'] && $props['image_after']) : ?>
    <div id ="<?php echo $uniqid ?>" class="hd-image-comparison">
        <?php if ($props['image_box_decoration']) : ?>
        <?php echo $decoration($props) ?>
        <?php endif ?>
            <div class="hd-image-comparison-after">
                <?php if ($props['show_image_labels'] && $props['image_after_label']) : ?>
                <div class="hd-image-comparison-after-label"><?php echo $props['image_after_label'] ?></div>
                <?php endif ?>
                <?php echo $image_after($props) ?>
            </div>
            <div class="hd-image-comparison-before">
                <?php if ($props['show_image_labels'] && $props['image_before_label']) : ?>
                <div class="hd-image-comparison-before-label"><?php echo $props['image_before_label'] ?></div>
                <?php endif ?>
                <?php echo $image_before($props) ?>
            </div>
        <?php if ($props['image_box_decoration']) : ?>
        <?php echo $decoration->end() ?>
        <?php endif ?>
        <?php echo $slider($props) ?></div>
    </div>
    <?php elseif ($props['image_before']) : ?>
        <?php if ($props['image_box_decoration']) : ?>
        <?php echo $decoration($props, $image_before($props)) ?>
        <?php else : ?>
        <?php echo $image_before($props) ?>
        <?php endif ?>
    <?php elseif ($props['image_after']) : ?>
        <?php if ($props['image_box_decoration']) : ?>
        <?php echo $decoration($props, $image_after($props)) ?>
        <?php else : ?>
        <?php echo $image_after($props) ?>
        <?php endif ?>
    <?php endif ?>

</div>