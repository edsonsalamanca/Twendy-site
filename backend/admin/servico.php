<?php include_once 'include/header.php'; ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">

        <div class="main-panel">

          <div class="content-wrapper">
            
            <div class="page-header">
              <h3 class="page-title">Novo serviço</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="listagem-servico.php">Listagem</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Novo serviço </li>
                </ol>
              </nav>
            </div>

            <div class="row">
              
                
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Criar novo serviço</h4>
                    <hr> <br>
                    <form class="form-sample mt-2" method="POST" action="processar/inserir-servico.php" 
                    enctype="multipart/form-data">
                      
                      <div class="row">

                        <div class="col-md-6 mb-2">

                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-gear"></i></span>
                            <input type="text" name="cdescricao" required class="form-control" placeholder="Descrição do serviço" aria-label="Username" aria-describedby="basic-addon1">
                          </div>

                        </div>


                        <div class="col-md-6 mb-2">

                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                            <input type="text" name="ccategoria" class="form-control" placeholder="Categoria do serviço" aria-label="Username" aria-describedby="basic-addon1">
                          </div>

                        </div>

                        

                        <div class="col-md-6 mb-2">

                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-upload"></i></span>
                            <input type="file" class="form-control" name="cfile" required placeholder="Sobrenome" aria-label="Username" aria-describedby="basic-addon1">
                          </div>

                        </div>

                        

                        <div class="col-sm-12 mt-4">
                        <button type="submit" name="btn-cadastrar" class="btn btn-primary"> <i class="fa fa-plus mr-2"></i> Adicionar serviço</button>
                        </div>
                        
                      </div>
                      
                      
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
<?php include_once 'include/footer.php'; ?>

<?php include_once 'msg/msg_servico.php'; ?>