<?php
include_once ('conexao.php');
//$email = $_POST['email'];
//$senha = $_POST['senha'];
//echo "email: ".$email."<br/> Senha: ".$senha;

if(isset($_POST['entrar'])){
    $email_pessoa = mysqli_real_escape_string($conn, $_POST['email']);
    $senha_pessoa = mysqli_real_escape_string($conn, $_POST['senha']);

    if($email_pessoa!="" && $senha_pessoa!=""){
        $sql = "SELECT idpessoa FROM pessoa WHERE email_pessoa='$email_pessoa' and senha_pessoa='$senha_pessoa'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);
        if($count==1){
//                echo "deu certo";
            header('Location: ../html/perfil_usuario.html');

        }else{
            echo '<script type="text/javascript">window.location = "login_meu_rancho.html", alert("Email ou Senha está incorreto")</script>';
//
        }
    }
}



?>
