<?php
include_once ('conexao.php');
$email = $_POST["f_email"];
$senha = $_POST["f_senha"];
$nome = $_POST["f_nome"];
$cpf = $_POST["f_cpf"];
$data_nascimento = $_POST["f_data_nascimento"];
$telefone = $_POST["f_telefone"];
$sexo = $_POST["f_sexo"];
$cep = $_POST["f_cep"];
$estado = $_POST["f_estado"];
$rua = $_POST["f_rua"];
$setor = $_POST["f_setor"];
$complemento = $_POST["f_complemento"];
$tipo_de_pessoa = $_POST["f_tipo_de_pessoa"];
//echo "nome: ".$nome."<br/> Senha: ".$senha. "<br/>cpf: ".$cpf."<br/> data Nascimento: ".$data_nascimento."<br/> telefone: ".$telefone."<br/> sexo: ". $sexo."<br/> email: ".$email."<br/> Tipo de Pessoa: ". $tipo_de_pessoa;

$inserindo_login = "INSERT INTO pessoa (nome_pessoa, sexo_pessoa, dt_nascimento_pessoa, cpf_pessoa, telefone, tipo_perfil_pessoa,  email_pessoa, senha_pessoa)
                                    VALUES ('$nome', '$sexo', '$data_nascimento', ' $cpf','$telefone', '$tipo_de_pessoa', '$email', '$senha')";
//    $msg_login=mysqli_query($conn, $criando_login);
$msg_login= mysqli_query($conn,$inserindo_login);

//    echo "Query do login: " . $msg_login . "\n";

$inserindo_endereco = "INSERT INTO endereco(cep, rua, estado, setor, complemento) VALUES ('$cep', '$rua', '$estado', '$setor','$complemento')";
$msg_endereco = mysqli_query($conn, $inserindo_endereco);

header('Location: ../html/agradecimentos.html');
?>
