<?php
session_start();

include_once("conexao.php");
$email = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_STRING);

$result_usuario = "SELECT * FROM pessoa WHERE email='$email' LIMIT 1";
$resultado_usuario = mysqli_query($conn, $result_usuario);
//Econtrado usuario com esse e-mail
if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
    $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
    $_SESSION['userName'] = $userName;
    $resultado = 'perfil_user.php';
    echo $resultado;
}else{//Nenhum usu�rio encontrado
    $resultado = 'erro';
    echo(json_encode($resultado));


}