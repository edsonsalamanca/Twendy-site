<?php include_once 'include/header.php'; ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">

        <div class="main-panel">

          <div class="content-wrapper">
            
            <div class="page-header">
              <h3 class="page-title">Novo utilizador</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="listagem-usuario.php">Listagem</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Novo utilizador </li>
                </ol>
              </nav>
            </div>

            <div class="row">
              
                
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Criar novo utilizador</h4>
                    <hr> <br>
                    <form class="form-sample mt-2" action="processar/inserir-usuario.php" method="POST" 
                    enctype="multipart/form-data">
                      
                      <div class="row">

                        <div class="col-md-6 mb-2">

                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            <input type="text" name="cnome" required class="form-control" placeholder="Primeiro nome" aria-label="Username" aria-describedby="basic-addon1">
                          </div>

                        </div>

                        <div class="col-md-6 mb-2">

                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            <input type="text" name="csobrenome" required class="form-control" placeholder="Sobrenome" aria-label="Username" aria-describedby="basic-addon1">
                          </div>

                        </div>

                        <div class="col-md-6 mb-2">

                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-upload"></i></span>
                            <input type="file" class="form-control" required  name="cfile" placeholder="Sobrenome" aria-label="Username" aria-describedby="basic-addon1">
                          </div>

                        </div>

                        <div class="col-md-6 mb-2">

                          <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">
                              <i class="fa fa-group"></i>
                            </label>
                            <select class="form-select" id="inputGroupSelect01" name="cperfil" required>
                              <option selected value="">Selecionar...</option>
                              <option value="Admin">Admin</option>
                              <option value="Atendente">Atendente</option>
                              
                            </select>
                          </div>

                        </div>

                        

                        <div class="col-md-6 mb-2">

                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="cemail" required class="form-control" placeholder="E-mail de acesso" aria-label="Username" aria-describedby="basic-addon1">
                          </div>

                        </div>

                        <div class="col-md-6 mb-2">

                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                            <input type="password" name="csenha" required class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                          </div>

                        </div>

                        <div class="col-sm-12 mt-4">
                        <button type="submit" name="btn-cadastrar" class="btn btn-primary"> <i class="fa fa-plus mr-2"></i> Adicionar usuário</button>
                        </div>
                        
                      </div>
                      
                      
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
<?php include_once 'include/footer.php'; ?>
<?php include_once 'msg/msg_usuario.php'; ?>