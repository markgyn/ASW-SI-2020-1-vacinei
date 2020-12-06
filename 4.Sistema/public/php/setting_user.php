<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Perfil</title>
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
                <i class="fa fa-cog" aria-hidden="true"></i> Informações
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
            <h1>Bem vindo <?php echo $_SESSION['userName']; ?></h1>
            <!--            <p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>-->
            <!--            <p>To see the difference between static and fixed top navbars, just scroll.</p>-->
            <p>
                <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">Agendar Vacina &raquo;</a>
            </p>
        </div>

    </div>
</div>ss










</body>
</html>