<?php
    session_start();
    require("conexao.php");



    function realizarLogin($nome, $senha, $connection){
        $sql = "SELECT * FROM tbl_pessoa WHERE nome = '$nome'";
        $resultado = mysqli_query($connection, $sql);
        $usuario = mysqli_fetch_array($resultado);

        // echo '<pre>';
        // var_dump($usuario);
        // echo '</pre>';

        if(isset($usuario["nome"]) && isset($usuario["senha"])){
            $_SESSION["usuarioSenha"] = $usuario["senha"];
            $_SESSION["usuarioNome"] = $usuario["nome"];
            header("location: listagem/");
        } else{
            header("location: login/");
        }

    }



    function verificarLogin(){}


    switch ($_POST["acao"]) {
        case 'login':
            $nome = $_POST["nomeUsuario"];
            $senha = $_POST["senhaUsuario"];
            realizarLogin($nome, $senha, $connection);
        break;



        case 'logout':
            session_unset();
            session_destroy();
            header("location: login/");
        break;
    }





?>