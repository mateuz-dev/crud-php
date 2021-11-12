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
            $erros = validarCampos();

            if(count($erros) > 0){
                $_SESSION["erros"] = $erros;
                header("location: cadastro/");
            } else {
                $nome = $_POST["nome"];
                $sobrenome = $_POST["sobrenome"];
                $email = $_POST["email"];
                $celular = $_POST["celular"];
    
                $sql = "INSERT INTO tbl_pessoa (nome, sobrenome, email, celular) 
                VALUES ('$nome', '$sobrenome', '$email', '$celular')";
    
                $resultado = mysqli_query($connection, $sql);
    
                header("location: listagem/");
            }
            
        break;



        case "editar":
            # Recebendo os dados do Form
            $idUsuario = $_POST["idUsuario"];
            $nome = $_POST["nome"];
            $sobrenome = $_POST["sobrenome"];
            $email = $_POST["email"];
            $celular = $_POST["celular"];



            # Recuperando os dados do banco
            $sql = "SELECT * FROM tbl_pessoa WHERE cod_pessoa = $idUsuario";
            $resultado = mysqli_query($connection, $sql);
            $usuario = mysqli_fetch_array($resultado);

            # Dados do banco:
            $nomeOriginal = $usuario["nome"];
            $sobrenomeOriginal = $usuario["sobrenome"];
            $emailOriginal = $usuario["email"];
            $celularOriginal = $usuario["celular"];




            if($nome == "" || !isset($nome)){
                $nome = $nomeOriginal;
            }
            if($sobrenome == "" || !isset($sobrenome)){
                $sobrenome = $sobrenomeOriginal;
            }
            if($email == "" || !isset($email)){
                $email = $emailOriginal;
            }
            if($celular == "" || !isset($celular)){
                $celular = $celularOriginal;
            }

            $sql = "UPDATE tbl_pessoa SET
                    nome = '$nome',
                    sobrenome = '$sobrenome',
                    celular = '$celular',
                    email = '$email'
                    WHERE cod_pessoa = $idUsuario";

            $resultado = mysqli_query($connection, $sql);

            header("location: listagem/");

        break;



        case "deletar":
            $idUsuario = $_POST["idUsuario"];

            $sql = "DELETE FROM tbl_pessoa WHERE cod_pessoa = $idUsuario";

            $resultado = mysqli_query($connection, $sql);

            header("location: listagem/");

        break;


        
        default:
            echo "INDEFINIDO";
        
        break;

    }
?>