<?php
/** Verificação de segurança */
if ( !function_exists( 'add_action' ) ) exit('Acesso negado.');

class Greebox_Admin
{
    /**
     * @var bool
     */
    private static $initiated = false;

    /**
     * @return void
     */
    public static function init()
    {
        if ( ! self::$initiated )
        {
            self::init_hooks();
        }
    }

    /**
     * @return void
     */
    private static function init_hooks()
    {
        self::$initiated = true;

        add_action('admin_menu', array("Greebox_Admin", "create_menu"));
        add_action('admin_enqueue_scripts', array("Greebox_Admin", "load_resources"));
    }

    /**
     * @return void
     */
    public static function wpdocs_load_textdomain()
    {
        load_plugin_textdomain( 'wpdocs_textdomain', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
    }

    /**
     * @return void
     */
    public static function scfw_load_my_own_textdomain( $mofile, $domain )
    {
        if ( 'social-chat-for-wp' === $domain && false !== strpos( $mofile, WP_LANG_DIR . '/plugins/' ) )
        {
            $locale = apply_filters( 'plugin_locale', determine_locale(), $domain );
            $mofile = WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) . '/languages/' . $domain . '-' . $locale . '.mo';
        }
        return $mofile;
    }

    /**
     * @return void
     */
    public static function load_resources()
    {
        wp_register_style('normalize.css', plugins_url('view/css/normalize.css', __FILE__), [], GREEBOX_VERSION );
        wp_enqueue_style('normalize.css');

        wp_register_style('webflow.css', plugins_url('view/css/webflow.css', __FILE__), [], GREEBOX_VERSION );
        wp_enqueue_style('webflow.css');

        wp_register_style('login-page-sandbox.webflow.css', plugins_url('view/css/login-page-sandbox.webflow.css', __FILE__), [], GREEBOX_VERSION );
        wp_enqueue_style('login-page-sandbox.webflow.css');

        wp_register_script('webfont.js', plugins_url('view/js/webfont.js', __FILE__), [], GREEBOX_VERSION );
        wp_enqueue_script('webfont.js');
        wp_add_inline_script( 'webfont.js', 'WebFont.load({google: { families: ["Varela:400","Karla:regular,700","Manrope:300,regular,600","Rubik:300,regular,500,700,900"]}});' );

        wp_register_script('html5shiv.min.js', plugins_url('view/js/html5shiv.min.js', __FILE__), [], GREEBOX_VERSION );
        wp_enqueue_script('html5shiv.min.js');

        wp_register_script( 'grbx_no-dependency', '' );
        wp_enqueue_script( 'grbx_no-dependency' );
        wp_add_inline_script( 'grbx_no-dependency', '!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);' );

        wp_enqueue_script('jquery');

        wp_register_script('placeholders.min.js', plugins_url('view/js/placeholders.min.js', __FILE__), [], GREEBOX_VERSION );
        wp_enqueue_script('placeholders.min.js');

        wp_register_script('script_custom.js', plugins_url('view/js/script_custom.js', __FILE__), [], GREEBOX_VERSION );
        wp_enqueue_script('script_custom.js');

        wp_register_script('webflow.js', plugins_url('view/js/webflow.js', __FILE__), [], GREEBOX_VERSION );
        wp_enqueue_script('webflow.js');
    }

    /**
     * Menu
     */
    public static function create_menu()
    {
        $dir = plugin_dir_url(__FILE__);
        add_menu_page("greebox", "Social Chat for WP", "manage_options", "social-chat-for-wp/index.php", '', $dir . 'icon.png', 98);
    }
}