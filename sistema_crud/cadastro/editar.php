<?php

    session_start();

    if(!isset($_SESSION["usuarioId"])) {
        header("location: ../login/index.php");
    }
    
    require('../conexao.php');
    include('../componentes/header.php');
    $idUsuario = $_GET["id"];

    $sql = "SELECT * FROM tbl_pessoa WHERE cod_pessoa = $idUsuario";
    $resultado = mysqli_query($connection, $sql);
    $usuario = mysqli_fetch_array($resultado);
?>


    <div class="container">
        <hr>
        <div class="card">
            <div class="card-header">
                <h2>Edição</h2>
            </div>
            <div class="card-body">
                <form method="post" action="../acoes.php">
                    <input type="hidden" name="acao" value="editar">
                    <input type="hidden" name="idUsuario" value="<?=$idUsuario?>">
                    <input class="form-control" type="text" placeholder="<?php echo $usuario["nome"] ?>" value="<?php echo $usuario["nome"] ?>" name="nome" id="nome">
                    <br />
                    <input class="form-control" type="text" placeholder="<?php echo $usuario["sobrenome"] ?>" value="<?php echo $usuario["sobrenome"] ?>" name="sobrenome" id="sobrenome">
                    <br />
                    <input class="form-control" type="text" placeholder="<?php echo $usuario["email"] ?>" value="<?php echo $usuario["email"] ?>" name="email" id="email">
                    <br />
                    <input class="form-control" type="text" placeholder="<?php echo $usuario["celular"] ?>" value="<?php echo $usuario["celular"] ?>" name="celular" id="celular">
                    <br />
                    <button class="btn btn-success">EDITAR</button>
                </form>
            </div>
        </div>
    </div>


<?php
    include('../componentes/footer.php');
?>