<div class="container">
    <?php if( have_rows('button') ): ?>
        <?php while( have_rows('button') ): the_row(); ?>
            <?php if( have_rows('button_element') ): ?>
                <?php while( have_rows('button_element') ): the_row(); ?>
                    <?
                        $button = get_sub_field('button_link');
                    ?>
                    <?php if ( get_sub_field( 'button_color' ) ): ?>
                        <a href="<?php echo $button['url']; ?>" class="button button--primary button--lg">
                            <?php echo $button['title']; ?>
                        </a>
                        <?php else: ?>
                        <a href="<?php echo $button['url']; ?>" class="button button--green button--lg">
                            <?php echo $button['title']; ?>
                        </a>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?> 
</div>