<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Agendar Vacina</title>
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
            <a href="perfil_user.php">
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
            <h1>Agende sua Vacina</h1>
            <div class="area bg-transparent ">

                <div class="container">
                    <div class="row fonte-titulo-cadastro">
                        <h1>Agendar Vacina</h1>
                    </div>


                    <div>
                        <form>


                            <div class="form-row " >
                                <div class="form-group col-md-2">
                                    Data
                                    <input type="date" id="date"  class="form-control" name="f_date" required="required"  placeholder="CPF *"   />
                                </div>
                                <div class="form-group col-md-2.3">
                                    Horas
                                    <input type="time" id="horas"  class="form-control" name="f_horas" size="25"  style=" width: 200px;"required />
                                </div>

                                <div class="form-group col-md-2.3">
                                    Tipo de vadcinas
                                    <select id="tipo_vacina"  class="form-control"   name="f_vacina" style=" width: 250px;">
                                        <option selected>Vacina</option>
                                        <option value="assistente">Epatite B</option>
                                        <option value="gerente">Tétano </option>

                                    </select>
                                </div>



                            </div>










                        </form>
                    </div>
                </div>

            </div>


            <p>
                <a class="btn btn-lg btn-primary" href="#" role="button">Salvar &raquo;</a>
            </p>
        </div>

    </div>
</div>ss










</body>
</html>