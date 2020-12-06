<?php
include_once ('conexao.php');
//$email = $_POST['login'];
//$senha = $_POST['senha'];
//echo "email: ".$email."<br/> Senha: ".$senha;
//
//if(isset($_POST['entrar'])){
//    $email_pessoa = mysqli_real_escape_string($conn, $_POST['email']);
//    $senha_pessoa = mysqli_real_escape_string($conn, $_POST['senha']);
//
//    if($email_pessoa!="" && $senha_pessoa!=""){
//        $sql = "SELECT idpessoa FROM pessoa WHERE email_pessoa='$email_pessoa' and senha_pessoa='$senha_pessoa'";
//        $result = mysqli_query($conn, $sql);
//        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
//
//        $count = mysqli_num_rows($result);
//        if($count==1){
////                echo "deu certo";
//            header('Location: ../html/perfil_usuario.html');
//
//        }else{
//            echo '<script type="text/javascript"> alert("Email ou Senha está incorreto")</script>';
////
//        }
//    }
//}
//
//
//
session_start();
include_once ('conexao.php');

if(empty($_POST['email'])||empty($_POST['senha'])){
    header('Location: http://localhost/vacinei/');
    exit();
}

$email = mysqli_real_escape_string($conn,$_POST['email']);
$senha = mysqli_real_escape_string($conn,$_POST['senha']);

$query = "select id, email from pessoa where email='{$email}' and senha = '{$senha}'";

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);



if($row == 1){
    $_SESSION['email'] = $email;
    header('Location: perfil_user.php');

}else{
    header('Location: http://localhost/vacinei/');
    exit();
}

?>
