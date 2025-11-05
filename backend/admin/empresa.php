<?php include_once 'include/header.php'; ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">

        <div class="main-panel">

          <div class="content-wrapper">
            
            <div class="page-header">
              <h3 class="page-title">DADOS DA EMPRESA</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="empresa.php">Empresa</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Dados da empresa </li>
                </ol>
              </nav>
            </div>

            <div class="row">
              <?php

                $sql ="SELECT * FROM tbl_empresa";
                $rse = mysqli_query($conexao,$sql);
                $dadose = mysqli_fetch_array($rse);
                $nif = $dadose['nif'];
                $empresa = $dadose['empresa'];
                $telefone = $dadose['telefone'];
                $morada = $dadose['morada'];
                $email = $dadose['email'];
                
              
              ?>
              
                
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Editar Dados da Empresa</h4>
                    <hr> <br>
                    <form class="form-sample mt-2" method="POST" action="processar/atualizar-empresa.php" enctype="multipart/form-data">
                      
                      <div class="row">

                        <div class="col-md-8 mb-2">

                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-university"></i></span>
                            <input type="text" name="cempresa" value="<?php echo $empresa; ?>" class="form-control" placeholder="Empresa" aria-label="Username" aria-describedby="basic-addon1">
                          </div>

                        </div>

                        <div class="col-md-4 mb-2">

                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-id-card"></i></span>
                            <input type="text" readonly name="cnif" value="<?php echo $nif; ?>" class="form-control" placeholder="Nº de contribuinte" aria-label="Username" aria-describedby="basic-addon1">
                          </div>

                        </div>

                        <div class="col-md-6 mb-2">

                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-upload"></i></span>
                            <input type="file" name="cfile" class="form-control" placeholder="Sobrenome" aria-label="Username" aria-describedby="basic-addon1">
                          </div>

                        </div>

                        <div class="col-md-6 mb-2">

                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                            <input type="text" name="ctelefone" value="<?php echo $telefone; ?>" class="form-control" placeholder="Telefone da empresa" aria-label="Username" aria-describedby="basic-addon1">
                          </div>

                        </div>

                        

                        <div class="col-md-6 mb-2">

                          <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="cemail" value="<?php echo $email; ?>" class="form-control" placeholder="E-mail da empresa" aria-label="Username" aria-describedby="basic-addon1">
                          </div>

                        </div>

                        <div class="col-md-6 mb-2">

                          <div class="form-floating">
                            <textarea class="form-control" name="cmorada" placeholder="Leave a comment here" id="floatingTextarea">
                              <?php echo $morada; ?>
                            </textarea>
                            <label for="floatingTextarea">Morada da Empresa</label>
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

<?php include_once 'msg/msg_empresa.php' ?>