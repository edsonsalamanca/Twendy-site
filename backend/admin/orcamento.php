<?php include_once 'include/header.php'; ?>
    
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Listagem de orçamento</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="orcamento.php">Orçamento</a></li>
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
                            <th>Cliente</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
                            <th>Data</th>
                            <th>Valor</th>
                            <th>Estado</th>
                            <th>Ver detalhes</th>
                            <th>Opções</th>
                          </tr>
                        </thead>
                        <tbody>

                        <?php
                        
                           $sql ="SELECT o.id as id_orcamento,o.valor as valor, a.id as id, c.nome as cliente,c.telefone as telefone,c.email as email,a.data as data1,a.tipo 
                          as descricao,a.estado_agendamento as estado FROM tbl_agendamento as a 
                          INNER JOIN tbl_cliente as c ON c.id=a.id_cliente INNER JOIN tbl_orcamento as o 
                          ON o.id_agendamento=a.id
                           WHERE a.estado_agendamento='Em orçamento'";

                          $rs = mysqli_query($conexao,$sql);

                          while ($dados = mysqli_fetch_array($rs)) {

                            $id = $dados['id'];
                            $cliente = $dados['cliente'];
                            $telefone = $dados['telefone'];
                            $email = $dados['email'];
                            $data = $dados['data1'];
                            $descricao = $dados['descricao'];
                            $estado = $dados['estado'];
                            $id_orcamento = $dados['id_orcamento'];
                            $valor = $dados['valor'];
                            $valor1 = number_format($valor,2,",",".")."Kz";
                        
                        
                        ?>
                          <tr>
                            <td class="py-1">
                              <img src="logo/user.png" alt="image" />
                            </td>
                            <td><?php echo $cliente; ?></td>
                            <td><?php echo $telefone; ?></td>
                            <td>
                              <?php echo $email; ?>
                            </td>
                            <td><?php echo $data; ?></td>
                            <td><?php echo $valor1; ?></td>

                            <td>
                            <label class="badge badge-info"><?php echo $estado; ?></label>
                            </td>
                            <td>
                              <div class="btn-group">
                              <a href="Relatorio/relatorio.php?id=<?php echo $id; ?>" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i></a>
                              <a class="btn btn-secondary" href="itens-agendar1.php?id=<?php echo $id; ?>"><i class="fa fa-eye"></i></a>
                              </div>
                              
                            </td>
                            <td>


                              <div class="dropdown">
                                <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                  Ver mais
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              
                                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal1"><i class="fa fa-edit"></i> Editar orçamento</a></li>
                                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fa fa-edit"></i> Editar estado</a></li>
                                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <i class="fa fa-trash"></i> Excluir</a></li>
                                </ul>
                              </div>

                              <!--div class="btn-group">

                              <a href="itens-agendar.php" class="btn btn-info" ><i class="fa fa-eye"></i></a>
                                
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa fa-trash"></i></a>
                              </div-->
                            </td>


                            

                            <!-- Modal Deletar-->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="processar/eliminar-orcamento.php" method="POST">
                                    <div class="modal-header bg-danger">
                                      <h5 class="modal-title  text-white" id="staticBackdropLabel">Eliminar orçamento</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <h6>Tens a certeza que desejas excluir?</h6>
                                      <input type="hidden" name="cid" value="<?php echo $id_orcamento; ?>">
                                      <input type="hidden" name="cid_agendar" value="<?php echo $id; ?>">

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
                            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                 <form class="form-sample mt-2" method="POST" action="processar/atualizar-orcamento.php">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Alterar orçamento </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">

                                   
                                      
                                      <div class="row">

                                        

                                        <div class="col-md-12 mb-2">

                                          <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-money"></i></span>
                                            <input type="number" name="cvalor" required class="form-control" placeholder="Qual é orçamento" aria-label="Username" aria-describedby="basic-addon1">
                                          </div>

                                        </div>

                                        <input type="hidden" name="cid_orcamento" value="<?php echo $id_orcamento; ?>">

                                        
                                      </div>
                                      
        

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" name="btn-atualizar" class="btn btn-primary">Salvar alterações</button>
                                  </div>
                                </div>
                              </div>
                                </form>
                            </div>


                            <!-- Modal Editar -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <form class="form-sample mt-2" method="POST" action="processar/atualizar-estado1.php">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Estado de Agendamento <span class="text-info">" Em orçamento "</span></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">

                                    
                                      
                                      <div class="row">

                                        
                                        

                                        <div class="col-md-12 mb-2">

                                          <div class="input-group mb-3">
                                            <label class="input-group-text" for="inputGroupSelect01">
                                              <i class="fa fa-group"></i>
                                            </label>
                                            <select class="form-select" required name="cestado" required id="inputGroupSelect01">
                                              <option selected value="">Alterar o estado...</option>
                                              <option value="Aprovado">Aprovado</option>
                                              
                                              
                                            </select>
                                          </div>

                                          <input type="hidden" name="cid" value="<?php echo $id; ?>">

                                        </div> 
                                        
                                      </div>
          
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" name="btn-atualizar" class="btn btn-primary">Salvar alterações</button>
                                  </div>
                                </div>
                                </form>
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

<?php include_once 'msg/msg_agenda.php'; ?>