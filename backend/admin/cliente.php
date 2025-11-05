<?php include_once 'include/header.php'; ?>
    
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Todos clientes</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="cliente.php">Listagem</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Todos clientes </li>
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
                            <th>BI</th>
                            <th>Cliente</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            
                            <th>Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        

                        $sql ="SELECT * FROM tbl_cliente";
                        $rs = mysqli_query($conexao,$sql);
                        while ($dados = mysqli_fetch_array($rs)) {
                          $nome = $dados['nome'];
                          $bi =$dados['BI'];
                          $telefone = $dados['telefone'];
                          $whatsap = $dados['telefone1'];
                          $email= $dados['email'];
                          $local = $dados['localizacao'];
                          $id = $dados['id'];
                        
                        
                        
                        ?>

                          <tr>
                            <td class="py-1">
                              <img src="logo/user.png" alt="image" />
                            </td>
                            <td><?php echo $bi; ?></td>
                            <td>
                              <?php echo $nome; ?>
                            </td>
                            <td><?php echo $email; ?></td>
                            <td>
                            (+244) <?php echo $telefone; ?>
                            </td>
                            
                            <td>
                              <div class="btn-group">
                                
                              <a href="https://wa.me/<?php echo $whatsap; ?>?text=Olá,%20gostaria%20de%20mais%20informações" class="btn btn-success"  target="_blank"><i class="fa fa-whatsapp "></i></a>
                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $id; ?>"><i class="fa fa-trash"></i></a>
                              </div>
                            </td>

                            <!-- Modal Deletar-->
                            <div class="modal fade" id="staticBackdrop<?php echo $id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="processar/eliminar-cliente.php" method="POST">
                                    <div class="modal-header bg-danger">
                                      <h5 class="modal-title  text-white" id="staticBackdropLabel">Eliminar Cliente</h5>
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
                          </tr>

                          <?php } ?>
                          
                          
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
<?php include_once 'msg/msg_cliente.php'; ?>