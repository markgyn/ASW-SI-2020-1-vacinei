<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Vacinei</title>

    <link rel="stylesheet" type="text/css" href="public/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="public/css/login.css">






    <script src="https://apis.google.com/js/platform.js" async defer></script>  <!--script da api do google-->
    <meta name="google-signin-client_id" content="380652886257-s90r79mrp41of2uun0arf24qic1bp92l.apps.googleusercontent.com"><!--identifica��o da conta vacinei no gmail -->






    <style type="text/css">
        .goog-te-banner-frame.skiptranslate{display:none!important;}
        body{top:0px!important;}
    </style>
</head>
<body>
<!--<div class="g-signin2" data-onsuccess="onSignIn"></div>-->

<form method="POST" action="public/php/login.php">

<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row"> <img src="public/img/logo.png" class="logo"> </div>

                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="public/img/vacinei.png" class="image"> </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <div class="row mb-4 px-3">
                        <h6 class="mb-0 mr-4 mt-2">Entrar com</h6>









                            <div class="g-signin2" data-onsuccess="onSignIn"> <div><img src="public/img/gmail.png" class="gmail"></div> </div><!--botao de login-->


                            <p id='msg'></p>
                            <script> /*pegando dados do gmail*/
                                function onSignIn(googleUser) {
                                    var profile = googleUser.getBasicProfile();
                                    var userID = profile.getId();
                                    var userName = profile.getName();
                                    var userPicture = profile.getImageUrl();
                                    var userEmail = profile.getEmail();

                                    var userToken = googleUser.getAuthResponse().id_token;

                                    document.cookie = "userInfo=" +
                                        "<user>" +
                                            "<name>" + userName + "</name>" +
                                            "<email>" + userEmail + "</email>" +
                                             // "<password>" + userPassword + "</password>" +
                                        "</user>" +
                                    ";path=/";

                                    document.getElementById('msg').innerHTML = userEmail;
                                    if(userEmail !== ''){
                                        var dados = {
                                            userID:userID,
                                            userName:userName,
                                            userPicture:userPicture,
                                            userEmail:userEmail,
                                            // userPassword: userPassword
                                        };
                                        $.post('public/php/valida.php', dados, function(retorna){
                                            if(retorna === '"erro"'){
                                                // var msg = "Usu�rio n�o encontrado com esse e-mail";
                                                // document.getElementById('msg').innerHTML = msg;

                                                window.location.href = "public/html/profile_register.html";

                                            }else{
                                                window.location.href = "/vacinei/public/php/" + retorna;
                                            }

                                        });
                                    }else{
                                        var msg = "Usuário não encontrado";
                                        document.getElementById('msg').innerHTML = msg;
                                    }
                                }
                            </script>












                        </div>
                    </div>
                    <div class="row px-3 mb-4">
                        <div class="line"></div> <small class="or text-center">OU</small>
                        <div class="line"></div>
                    </div>

                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Email </h6>
                        </label> <input class="mb-4" type="text" name="email" placeholder="Digite o seu Email"> </div>
                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Senha</h6>
                        </label> <input type="password" name="senha" placeholder="Senha"> </div>
                    <div class="row px-3 mb-4">
                        <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> </div> <a href="#" class="ml-auto mb-0 text-sm">Esqueceu a senha?</a>
                    </div>
<!--                    <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">Login</button> </div>-->

                <input type="submit" value="entrar" class="btn btn-lg btn-primary" id="entrar" name="entrar"><br>
                    <div class="row mb-4 px-3"> <small class="font-weight-bold">N?o tem conta? <a href="public/html/profile_register.html" class="text-danger ">Criar</a></small> </div>
                </div>
            </div>
        </div>

        <div class="bg-blue py-4">
            <!--            <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2019. All rights reserved.</small>-->
            <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
        </div>
    </div>
</div>
</div>



</form>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> <!--script da api do google-->

</body>
</html>