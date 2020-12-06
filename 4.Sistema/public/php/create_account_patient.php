<?php
try{
    error_reporting(0);
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
    $cidade = $_POST["f_cidade"];


    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "vacinei";

    $mysqli = new mysqli($servidor, $usuario, $senha, $dbname);

    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    echo "Comming to execute query\n";
    if($tipo_pessoa == 'Agente'){
        $inserindo_login = "INSERT INTO pessoa (nome, sexo, cpf, data_nascimento, telefone, email,  senha, estado, cidade, setor, rua, cep, raca,  tipo_pessoa)
                                VALUES ('$name',  '$sexo', '$cpf', '1998-03-12', '$telefone',  '$email', '$senha', '$uf','$cidade', '$setor', '$rua', '$cep', '$raca', '$tipo_pessoa')";
        if($result = $mysqli->query($inserindo_login)){
            echo "Success while executing query\n";
            setcookie("u_name", $name);
//        $result->close();
        }
        else{
            echo "Failure while executing query\n";
        }
        header('Location: perfil_user_agent.php');
    }else{
        $local_nascimento = $_POST["f_local_nascimento\n"];
        $alergia = $_POST["f_alergia"];
        $sus = $_POST["f_sus"];
        $inserindo_login = "INSERT INTO pessoa (nome, sexo, cpf, data_nascimento, telefone, email,  senha, local_nascimento, estado, cidade, setor, rua, cep, alergia, nome_mae, nome_pai, raca, numero_sus, tipo_pessoa)
                                VALUES ('$name',  '$sexo', '$cpf', '1998-03-12', '$telefone',  '$email', '$senha',  '$local_nascimento','$uf','$cidade', '$setor', '$rua', '$cep', '$alergia', '$nome_mae', '$nome_pai', '$raca', '$sus', '$tipo_pessoa')";

        if($result = $mysqli->query($inserindo_login)){
            echo "Success while executing query\n";
            setcookie("u_name", $name);
//        $result->close();
        }
        else{
            echo "Failure while executing query\n";
        }

        header('Location: perfil_user.php');
    }
}
catch (Exception $e){
    echo "Erro: ";
    echo $e;
}
finally{
    $mysqli->close();
}



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









