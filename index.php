
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>UniFi Hotspot</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Bruno Caldas">
    <meta name="layout" content="main"/>
    <link href="css/customize-template.css" type="text/css" media="screen, projection" rel="stylesheet" />
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
                        <form class="form-inline" action="autentication.php" method="post">

                            <legend class="lead">Usuário:</legend>
                            <span class="add-on" rel="tooltip" title="Username" data-placement="top"><i class="icon-envelope"></i></span>

                            <input class="chosen" id="ilogin" type="text" name="nlogin" value=""
                                   size="20" maxlength="" placeholder="Digite o Usuário" required>


                            <legend class="lead">Senha:</legend>

                            <input class="chosen" id="isenha" type="password" name="nsenha" value=""
                                   size="20" maxlength="" placeholder="Digite a Senha" required>


                            <div class="box-footer">
                                <button class="btn btn-primary" type="submit" name="nsubmit" id="isubmit">
                                    <i class="fa fa-check"></i>
                                    Entrar
                                </button>
                                <button class="btn btn-primary" type="reset">
                                    <i class="fa fa-times"></i>
                                    Limpar
                                </button>
                            </div>
                        </form>
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