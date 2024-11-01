<?php
/** Verificação de segurança */
if ( !function_exists( 'add_action' ) ) exit('Acesso negado.');

class Greebox_App
{
    //
    const api_endpoint = "https://greebox.app/integration/install/";
    const param_partnerId = "wpplugin";
    const param_partnerSecret = "A8g3AKdf8";
    const script_model = 'https://greebox.app/widget/wd/%s';

    //
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

        add_action('wp_head', array("Greebox_App", "load_script"));
    }

    /**
     * Retorna o script formatado com widgetId embutido
     */
    public static function load_script()
    {
        if ( ! self::IsLogged() ) echo '';

        echo wp_get_script_tag(
            array(
                'id'      => 'greebox-widget',
                'charset' => 'utf-8',
                'async'   => true,
                'defer'   => true,
                'src'     => sprintf( self::script_model, get_option( 'greebox_widget_id' ) )
            )
        );
    }

    /**
     * Verifica se existe login
     */
    public static function IsLogged()
    {
        return ( get_option( 'greebox_email' ) !== false &&
            get_option( 'greebox_widget_id' ) !== false );
    }

    /**
     * Logout
     */
    public static function Logout()
    {
        delete_option( 'greebox_email' );
        delete_option( 'greebox_widget_id' );
    }

    /**
     * Enviar requisição ao servidor.
     */
    public function SendRequest( &$message=false )
    {
        $params = [
            'name'          => sanitize_text_field( $_POST["name"] ),
            'email'         => sanitize_email( $_POST["email"] ),

            //There's really no way to safely sanitize a
            //password, due to the likelihood of the functions removing characters.
            //The backend API will handle this input appropriately.
            'password'      => $_POST["password"],

            'whatsapp'      => sanitize_text_field( $_POST["whatsapp"] ),
            'partnerId'     => self::param_partnerId,
            'partnerSecret' => self::param_partnerSecret
        ];

        $querystring = '?'.http_build_query( $params );

        $result = wp_remote_post( self::api_endpoint.$querystring, [
            'timeout' => 10,
            'sslverify' => false,
        ] );

        if ( is_wp_error( $result ) )
        {
            $message = get_error_message($result);
            return false;
        }

        /**
         * Corrigir retorno da API
         */
        $body = $this->FixAPIReturn($result['body']);
        $body = json_decode($body);

        /**
         * Retorno com erro
         */
        if ( !empty($body->message) )
        {
            $message = $body->message;
            return false;
        }

        /**
         * Retorno sem erro
         * Armazenar email e widgetid
         */
        if ( !empty($body->widget) )
        {
            update_option( 'greebox_email', $params["email"] );
            update_option( 'greebox_widget_id', $body->widget );
            return true;
        }

        return false;
    }

    /**
     * @param $string
     * @return array|string|string[]
     */
    public function FixAPIReturn( $string )
    {
        return str_replace( '﻿{', '{', $string );
    }

}
