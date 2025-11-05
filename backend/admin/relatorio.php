<?php include_once 'include/header.php'; ?>
    
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Relatório</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="relatorio.php">Relatório geral</a></li>
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
                            <th>Orçamento</th>
                            <th>Estado orçamento</th>
                            <th>Opção</th>
                          
                          </tr>
                        </thead>
                        <tbody>
                          <?php



                               $sql ="SELECT o.id as id_orcamento,o.valor as valor, a.id as id, c.nome as cliente,c.telefone as telefone,c.email as email,a.data as data1,a.tipo 
                          as descricao,a.estado_agendamento as estado FROM tbl_agendamento as a 
                          INNER JOIN tbl_cliente as c ON c.id=a.id_cliente INNER JOIN tbl_orcamento as o 
                          ON o.id_agendamento=a.id
                           WHERE a.estado_agendamento='Aprovado'";

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

                              <a href="Relatorio/relatorio.php?id=<?php echo $id; ?>" target="_blank" class="btn btn-primary" ><i class="fa fa-print"></i></a>
                                
                                
                                <!--a href="#" class="btn btn-danger" data-bs-toggle="modal" 
                                data-bs-target="#staticBackdrop"><i class="fa fa-trash"></i></a-->
                              </div>
                            </td>


                            
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