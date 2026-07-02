<div class="container flex space-between">
    <?php if( have_rows('table') ): ?>
        <?php while( have_rows('table') ):
            the_row();
            $tier_title = get_sub_field("tier_title");
        ?>
            <div class="block-pricing">
                <div class="block-pricing__header">
                    <h2><?php echo $tier_title; ?></h2>
                </div>
                <?php if( have_rows('inclusions') ): ?>
                    <ul>
                        <?php while( have_rows('inclusions') ):
                            the_row();
                            $inclusions_line_item = get_sub_field("inclusions_line_item");
                        ?>
                            <li><?php echo $inclusions_line_item; ?></li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?> 
                <a href="/request-a-demo/" class="button button--green button--lg">Request More Info</a>
            </div>
        <?php endwhile; ?>
    <?php endif; ?> 
</div> 