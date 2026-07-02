<div class="container">
    <?php if( have_rows('selling_block') ): ?>
        <div class="js-sellingblocks-slider">
            <div class="glide__track" data-glide-el="track">
                <div class="glide__slides">
                    <?php while( have_rows('selling_block') ):
                        the_row();
                        $title = get_sub_field("title");
                        $body = get_sub_field("body");
                    ?>
                        <div class="block-selling_blocks-block">
                            <div class="block-selling_blocks-image">
                                <?php
                                    $image = get_sub_field('thumbnail');
                                    $url = $image['url'];
                                ?>
                                <img src="<?php echo esc_url($url); ?>" alt="">
                            </div>
                            <div class="block-selling_blocks-body">
                                <h2 class="block-selling_blocks-title">
                                    <?php echo $title; ?>
                                </h2>
                                <div class="block-selling_blocks-copy">
                                    <?php echo $body; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                    <img src="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/static/img/icon-rightarrow-green.svg" alt=="" />
                </button>
            </div>
        </div>
    <?php endif; ?>
</div>