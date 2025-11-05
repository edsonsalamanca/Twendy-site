<?php include_once 'include/header.php'; ?>
<?php

  $id_agendar = filter_input(INPUT_GET,'id');

  $sql_cliente ="SELECT c.nome as cliente FROM tbl_agendamento as g INNER JOIN 
  tbl_cliente as c ON c.id=g.id_cliente WHERE g.id='$id_agendar'";

  $rs = mysqli_query($conexao,$sql_cliente);

  $dados_cliente = mysqli_fetch_array($rs);

  $cliente = $dados_cliente['cliente'];


?>
    
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Serviço agendado por <span class="text-danger">" <?php echo $cliente; ?> "</span></h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="agendamento.php">Agendamento</a></li>
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
                            
                          </tr>
                        </thead>
                        <tbody>

                        <?php
                        
                            $sql ="SELECT s.servico as servico,s.imagem as categoria,s.categoria as imagem FROM tbl_sevico as s INNER 
                            JOIN tbl_itens_servico as i ON i.id_servico=s.id WHERE i.id_agendamento='$id_agendar'";

                            $rs = mysqli_query($conexao,$sql);
                            while ($dados = mysqli_fetch_array($rs)) {
                              
                              $imagem = $dados['imagem'];
                              $servico = $dados['servico'];
                              $categoria = $dados['categoria'];

                        ?>

                          <tr>
                            <td class="py-1">
                              <img src="servico/<?php echo $imagem; ?>" alt="image" />
                            </td>
                            <td><?php echo $servico; ?></td>
                            <td>
                              <?php echo $categoria; ?>
                            </td>
                            
                          </tr>

                          <?php   } ?>
                          
                            
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