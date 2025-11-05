<?php include_once 'include/header.php'; ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">

        <div class="main-panel">

          <div class="content-wrapper">
            
            <div class="page-header">
              <h3 class="page-title">Novo projeto</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="listagem-projeto.php">Listagem</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Novo projeto </li>
                </ol>
              </nav>
            </div>

            <div class="row">
              
                
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Registar projeto realizado</h4>
                    <hr> <br>
                    <form class="form-sample mt-2" action="processar/inserir-projeto.php" method="POST" enctype="multipart/form-data">
                      
                      <div class="row">

                        <div class="col-md-6 mb-2">

                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-cog"></i></span>
                            <input type="text" name="cprojeto" required class="form-control" placeholder="Descrição do projeto" aria-label="Username" aria-describedby="basic-addon1">
                          </div>

                        </div>

                        <div class="col-md-6 mb-2">

                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-home"></i></span>
                            <input type="text" name="conde" required class="form-control" placeholder="Onde foi realizado?" aria-label="Username" aria-describedby="basic-addon1">
                          </div>

                        </div>

                        <div class="col-md-6 mb-2">

                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-upload"></i></span>
                            <input type="file" name="cfile" required class="form-control" placeholder="Sobrenome" aria-label="Username" aria-describedby="basic-addon1">
                          </div>

                        </div>


                        <div class="col-md-6 mb-2">

                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                            <input type="text" name="ccategoria" required class="form-control" placeholder="Categoria ex: construção" aria-label="Username" aria-describedby="basic-addon1">
                          </div>

                        </div>

                       

                        <div class="col-sm-12 mt-4">
                        <button type="submit" name="btn-cadastrar" class="btn btn-primary"> <i class="fa fa-plus mr-2"></i> Adicionar projeto</button>
                        </div>
                        
                      </div>
                      
                      
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
<?php include_once 'include/footer.php'; ?>
<?php include_once 'msg/msg_projeto.php'; ?>