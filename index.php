<?php
/** Verificação de segurança */
if ( !function_exists( 'add_action' ) ) exit('Acesso negado.');

/** Instância da classe */
$greebox = new Greebox_App();

/** Variáveis de controle */
$message_success = null;
$message         = false;

/**
 * Analisar fluxo
 */
if ( strtoupper($_SERVER["REQUEST_METHOD"]) === "POST" && !empty($_POST["action"]) )
{
    if ( $_POST["action"]==="logout" )
    {
        $greebox->Logout();
    }

    if ( $_POST["action"]==="login" )
    {
        $message_success = $greebox->SendRequest( $message );
    }
}

/**
 * Exibir view apropriada
 */
if ( $greebox->IsLogged() )
{
    include 'view/index-logged.php';
    exit;
}

include 'view/index-not-logged.php';