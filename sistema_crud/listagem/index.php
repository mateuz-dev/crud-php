<?php

    session_start();

    if(!isset($_SESSION["usuarioId"])) {
        header("location: ../login/index.php");
    }

    require('../conexao.php');
    include('../componentes/header.php');
    $sql = "SELECT * FROM tbl_pessoa;";
    $resultado = mysqli_query($connection, $sql);

    // echo '<pre>';
    // var_dump($resultado);
    // echo '</pre>';
?>

<div class="container">

    <br/>
    
    <table class="table table-bordered">

    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>E-mail</th>
            <th>Celular</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        <?php
            while($usuario = mysqli_fetch_array($resultado)){
                $id = $usuario["cod_pessoa"];
                $nome = $usuario["nome"];
                $sobrenome = $usuario["sobrenome"];
                $email = $usuario["email"];
                $celular = $usuario["celular"];
        ?>
            <tr>
                <th><?php echo $id ?></th>
                <th><?php echo $nome ?></th>
                <th><?php echo $sobrenome ?></th>
                <th><?php echo $email ?></th>
                <th><?php echo $celular ?></th>
                <th>
                    <a class="btn btn-warning" href="../cadastro/editar.php?id=<?php echo $usuario["cod_pessoa"]?>">Editar</a>
                    <a class="btn btn-danger" onclick="deletar(<?php echo $id?>)">Excluir</a>

                    <form method="post" action="../acoes.php" id="formDeletar">
                        <input type="hidden" name="acao" value="deletar"/>
                        <input type="hidden" name="cod_pessoa" id="idUsuario" />
                    </form>
                </th>
            </tr>
        <?php
        }
        ?>
    </tbody>

    </table>


    <script lang="javascript">
        function deletar(idUsuario) {
            if (confirm("Tem certeza que deseja deletar este produto?")) {
                document.querySelector("#idUsuario").value = idUsuario;
                document.querySelector("#formDeletar").submit();
            }
        }
    </script>

</div>


<?php
    include('../componentes/footer.php');
?>