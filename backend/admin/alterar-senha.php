<?php include_once 'include/header.php'; ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">

        <div class="main-panel">

          <div class="content-wrapper">
            
            <div class="page-header">
              <h3 class="page-title">Alterar senha</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="listagem-usuario.php">Utilizador</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Alterar senha </li>
                </ol>
              </nav>
            </div>

            <div class="row">
              
                
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Alterar senha</h4>
                    <hr> <br>
                    <form class="form-sample mt-2" method="POST" action="processar/atualizar-senha.php">
                      
                      <div class="row">

                        

                      
                        <div class="col-md-6 mb-2">

                          <div class="input-group mb-3">
                            <span class="input-group-text" desabled id="basic-addon1"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="cemail" value="<?php echo $email_user ?>" readonly class="form-control" placeholder="E-mail de acesso" aria-label="Username" aria-describedby="basic-addon1">
                          </div>

                        </div>

                        <input type="hidden" name="cid" value="<?php echo $id_usuario; ?>">

                        <div class="col-md-6 mb-2">

                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                            <input type="password" name="csenha" required class="form-control" placeholder="Nova senha" aria-label="Username" aria-describedby="basic-addon1">
                          </div>

                        </div>

                        <div class="col-sm-12 mt-4">
                        <button type="submit" name="btn-cadastrar" class="btn btn-primary"> <i class="fa fa-plus mr-2"></i> Salvar alterações</button>
                        </div>
                        
                      </div>
                      
                      
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
<?php include_once 'include/footer.php'; ?>

<?php include_once 'msg/msg_senha.php'; ?>