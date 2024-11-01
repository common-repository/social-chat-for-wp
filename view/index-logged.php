<?php
/** Verificação de segurança */
if ( !function_exists( 'add_action' ) ) exit('Acesso negado.');
?>
<!DOCTYPE html>
<html data-wf-page="62c2c9dc50086243d178a0f9" data-wf-site="62c2c9dc500862717578a0f6">
<head>
<style>
.login-field {
    position: relative;
    height: 50px;
    margin-bottom: 15px;
    padding: 8px 15px 7px 45px !important;
    border-style: solid;
    border-width: 0.3px;
    border-color: hsla(0, 0%, 61.2%, 0.4);
    border-radius: 12px;
    background-color: #fff;
    font-size: 15px;
}
.w-form-done, .w-form-fail {
    display: block !important;
}
</style>
</head>
<body class="body">
<div class="login-page-wrapper">
    <div class="login-box">
        <div class="login-section">
            <div class="login-container w-form"><img src="<?php echo plugins_url("images/greebox-logo-new.svg",__FILE__); ?>" alt="" class="login-image">

                <p><?php _e( "Logado como", GREEBOX_TEXTDOMAIN ); ?>: <?php echo esc_html(get_option('greebox_email'));?></p>

                <input id="btn-acessar-painel" type="button" value="Acessar Painel" data-wait="" class="login-button w-button">

                <form action="<?php echo esc_url($_SERVER["REQUEST_URI"]); ?>" method="post">
                    <input type="hidden" name="action" value="logout">
                    <input id="btn-logout" type="submit" value="Logout" data-wait="" class="login-button w-button" style="background-color: #272a2c;">
                </form>

                <script>
                    document.querySelector("input#btn-acessar-painel").onclick = function(){
                        window.open("https://greebox.app/panel/login.php?email=<?php echo esc_html(get_option('greebox_email'));?>","_blank");
                    };
                </script>

            </div>
        </div>
    </div>
</div>

</body>

</html>