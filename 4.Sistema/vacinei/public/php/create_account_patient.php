<?php
include_once ('conexao.php');
$email = $_POST["f_email"];
$senha = $_POST["f_senha"];
$name = $_POST["f_name"];
$cpf = $_POST["f_cpf"];
$data_nascimento = $_POST["f_data_nascimento"];
$telefone = $_POST["f_telefone"];
$sexo = $_POST["f_sexo"];
$raca = $_POST["f_raca"];
$nome_mae = $_POST["f_name_mae"];
$nome_pai = $_POST["f_name_pai"];
$cep = $_POST["f_cep"];
$uf = $_POST["f_uf"];
$rua = $_POST["f_rua"];
$setor = $_POST["f_setor"];
$complemento = $_POST["f_complemento"];
$tipo_pessoa = $_POST["f_tipo_pessoa"];
$local_nascimento = $_POST["f_local_nascimento"];
$cidade = $_POST["f_cidade"];
$alergia = $_POST["f_alergia"];
$sus = $_POST["f_sus"];
//echo "nome: ".$name."<br/> Senha: ".$senha. "<br/>cpf: ".$cpf."<br/> data Nascimento: ".$data_nascimento."<br/> telefone: ".$telefone."<br/> sexo: ". $sexo."<br/> email: ".$email."<br/> Tipo de Pessoa: ". $tipo_pessoa."<br/> sus: ".$sus;
//VALUES ('ismael',  'H', '02020623250', '1996/06/11', '65525500',  'leamsicarlos100@gmail.com', '123',  'redençãp','goias','goiania', 'universitario', 'rua 260', '74653205', '', 'neuzamar', 'geraldo', 'negra', '', 'Agente')";


$inserindo_login = "INSERT INTO pessoa (nome, sexo, cpf, data_nascimento, telefone, email,  senha, local_nascimento, estado, cidade, setor, rua, cep, alergia, nome_mae, nome_pai, raca, numero_sus, tipo_pessoa)
                                VALUES ('$name',  '$sexo', '$cpf', '1998-03-12', '$telefone',  '$email', '$senha',  '$local_nascimento','$uf','$cidade', '$setor', '$rua', '$cep', '$alergia', '$nome_mae', '$nome_pai', '$raca', '$sus', '$tipo_pessoa')";

$msg_login= mysqli_query($conn,$inserindo_login);


header('Location: perfil_user.php');



//header('Location: ../html/agradecimentos.html');

//$result_usuario = "SELECT * FROM pessoa WHERE tipo_pessoa= 'Paciente'";
//$resultado_usuario = mysqli_query($conn, $result_usuario);
////Econtrado usuario com esse e-mail
//if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
//    $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
//    $_SESSION['userName'] = $userName;
//    $resultado = 'perfil_user_patient.php';
//    echo $resultado;
//}else{//Nenhum usu�rio encontrado
//    header('Location: perfil_user.php');
//
//
//}

?>









