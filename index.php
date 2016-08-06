<?php
require_once dirname(__FILE__) . '/class/CustomAuth.class.php';
$url = 'http://www.google.com.br';
$assets = 'css';
$auth = new CustomAuth($url, $assets);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>UniFi Hotspot</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Bruno Caldas">
    <meta name="layout" content="main"/>
    <?php $auth->addCss('customize-template');?>
</head>
<body>
<div id="body-container">
    <div id="body-content">

        <section class="nav nav-page">
            <div class="container">
                <div class="row">
                    <div class="span5">
                        <header class="page-header">
                            <div class="brand img-responsive">
                                <img src="">
                            </div>
                        </header>
                    </div>
                    <div class="span9">
                        <header class="page-header">
                            <h3>UniFi - Projeto<br/>
                                <small>LOGIN</small>
                            </h3>
                        </header>
                    </div>
                </div>
            </div>

        </section>

        <section class="page container">
            <div class="row">
                <div class="well well-small well-shadow">

                    <legend class="lead">Bem-vindo ao Hotspot UniFi. Por favor, efetue login no sistema para continuar.</legend>
                </div>
                <div class="span6"></div>
                <div class="span4 box well well-small well-shadow">
                    <div class="box-header">
                        <i class="fa fa-sign-in fa-2x icon-large"></i><h5>ACESSAR HOTSPOT</h5>
                    </div>
                    <div class="box-content">
                        <?php
                        require_once dirname(__FILE__).'/class/CustomAuth.class.php';
                        CustomAuth::authBox($_SERVER['PHP_SELF']);
                        ?>
                        <hr>
                        Caso não possua um login, cadastre-se nesse <a href="www.google.com.br" target="_blank">link</a>.
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>


<footer class="application-footer">
    <div class="container">
        <p>UniFi Hotspot</p>
        <div class="disclaimer">
            <p>HOSTSPOT Unifi</p>
            <p> Phormar. Todos os direitos Reservados. Copyright &copy 2016.</p>
        </div>
    </div>
</footer>
<script type="text/javascript">

    $(document).ready(function(){
        $('#ilogin').focus();
    })

</script>

</body>
</html>

<?php
if (isset($_POST['nlogin']) && isset($_POST['nsenha'])) {

    $username = $_POST['nlogin'];
    $pass = $_POST['nsenha'];

    $login = CustomAuth::authCheck($username, $pass);

    if ($login == true) {
        header('Location:' . $auth->url);
    } else {
        print '<script>';
        print "alert('Login não permitido')";
        print '</script>';
    }
}