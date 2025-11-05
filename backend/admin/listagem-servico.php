<?php include_once 'include/header.php'; ?>
    
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Listagem de serviços</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="servico.php">Novo serviço</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Listagem </li>
                </ol>
              </nav>
            </div>
            <div class="row">


              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered example">
                        <thead>
                          <tr>
                            <th>Imagem</th>
                            <th>Serviço</th>
                            <th>Categoria</th>
                            
                            <th>Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php

                            $sql ="SELECT * FROM tbl_sevico";
                            $rs = mysqli_query($conexao,$sql);

                            while ($dados=mysqli_fetch_array($rs)) {
                              
                              $id = $dados['id'];
                              $servico = $dados['servico'];
                              $categoria = $dados['categoria'];
                              $imagem = $dados['imagem'];

                          
                          ?>
                          <tr>
                            <td class="py-1">
                              <img src="servico/<?php echo $categoria; ?>" alt="image" />
                            </td>
                            <td><?php echo $servico; ?></td>
                            <td>
                            <?php echo $imagem; ?>
                            </td>
                            
                            <td>
                              <div class="btn-group">
                                
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $id; ?>"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $id; ?>"><i class="fa fa-trash"></i></a>
                              </div>
                            </td>

                            <!-- Modal Deletar-->
                            <div class="modal fade" id="staticBackdrop<?php echo $id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="processar/eliminar-servico.php" method="POST" >
                                    <div class="modal-header bg-danger">
                                      <h5 class="modal-title  text-white" id="staticBackdropLabel">Eliminar serviço</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <h6>Tens a certeza que desejas excluir?</h6>
                                    </div>
                                    <input type="hidden" name="cid" value="<?php echo $id; ?>">
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                      <button type="submit" name="btn-eliminar" class="btn btn-danger">Excluir</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>


                            <!-- Modal Editar -->
                            <div class="modal fade" id="exampleModal<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                              <form class="form-sample mt-2" action="processar/atualizar-sevico.php" 
                              method="POST" enctype="multipart/form-data">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar serviço</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">

                                    
                                      
                                
                                    <div class="row">

                                        <div class="col-md-12 mb-2">
                                          <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-gear"></i></span>
                                            <input type="text" name="cdescricao" value="<?php echo $servico; ?>" class="form-control" placeholder="Descrição do serviço" aria-label="Username" aria-describedby="basic-addon1">
                                          </div>

                                        </div>


                                        <div class="col-md-12 mb-2">

                                          <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-list"></i></span>
                                            <input type="text" name="ccategoria" value="<?php echo $imagem; ?>" class="form-control" placeholder="Categoria do serviço" aria-label="Username" aria-describedby="basic-addon1">
                                          </div>

                                        </div>



                                        <div class="col-md-12 mb-2">

                                          <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-upload"></i></span>
                                            <input type="file" name="cfile" class="form-control" placeholder="Sobrenome" aria-label="Username" aria-describedby="basic-addon1">
                                          </div>

                                        </div>   
                                      </div>

                                      <input type="hidden" name="cid" value="<?php echo $id; ?>">
                                      
                                      
                                    

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" name="btn-cadastrar" class="btn btn-primary">Salvar alterações</button>
                                  </div>
                                </div>
                                </form>
                              </div>
                            </div>

 
                          </tr>
                          
                          <?php  } ?>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              
            </div>
          </div>
          <!-- content-wrapper ends -->
<?php include_once 'include/footer.php'; ?>

<?php include_once 'msg/msg_servico.php'; ?>