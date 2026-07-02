<?php
/**
 * Functions which tie into Advanced Custom Fields
 *
 * @package gto
 */


function page_render_blocks(){
  if ( !function_exists( 'have_rows' ) ) return;
  
  while ( have_rows('page_blocks') ){ the_row(); 

    $mods = array();
    if(get_sub_field("top_padding")) $mods[] = "top-padding";
    if(get_sub_field("bottom_padding")) $mods[] = ("bottom-padding");
    if(get_sub_field("background_color") == 'blue') $mods[] = "bg--blue";
    if(get_sub_field("background_color") == 'green') $mods[] = "bg--green";
    if(get_sub_field("background_color") == 'grey') $mods[] = "bg--grey";
    if(get_sub_field("text_color") == 'light') $mods[] = ("light");

    $block_layout = get_row_layout(); 
    
    ?>
    <section class="block block-<?php echo $block_layout; ?> <?php echo implode(" ", $mods); ?>">
      <?php get_template_part('blocks/block', $block_layout); ?>
    </section>
    <?php
  }
}