<?php
    $heading = get_sub_field("section_heading");
?>

<div class="container">
    <div class="block-team_grid flex">
        <?php if( have_rows('team_member') ): ?>
            <h2 class="block-team_grid__header"><?php echo $heading; ?></h2>
            <?php while( have_rows('team_member') ): 
                the_row();
                $name = get_sub_field("name");
                $job_title = get_sub_field("job_title");
                $phone_number = get_sub_field("phone_number");
                $email = get_sub_field("email");
                $bio = get_sub_field("bio");
            ?>
                <div class="block-team_grid__member">
                    <div class="block-team_grid__headshot">
                        <?php $image = get_sub_field('headshot_image');
                            if( !empty( $image ) ): ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="block-team_grid__info">
                        <h3 class="block-team_grid__name">
                            <?php echo $name; ?>
                        </h3>
                        <h6 class="block-team_grid__jobtitle">
                            <?php echo $job_title; ?>
                        </h6>
                        <ul>
                            <li>
                                <?php echo $phone_number; ?>
                            </li>
                            <li>
                                <a href="mailto:<?php echo $email; ?>">
                                    <?php echo $email; ?>
                                </a>
                            </li>
                        </ul>
                        <div class="block-team_grid__bio">
                            <?php echo $bio; ?>
                        </div>
                    
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>        
    </div>
</div>