<?php
    session_start();
    require('conexao.php');
    
    function validarCampos(){
        $erros = [];
        
        if($_POST["nome"] == "" || !isset($_POST["nome"])){
            $erros[] = "O NOME é obrigatório";
        }
        
        if($_POST["sobrenome"] == "" || !isset($_POST["sobrenome"])){
            $erros[] = "O SOBRENOME é obrigatório";
        }
        
        if($_POST["email"] == "" || !isset($_POST["email"])){
            $erros[] = "O EMAIL é obrigatório";
        }

        if($_POST["celular"] == "" || !isset($_POST["celular"])){
            $erros[] = "O CELULAR é obrigatório";
        }

        return $erros;
    }


    switch($_POST["acao"]){

        case "inserir":
            $nome = $_POST["nome"];
            $sobrenome = $_POST["sobrenome"];
            $email = $_POST["email"];
            $celular = $_POST["celular"];

            $sql = "INSERT INTO tbl_pessoa (nome, sobrenome, email, celular) 
            VALUES ('$nome', '$sobrenome', '$email', '$celular')";

            $resultado = mysqli_query($connection, $sql);

            header("location: listagem/");

        break;



        case "editar":
            $idUsuario = $_POST["idUsuario"];
            $nome = $_POST["nome"];
            $sobrenome = $_POST["sobrenome"];
            $email = $_POST["email"];
            $celular = $_POST["celular"];

            $sql = "UPDATE tbl_pessoa SET
                    nome = '$nome',
                    sobrenome = '$sobrenome',
                    email = '$email',
                    celular = '$celular'
                    WHERE cod_pessoa = $idUsuario";

            $resultado = mysqli_query($connection, $sql);

            header("location: listagem/");

        break;



        case "deletar":
            
    }
?>