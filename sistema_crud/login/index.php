<?php
    session_start();
?>

    <div class="container-geral">
    
        <div class="container-form">
    
                <form action="../processa_login.php" method="POST">
                    <input type="hidden" name="acao" value="login">
                    
                    <div class="form-group">
                        <label for="nomeUsuario">USUÁRIO</label>
                        <input type="text" class="form-control" name="nomeUsuario" id="nomeUsuario">
                    </div>

                    <div class="form-group">
                        <label for="senhaUsuario">SENHA</label>
                        <input type="password" class="form-control" name="senhaUsuario" id="senhaUsuario">
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