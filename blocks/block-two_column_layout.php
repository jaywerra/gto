<div class="container">
    <div class="block-two_column_layout__cols">
        <div class="block-two_column_layout__col">
            <?php if( have_rows('left_column') ): ?>
                <?php while( have_rows('left_column') ): the_row();
                    $left_column_layout = get_row_layout(); 
                ?>
                    <section class="block block-<?php echo $left_column_layout; ?>">
                        <?php get_template_part('blocks/block', $left_column_layout); ?>
                    </section>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="block-two_column_layout__col">
            <?php if( have_rows('right_column') ): ?>
                <?php while( have_rows('right_column') ): the_row();
                    $right_column_layout = get_row_layout(); 
                ?>
                    <section class="block block-<?php echo $right_column_layout; ?>">
                        <?php get_template_part('blocks/block', $right_column_layout); ?>
                    </section>
                <?php endwhile; ?>
            <?php endif; ?>            
        </div>
    </div>
</div>