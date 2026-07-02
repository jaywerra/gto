<div class="container flex space-between">
    <?php if( have_rows('package_item') ): ?>
        <?php while( have_rows('package_item') ):
            the_row();
            $title = get_sub_field("title");
        ?>
            <div class="block-packages__item bg--blue">
                <h2><?php echo $title; ?></h2>
                <?php 
                    $link = get_sub_field('button');
                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="button button--green" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                        <?php echo esc_html( $link_title ); ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?> 
</div>