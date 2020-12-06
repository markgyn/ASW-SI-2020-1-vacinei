<?php
session_start();
error_reporting(1);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Perfil Agente</title>
    <link rel="stylesheet" type="text/css" href="../css/perfil_usuario.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.css">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="299120802998-evcs4l967da28bb128oki364hfuasjvd.apps.googleusercontent.com">
</head>
<body>






<div class="sidebar-container">
    <div class="sidebar-logo">
        Vacinei
    </div>
    <ul class="sidebar-navigation">
        <li class="header">Menu</li>
        <li>
            <a href="#">
                <i class="fa fa-home" aria-hidden="true"></i> Inicio
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-tachometer" aria-hidden="true"></i> Alterar Agenda
            </a>
        </li>

        <li>
            <a href="#">
                <i class="fa fa-cog" aria-hidden="true"></i> Cadastrar Vacina
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-cog" aria-hidden="true"></i> Cartão de Vacina
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-cog" aria-hidden="true"></i> Vacinas aplicada
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-cog" aria-hidden="true"></i> Local de aplicação
            </a>
        </li>

        <li>
            <a href="#">
                <i class="fa fa-info-circle" aria-hidden="true"></i> Configuração
            </a>
        </li>
        <li>
            <a href="../../index.php" onclick="signOut();">Sair</a>
            <script>
                function signOut() {
                    var auth2 = gapi.auth2.getAuthInstance();
                    auth2.signOut().then(function () {
                        console.log('User signed out.');
                    });
                }
            </script>
        </li>
    </ul>
</div>

<div class="content-container">

    <div class="container-fluid">

        <!-- Main component for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h1>Bem vindo Agente <?php echo $_SESSION['userName'] ? $_SESSION['userName'] : $_COOKIE['u_name'];

                ?></h1>
         s  <p>
                <a class="btn btn-lg btn-primary" href="#" role="button">Procurar Paciente &raquo;</a>
            </p>
        </div>

    </div>
</div>










</body>
</html>