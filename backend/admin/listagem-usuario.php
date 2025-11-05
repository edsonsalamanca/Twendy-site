<?php include_once 'include/header.php'; ?>
    
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Listagem de utilizadores</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="utilizador.php">Novo utilizador</a></li>
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
                            <th>Utlizador</th>
                            <th>E-mail</th>
                            <th>Perfil</th>
                            <th>Status</th>
                            <th>Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php

                              $sql_user ="SELECT * FROM tbl_usuario";
                              $rs = mysqli_query($conexao,$sql_user);
                              while ($dados = mysqli_fetch_array($rs)) {
                                
                                $id = $dados['id'];
                                $nome1 = $dados['nome'];
                                $sobrenome = $dados['sobrenome'];
                                $nome =$dados['nome']." ".$dados['sobrenome'];

                                $email = $dados['email'];
                                $perfil = $dados['perfil'];
                                $imagem = $dados['imagem'];
                                $status = $dados['status'];
         
                          ?>
                          <tr>
                            <td class="py-1">
                              <img src="usuario/<?php echo $imagem; ?>" alt="image" />
                            </td>
                            <td><?php echo $nome; ?></td>
                            <td>
                              <?php echo $email; ?>
                            </td>
                            <td><?php echo $perfil; ?></td>
                            <td>
                            <label class="badge badge-success"><?php echo $status; ?></label>
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
                                  <form action="processar/eliminar-usuario.php" method="POST">
                                    <div class="modal-header bg-danger">
                                      <h5 class="modal-title  text-white" id="staticBackdropLabel">Eliminar utilizador</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <h6>Tens a certeza que desejas excluir?</h6>
                                      <input type="hidden" name="cid" value="<?php echo $id; ?>">
                                    </div>
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
                                <form class="form-sample mt-2" action="processar/atualizar-usuario.php" 
                                    method="POST" enctype="multipart/form-data">
                                <div class="modal-content">
                                  

                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar utilizador</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">

                                  
                                      
                                      <div class="row">

                                        <div class="col-md-12 mb-2">

                                          <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                            <input type="text" name="cnome" value="<?php echo $nome1; ?>" class="form-control" placeholder="Primeiro nome" aria-label="Username" aria-describedby="basic-addon1">
                                          </div>

                                        </div>

                                        <div class="col-md-12 mb-2">

                                          <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                            <input type="text" name="csobrenome" value="<?php echo $sobrenome; ?>" class="form-control" placeholder="Sobrenome" aria-label="Username" aria-describedby="basic-addon1">
                                          </div>

                                        </div>

                                        <div class="col-md-12 mb-2">

                                          <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-upload"></i></span>
                                            <input type="file" name="cfile" class="form-control" placeholder="Sobrenome" aria-label="Username" aria-describedby="basic-addon1">
                                          </div>

                                        </div>

                                        <div class="col-md-12 mb-2">

                                          <div class="input-group mb-3">
                                            <label class="input-group-text" for="inputGroupSelect01">
                                              <i class="fa fa-group"></i>
                                            </label>
                                            <select class="form-select" id="inputGroupSelect01" name="cperfil">
                                              <option selected value="<?php echo $perfil; ?>"><?php echo $perfil; ?></option>
                                              <optgroup label="Deseja alterar o perfil?">
                                              <option value="Admin">Admin</option>
                                              <option value="Atendente">Atendente</option>
                                              </optgroup>
                                              
                                            </select>
                                          </div>

                                        </div>

                                        <input type="hidden" name="cid" value="<?php echo $id; ?>">

                                        
                                      </div>
                                      
                                      
                                 

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
<?php include_once 'msg/msg_usuario.php'; ?>