<?php

//Theme Title
add_theme_support('title-tag');

//Thumbnail Image Area
add_theme_support( 'post-thumbnails', array('page', 'post'));
add_image_size( 'post-thumbnails', 970, 350, true );

//Except to 40 word

function shovick_excerpt_more($more){
    return '<br> <a class="" href="'. get_permalink( $post->ID).'">'.'Read More'.'</a>';
}
add_filter( 'shovick_excerpt_more', 'shovick_excerpt_more'  );

function shovick_excerpt_length($length){
    return 40;
}
add_filter( 'excerpt_length', 'shovick_excerpt_length', 999 );