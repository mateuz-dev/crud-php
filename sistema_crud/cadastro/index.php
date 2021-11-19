<?php

    session_start();

    if(!isset($_SESSION["usuarioId"])) {
        header("location: ../login/index.php");
    }
    
    include('../componentes/header.php');
    
?>


    <div class="container">
        <hr>
        <div class="card">
            <div class="card-header">
                <h2>Cadastro</h2>
            </div>

            <ul>

                <?php
                if (isset($_SESSION["erros"])) {
                    foreach($_SESSION["erros"] as $erro){
                    echo "<li> $erro </li>";
                    }
                    unset($_SESSION["erros"]);
                }
                ?>

            </ul>

            <div class="card-body">
                <form method="POST" action="../acoes.php">
                    <input class="form-control" type="text" placeholder="Digite o nome" name="nome" id="nome">
                    <br />
                    <input class="form-control" type="text" placeholder="Digite o sobrenome" name="sobrenome" id="sobrenome">
                    <br />
                    <input class="form-control" type="text" placeholder="Digite o email" name="email" id="email">
                    <br />
                    <input class="form-control" type="text" placeholder="Digite celular" name="celular" id="celular">
                    <br />
                    <input type="hidden" name="acao" value="inserir">
                    <button class="btn btn-success">CADASTRAR</button>
                </form>
            </div>
        </div>
    </div>


<?php
    include('../componentes/footer.php');
?>