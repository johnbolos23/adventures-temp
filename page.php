<?php 
defined( 'ABSPATH' ) || exit;

get_header();

if( have_rows('flexible_blocks') ){
    
    while( have_rows('flexible_blocks') ) : the_row();

        get_template_part( 'inc/flexible-blocks/' . get_row_layout() );

    endwhile;
    
}else{
    the_content();
}



get_footer(); 

?>