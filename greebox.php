<?php
/*
Plugin Name: Social Chat for WP
Plugin URI: https://www.greebox.com.br/
Description: Customize e personalize o chat de WhatsApp e adicione no seu site em menos de 3 minutos. Combine WhatsApp, Instagram, chat e telefone em um botão só.
Version: 1.4
Author: Greebox
Author URI: mailto:ola@greebox.com.br?subject=Plugin Greebox - WordPress
Text Domain: social-chat-for-wp
Domain Path: /languages
License: GPL
*/

if ( !function_exists( 'add_action' ) )
{
    exit('Acesso negado.');
}

//
define( 'GREEBOX_TEXTDOMAIN', 'social-chat-for-wp' );
define( 'GREEBOX_VERSION', '1.4' );
define( 'GREEBOX_MINIMUM_WP_VERSION', '6.0.2' );
define( 'GREEBOX_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

//register_activation_hook( __FILE__, array( 'Greebox_App', 'plugin_activation' ) );
//register_deactivation_hook( __FILE__, array( 'Greebox_App', 'plugin_deactivation' ) );

require_once( GREEBOX_PLUGIN_DIR . 'class.greebox-app.php' );
require_once( GREEBOX_PLUGIN_DIR . 'class.greebox-admin.php' );

//
add_action( 'init', array( 'Greebox_App', 'init' ) );

if ( is_admin() )
{
    add_action('init', array('Greebox_Admin', 'init'));
}

//
add_action( 'init', array('Greebox_Admin', 'wpdocs_load_textdomain') );
add_filter( 'load_textdomain_mofile', array('Greebox_Admin', 'scfw_load_my_own_textdomain'), 10, 2 );
