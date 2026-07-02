<?php 
    $body = get_sub_field("body");
    $button_color = get_sub_field("button_color");
?>

<div class="container">
    <?php echo $body; ?>
    <?php
        $button = get_sub_field('button');
        
        if($button) :
    ?>
        <a href="<?php echo $button['url']; ?>" class="button button--<?php echo $button_color; ?> button--lg">
            <?php echo $button['title']?>
        </a>  
    <?php endif; ?>
</div>