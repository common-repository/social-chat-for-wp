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
                <h1 class="login-head"><?php _e( "Crie o seu botão de WhatsApp", GREEBOX_TEXTDOMAIN ); ?></h1>
                <div class="subheading"><?php _e( "Complete as informações abaixo para instalar em seu site", GREEBOX_TEXTDOMAIN ); ?></div>
                <div class="subheading"><?php _e( "Você pode usar uma conta existente ou criar uma nova nesta tela!", GREEBOX_TEXTDOMAIN ); ?></div>
                <form method="post" action="<?php echo esc_url($_SERVER["REQUEST_URI"]); ?>" id="email-form" name="email-form" data-name="Email Form" ms-signup="true" class="simple-form" autocomplete="off">

                    <input type="hidden" name="action" value="login">

                    <div class="login-row">
                        <div class="field-wrapper first-name-wrapper">
                            <label for="name" class="login-label"><?php _e( "Nome", GREEBOX_TEXTDOMAIN ); ?></label>
                            <input type="text" class="login-field w-input" maxlength="256" name="name" data-name="name" placeholder="João Almeida" id="name" required="" value="<?php echo !empty($_POST["name"])?esc_attr($_POST["name"]):''; ?>">
                            <img src="<?php echo plugins_url("images/user.svg",__FILE__); ?>" loading="lazy" width="22" alt="user icon" class="icon-field">
                        </div>
                    </div>

                    <div class="login-row">
                        <div class="field-wrapper first-name-wrapper">
                            <label for="name" class="login-label"><?php _e( "Número Whatsapp (com ddd)", GREEBOX_TEXTDOMAIN ); ?></label>
                            <input type="number" class="login-field w-input" name="whatsapp" data-name="name" placeholder="(00) 00000-0000" id="whatsapp" required="" value="<?php echo !empty($_POST["whatsapp"])?esc_attr($_POST["whatsapp"]):''; ?>">
                            <img src="<?php echo plugins_url("images/ico_whatsapp.svg",__FILE__); ?>" loading="lazy" width="22" alt="user icon" class="icon-field">
                        </div>
                    </div>

                    <div class="field-wrapper">
                        <label for="email" class="login-label"><?php _e( "E-mail", GREEBOX_TEXTDOMAIN ); ?></label>
                        <input type="email" class="login-field w-input" maxlength="256" name="email" data-name="email" placeholder="joaoalmeida@minhaloja.com.br" id="email" required="" value="<?php echo !empty($_POST["email"])?esc_attr($_POST["email"]):''; ?>">
                        <img src="<?php echo plugins_url("images/at-sign.svg",__FILE__); ?>" loading="lazy" width="22" alt="at sign" class="icon-field at">
                    </div>

                    <div class="field-wrapper">
                        <label for="password" class="login-label"><?php _e( "Senha", GREEBOX_TEXTDOMAIN ); ?></label>
                        <input type="password" class="login-field letter-spacing pass-margin w-input" maxlength="256" name="password" data-name="password" placeholder="" id="password" required="" >
                        <img src="<?php echo plugins_url("images/lock.svg",__FILE__); ?>" loading="lazy" width="22" alt="lock icon" class="icon-field lock">
                    </div>

                    <div class="pass-info">
                        <?php _e( "Sua senha deve conter pelo menos 6 caracteres, 1 letra maiúscula e um número.", GREEBOX_TEXTDOMAIN ); ?>
                    </div>

                    <input id="continue-button" type="submit" value="Continuar" data-wait="" class="login-button w-button">
                    <input id="instaling2"  style="display: none;" type="submit" value="Instalando..." data-wait="" class="login-button w-button">

                    <div class="subheading">

                        <?php
                        $link = "https://greebox.app/panel/recovery";
                        $querystring = !empty($_POST["email"]) ? '?email='.esc_html($_POST["email"]) : '';
                        ?>

                        <a href="<?php echo esc_url( $link.$querystring ); ?>" target="_blank" class="login-page-link"><?php _e( "Esqueci minha senha😯" ); ?></a>

                    </div>

                    <div class="terms-text">Ao cadastrar, você concorda com os <a href="https://greebox.com.br/cookies.php" target="_blank" class="login-page-link">Termos</a> e <a href="https://greebox.com.br/cookies.php" target="_blank" class="login-page-link">Política de Privacidade</a></div>

                </form>

                <?php if ( $message_success === false ) : ?>
                <div class="error-message">
                    <div class="text-block"><?php echo esc_html($message); ?></div>
                </div>
                <?php endif; ?>

                <!--div class="error-message">
                    <div class="text-block">Sua senha deve conter pelo menos 6 caracteres, 1 letra maiúscula e um número.</div>
                </div-->

            </div>
        </div>
    </div>
</div>

</body>

</html>