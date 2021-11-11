<?php
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
                    <a class="btn btn-danger" href="../acoes.php?cod_pessoa=<?php echo $usuario["cod_pessoa"].'name="acao"'.'value="deletar"'?>">Excluir</a>      
                </th>
            </tr>
        <?php
        }
        ?>
    </tbody>

    </table>

</div>


<?php
    include('../componentes/footer.php');
?>