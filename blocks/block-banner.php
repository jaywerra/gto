<?php
    $image = get_sub_field('background_image');
    $title = get_sub_field("title");
    $banner_subheadline = get_sub_field("banner_subheadline");
?>
<div class="<?php if (get_sub_field('banner_height')): ?>has-image<?php endif ?>">
    <?php if ($image) :?>
        <div class="block-banner__bgimage" style="background-image: url(<?php echo $image['url']?>);"></div>
    <?php endif; ?>
    <div class="container flex column justify-center height100 <?php if (get_sub_field('banner_height')): ?>block-banner--tall<?php endif ?>">
        <h1 class="block-banner__title">
            <?php echo $title; ?>
        </h1>
        <?php if ($banner_subheadline): ?>
            <div class="block-banner__copy">
                <?php echo $banner_subheadline;  ?>
                <?php 
                    $link = get_sub_field('button');
                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="block-banner__button button button--primary button--lg" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                        <?php echo esc_html( $link_title ); ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
