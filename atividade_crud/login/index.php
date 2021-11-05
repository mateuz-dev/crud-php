<?php
    include('../componentes/header.php');
?>

    <div class="container-geral">
    
        <div class="container-form">
    
                <form action="processa_login.php" method="POST">
                    
                    <div class="form-group">
                        <label for="txt_usuario">USUÁRIO</label>
                        <input type="text" class="form-control" name="txt_usuario" id="txt_usuario">
                    </div>

                    <div class="form-group">
                        <label for="txt_senha">SENHA</label>
                        <input type="password" class="form-control" name="txt_senha" id="txt_senha">
                    </div>

                    <div class="form-group">
                      <button class="btn btn-primary" type="submit">LOGAR</button>
                    </div>

                </form>

            </div>

        </div>

    </div>

<?php
    include('../componentes/footer.php');
?>