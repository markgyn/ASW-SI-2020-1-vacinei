<?php
session_start();
?>
<html lang="pt-br">


<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.css">
    <title>Cadastro</title>
    <link href="style.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="style.css" >





    <script>
        //Verifica se CPF � v�lido
        function TestaCPF(strCPF) {
            var Soma, Resto, borda_original;
            Soma = 0;

            if (strCPF == "000.000.000-00"){
                document.getElementById("cpf").setCustomValidity('Invalid');
                return false;
            }

            for (i=1; i<=9; i++){
                Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
            }

            Resto = (Soma * 10) % 11;
            if ((Resto == 10) || (Resto == 11)){
                Resto = 0;
            }

            if (Resto != parseInt(strCPF.substring(9, 10))){
                document.getElementById("cpf").setCustomValidity('Invalid');
                return false;
            }

            Soma = 0;
            for (i = 1; i <= 10; i++){
                Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
            }

            Resto = (Soma * 10) % 11;
            if ((Resto == 10) || (Resto == 11)){
                Resto = 0;
            }

            if (Resto != parseInt(strCPF.substring(10, 11))){
                document.getElementById("cpf").setCustomValidity('Invalid');
                return false;
            }

            document.getElementById("cpf").setCustomValidity('');
            return true;
        }

    </script>


    </head>


<html>

<body>
    <div class="area bg-transparent ">

        <div class="container">
            <div class="row fonte-titulo-cadastro">
                <h1>Cadastro Agente de Saúde</h1>
            </div>

            <div>
                <form class="pure-form" name="f_cad2" method="post" action="create_account_patient.php">
                    <div class="form-group " >
                        <input type="text" class="form-control" name="f_name" id="nomeCompleto" placeholder="Nome Completo *" required/>
                    </div>
                    <div class="form-group " >
                        <input type="text" class="form-control" name="f_email" id="email" placeholder="email*" required/>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <input type="password" class="form-control" id="password"  placeholder="Senha *" required/>
                        </div>

                        <div  class="form-group col-md-2">
                            <input type="password" class="form-control" id="confirm_password" name="f_senha" placeholder="Confirmar Senha *" required/>
                        </div>

                    </div>




                    <div class="form-row " >
                        <div class="form-group col-md-2">
                            <input id="cpf"  class="form-control" name="f_cpf" required="required" pattern="[0-9]+$"  maxlength="11" size="25" placeholder="CPF *" onblur="TestaCPF(this.value)"   />
                        </div>
                        <div class="form-group col-md-2.3">
                            <input id="dataNascimento"  class="form-control" name="f_data_nascimento" size="25" placeholder="Data de Nascimento * " style=" width: 200px;"required />
                        </div>
                        <div class="form-group">
                            <select id="sexo"  class="form-control "  name="f_sexo" style=" width: 200px;">
                                <option selected>Sexo..</option>
                                <option value="H">H</option>
                                <option value="M">M</option>
                            </select>

                        </div>
                        <div class="form-group col-md-2.3">
                            <select id="cargo"  class="form-control"   name="f_raca" style=" width: 250px;">
                                <option selected>Raça</option>
                                <option value="branco">Branco</option>
                                <option value="negro">Negro</option>
                                <option value="pardo">Pardo</option>
                                <option value="amarelo">Amarelo</option>
                                <option value="indigena">Indígena</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" name="f_telefone" class="form-control" id="telefone"  placeholder="Telefone *" style=" width: 250px;" required/>
                        </div>

                    </div>


                    <div class="form-group " >
                        <input type="text" class="form-control" name="f_name_mae" id="nomeMae" placeholder="Nome Mãe *" required/>
                    </div>

                    <div class="form-group " >
                        <input type="text" class="form-control" name="f_name_pai" id="nomePai" placeholder="Nome Pai *" required/>
                    </div>



                    <div class="form-row"  id="cadastro_funcionario_row1">
                        <div class="form-group col-md-2">

                            <input type="text" name="f_cep" class="form-control" id="cep" placeholder="Cep * ">
                        </div>
                        <div class="form-group col-md-6">

                            <input name="f_cidade" id="cidade" type="text" class="form-control" id="inputCity" placeholder="Cidade * ">
                        </div>
                        <div class="form-group col-md-4">

                            <select name="f_uf" id="uf" class="form-control">
                                <option selected>Escolher...</option>
                                <option value="AC">AC</option>
                                <option value="AL">AL</option>
                                <option value="AP">AP</option>
                                <option value="AM">AM</option>
                                <option value="BA">BA</option>
                                <option value="CE">CE</option>
                                <option value="DF">DF</option>
                                <option value="ES">ES</option>
                                <option value="GO">GO</option>
                                <option value="MA">MA</option>
                                <option value="MS">MS</option>
                                <option value="MT">MT</option>
                                <option value="MG">MG</option>
                                <option value="PA">PA</option>
                                <option value="PB">PB</option>
                                <option value="PR">PR</option>
                                <option value="PE">PE</option>
                                <option value="PI">PI</option>
                                <option value="RJ">RJ</option>
                                <option value="RN">RN</option>
                                <option value="RS">RS</option>
                                <option value="RO">RO</option>
                                <option value="RR">RR</option>
                                <option value="SC">SC</option>
                                <option value="SP">SP</option>
                                <option value="SE">SE</option>
                                <option value="TO">TO</option>
                            </select>
                        </div>

                    </div>


                    <div class="form-row">
                        <div class="form-group " >
                            <input type="text" name="f_setor" style=" width: 400px;" class="form-control" id="bairro" placeholder="Setor *" required/>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" name="f_rua" style=" width: 710px;" class="form-control" id="logradouro" placeholder="Rua *" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="f_complemento" class="form-control" id="inputAddress2" placeholder="Complemento. Qd. Lt. N" required/>
                    </div>

                    <div class="form-group">
                        <input type="text" name="f_tipo_pessoa" class="form-control" id="tipo_pessoa" readonly value="Agente" required/>
                    </div>

                    <button type="submit" class="btn-dark botao  botao-submeter">Salvar</button>
                    <a href="../html/profile_register.html"> <button type="button" class="btn-dark botao  botao-submeter">Voltar</button></a><!--Submeter cadastro do funcion�rio-->
                </form>
            </div>
        </div>

    </div>
</body>

<script>
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
            c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    var xmlText = getCookie("userInfo");
    var parser = new DOMParser();
    xmlDoc = parser.parseFromString(xmlText, "text/xml");
    console.log(xmlDoc);
    document.querySelector("#nomeCompleto").value = xmlDoc.getElementsByTagName("name")[0].childNodes[0].nodeValue;
    document.querySelector("#email").value = xmlDoc.getElementsByTagName("email")[0].childNodes[0].nodeValue;
</script>

<script src="../js/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.com/libraries/popper.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap/bootstrap.js"></script>
<script src="../js/validar_cep.js"></script>
<script src="../js/confirm_password.js"></script>
<script src="../js/mascara.js"></script>

</html>