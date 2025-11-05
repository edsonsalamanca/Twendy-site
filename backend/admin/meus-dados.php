<?php include_once 'include/header.php'; ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">

        <div class="main-panel">

          <div class="content-wrapper">
            
            <div class="page-header">
              <h3 class="page-title">Meus Dados</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="listagem-usuario.php">Utilizador</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Meus dados </li>
                </ol>
              </nav>
            </div>

            <div class="row">
              
                
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Editar meus dados</h4>
                    <hr> <br>
                    <form class="form-sample mt-2" action="processar/atualizar-meus-dados.php" method="POST" enctype="multipart/form-data">
                      
                      <div class="row">

                        <div class="col-md-6 mb-2">

                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            <input type="text" name="cnome" value="<?php echo $nome_user; ?>" class="form-control" placeholder="Primeiro nome" aria-label="Username" aria-describedby="basic-addon1">
                          </div>

                        </div>

                        <div class="col-md-6 mb-2">

                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            <input type="text" name="csobrenome" value="<?php echo $sobrenome_user; ?>" class="form-control" placeholder="Sobrenome" aria-label="Username" aria-describedby="basic-addon1">
                          </div>

                        </div>

                        <div class="col-md-6 mb-2">

                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-upload"></i></span>
                            <input type="file" name="cfile" class="form-control" placeholder="Sobrenome" aria-label="Username" aria-describedby="basic-addon1">
                          </div>

                        </div>

                        <input type="hidden" name="cid" value="<?php echo $id_usuario; ?>">

                        <div class="col-md-6 mb-2">

                          <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">
                              <i class="fa fa-group"></i>
                            </label>
                            <select class="form-select" name="cperfil" id="inputGroupSelect01">
                              <option selected value="<?php echo $perfil_user; ?>"><?php echo $perfil_user; ?></option>
                              
                            </select>
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

<?php include_once 'msg/msg_config.php'; ?>