<?php include_once 'include/header.php'; ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">

        <div class="main-panel">

          <div class="content-wrapper pb-0">
            
            <!-- table row starts here -->
            <div class="row">
              <div class="col-xl-4 grid-margin">
                <div class="card card-stat stretch-card mb-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="text-white">
                        <h3 class="font-weight-bold mb-0">
                          <?php

                            $sql ="SELECT SUM(valor) as total FROM tbl_orcamento";
                            $rs = mysqli_query($conexao,$sql);
                            while ($dados = mysqli_fetch_array($rs)) {
                              
                              $total = $dados['total'];

                            }

                            echo number_format($total,2,",",".")."Kz";
                          
                          
                          ?>
                        </h3>
                        <h6>Agendamento pendentes</h6>
                        <div class="badge badge-danger">

                          <?php

                            $sql ="SELECT COUNT(*) as contar FROM tbl_agendamento WHERE estado_agendamento='Pendente'";
                            $rs = mysqli_query($conexao,$sql);
                            while ($dados = mysqli_fetch_array($rs)) {
                              
                              $contar = $dados['contar'];

                            }

                            echo $contar;
                          
                          
                          ?>

                        </div>
                      </div>
                      <div class="flot-bar-wrapper">
                        <div id="column-chart" class="flot-chart"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card stretch-card mb-3">
                  <div class="card-body d-flex flex-wrap justify-content-between">
                    <div>
                      <h4 class="font-weight-semibold mb-1 text-black"> Total orçado </h4>
                      <h6 class="text-muted">Orçamento de Hoje</h6>
                    </div>
                    <h3 class="text-success font-weight-bold">
                      <?php

                            $sql ="SELECT SUM(valor) as total FROM tbl_orcamento WHERE data_orcamento='$data_sistema'";
                            $rs = mysqli_query($conexao,$sql);
                            while ($dados = mysqli_fetch_array($rs)) {
                              
                              $total = $dados['total'];

                            }

                            echo number_format($total,2,",",".")."Kz";
                          
                          
                          ?>
                    </h3>
                  </div>
                </div>
                <div class="card stretch-card mb-3">
                  <div class="card-body d-flex flex-wrap justify-content-between">
                    <div>
                      <h4 class="font-weight-semibold mb-1 text-black"> Total serviços </h4>
                      <h6 class="text-muted">Quantidade Geral</h6>
                    </div>
                    <h3 class="text-success font-weight-bold">
                       <?php

                            $sql ="SELECT COUNT(*) as contar FROM tbl_sevico";
                            $rs = mysqli_query($conexao,$sql);
                            while ($dados = mysqli_fetch_array($rs)) {
                              
                              $contar = $dados['contar'];

                            }

                            echo $contar;
                          
                          
                          ?>
                    </h3>
                  </div>
                </div>
                <div class="card mt-3">
                  <div class="card-body d-flex flex-wrap justify-content-between">
                    <div>
                      <h4 class="font-weight-semibold mb-1 text-black"> Empresas </h4>
                      <h6 class="text-muted">Total de Empresas</h6>
                    </div>
                    <h3 class="text-danger font-weight-bold">+<?php

                            $sql ="SELECT COUNT(*) as contar FROM tbl_cliente";
                            $rs = mysqli_query($conexao,$sql);
                            while ($dados = mysqli_fetch_array($rs)) {
                              
                              $contar = $dados['contar'];

                            }

                            echo $contar;
                          
                          
                          ?></h3>
                  </div>
                </div>
              </div>
              <div class="col-xl-8 stretch-card grid-margin">
                <div class="card">
                  <div style="padding:14px;">
                     <h4 class="card-title">Empresas com orçamento aprovados</h4>
                    <hr>
                  </div>
                  
                  <div class="card-body p-0">

                  
                   
                    <div class="table-responsive">
                      <table class="table custom-table text-dark table-striped ">
                        <thead>
                          <tr>
                            <th>Empresa</th>
                            <th>Estado</th>
                            <th>Valor orçado</th>
                            <th>Atendido por</th>
                            
                          </tr>
                          
                        </thead>
                        
                        
                        <tbody>

                          <tr>
                          <div class="dropdown-divider"></div>
                          </tr>
                          <?php

                            $sql ="SELECT c.nome as empresa,a.estado_agendamento as estado,o.valor as valor,u.nome as nome,u.sobrenome as sobrenome 
                            FROM tbl_orcamento as o INNER JOIN tbl_agendamento as a ON o.id_agendamento=a.id 
                            INNER JOIN tbl_cliente as c ON c.id=a.id_cliente INNER JOIN tbl_usuario as u ON u.id=o.id_usuario 
                            WHERE a.estado_agendamento='Aprovado' AND o.data_orcamento='$data_sistema'";

                            $rs = mysqli_query($conexao,$sql);

                          
                            while ($dados5 = mysqli_fetch_array($rs)) {
                              
                              $nome = $dados5['nome'];
                              $sobrenome = $dados5['sobrenome'];
                              $usuario = $nome." ".$sobrenome;
                              $empresa = $dados5['empresa'];
                              $estado = $dados5['estado'];
                              $valor = $dados5['valor'];
                            
                          
                          
                          ?>
                          <tr>
                            <td>
                              <img src="logo/user.png" class="mr-2" alt="image" /> <?php echo $empresa; ?> </td>
                              <td>
                              <label class="badge badge-success"><?php echo $estado; ?></label>
                            </td>
                            <td><?php echo number_format($valor,2,",",".")."Kz"; ?></td>
                            <td><?php echo $usuario; ?></td>
                          </tr>

                          <?php }  
                            ?>


                          
                        </tbody>
                      </table>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>


        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

<?php include_once 'include/footer.php'; ?>
<?php include_once 'msg/msg_empresa_acerto.php'; ?>