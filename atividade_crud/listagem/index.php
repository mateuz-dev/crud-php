<?php
    include('../componentes/header.php');
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
            <tr>
                <th>1</th>
                <th>TESTE DE NOME</th>
                <th>TESTE DE SOBRENOME</th>
                <th>TESTE DE EMAIL</th>
                <th>TESTE DE CELULAR</th>
                <th>
                    <button class="btn btn-warning">Editar</button>

                    <form action="" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="">
                        <button class="btn btn-danger">Excluir</button>
                    </form>
                    
                </th>
            </tr>
    </tbody>

    </table>

</div>

<?php
    include('../componentes/footer.php');
?>