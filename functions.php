<?php
/*
*   My Theme Function
*/
//All Default theme function here
include_once("inc/default.php");


// Theme CSS and JQuery File calling
function shovick_css_js_file_calling(){
    wp_enqueue_style('shovick-style', get_stylesheet_uri());
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '5.3.3', 'all');
    wp_register_style('custom', get_template_directory_uri() . '/css/custom.css', array(), '1.0.0', 'all');
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('custom');

    //jQuery
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/css/bootstrap.js', array(), '5.3.3', 'all');
    wp_enqueue_script('main', get_template_directory_uri() . '/css/main.js', array(), '1.0.0', 'all');
}
add_action('wp_enqueue_scripts','shovick_css_js_file_calling');


//Google Fonts Enqueue
function shovick_add_goggle_fonts(){
    wp_enqueue_style('shovick_google_fonts', 'https://fonts.googleapis.com/css2?family=Kaisei+Decol&family=Oswald&display=swap', false);
}
add_action('wp_enqueue_scripts','shovick_add_goggle_fonts');


//Theme function
function shovick_customizer_register($wp_customize) {

    //Header Area Function
    $wp_customize->add_section('shovick_header_area', array(
        'title' => __('Header Area','shovickbarua'),
        'description'=> 'If you interested to update your header area, you can do it here.',
    ));

    $wp_customize->add_setting('shovick_logo', array(
        'default' => get_bloginfo('template_directory') . '/img/tubelight.jpg',
        // 'type' => 'theme_mod',
        // 'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'shovick_logo', array(
        'label' => 'Logo Upload',
        'description' => 'If you interested to change or update your logo you can do it',
        'setting' => 'shovick_logo',
        'section' => 'shovick_header_area',
    )));

    // Menu Position Option
    $wp_customize->add_section('shovick_menu_option', array(
        'title'=> __('Menu Position Option','shovickbarua'),
        'description'=> 'If you interested to update your header area, you can do it here.',
    )) ;
    $wp_customize->add_setting('shovick_menu_position', array(
        'default'=> 'right menu',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
    ) );
    $wp_customize->add_control('shovick_menu_position', array(
        'label' => 'Menu Position',
        'description' => 'Select your menu position',
        'setting' => 'shovick_menu_position',
        'section' => 'shovick_menu_option',
        'type'  => 'radio',
        'choices' => array(
            'left_menu' => 'Left Menu',
            'right_menu' => 'Right Menu',
            'center_menu' => 'Center Menu',
        ),
    ));   
     
    // Footer Option
    $wp_customize->add_section('shovick_footer_option', array(
        'title'=> __('Footer Option','shovickbarua'),
        'description'=> 'If you interested to update your header area, you can do it here.',
    )) ;
    $wp_customize->add_setting('shovick_copyright_section', array(
        'default'=> '&copy; Copyright 2024 | Shovick Barua',
        // 'type' => 'theme_mod',
        // 'capability' => 'edit_theme_options',
    ) );
    $wp_customize->add_control('shovick_copyright_section', array(
        'label' => 'Copyright Text',
        'description' => 'If need you can update your copyright text',
        'setting' => 'shovick_menu_position',
        'section' => 'shovick_menu_option',
    ));

}
add_action('customize_register','shovick_customizer_register');

//Menu Register
register_nav_menu( 'main_menu', __('Main menu', 'shovickbarua') );

// // Walker Menu Properties
// function shovick_nav_description($item_output, $item, $depth, $args) {
//     if(!empty($item->description)) {
//         $item_output = str_replace($args->link_after. '</a>', '<span class="walker_nav">' .$item->description .'</span>' . $args->link_after . '</a>', $item_output);
//     }
//     return $item_output;
// }
// add_filter('walker_nav_menu_start_el', 'shovick_nav_description',10,1);

