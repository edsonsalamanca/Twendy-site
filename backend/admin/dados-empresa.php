<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="logo/icon.png">
  <title>Sistema de Agendamento</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
  <link rel="stylesheet" type="text/css" href="css/estilo1.css">
</head>
<body>
  


  <section class="login-block">

      <div class="container">
    <div class="row p-2">
      <div class="col-md-4 login-sec">
          <h2 class="text-center" style="color:#61C43E;">DADOS DA EMPRESA</h2>

          <form class="login-form" method="POST" action="processar/inserir-empresa.php" enctype="multipart/form-data">


                  <div class="form-group">
                    <label for="exampleInputEmail1" class="text-uppercase">NIF</label>
                    <input type="text" name="cnif" required class="form-control" placeholder="">
                    
                  </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1" class="text-uppercase">Empresa</label>
                      <input type="text" name="cempresa" required class="form-control" placeholder="">
                      
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1" class="text-uppercase">Telefone</label>
                    <input type="text" name="ctelefone" required class="form-control" placeholder="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1" class="text-uppercase">E-mail</label>
                    <input type="text" name="cemail" required class="form-control" placeholder="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1" class="text-uppercase">Morada</label>
                    <input type="text" name="cmorada" required class="form-control" placeholder="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1" class="text-uppercase">Logotipo</label>
                    <input type="file" name="cfile" required class="form-control" placeholder="">
                  </div>
          
          
              <div class="form-check mt-3">
            
                <button type="submit" name="btn-cadastrar" class="btn btn-login float-right">Cadastrar</button>
              </div>
          
        </form>

      </div>
      <div class="col-md-8 banner-sec">
              <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                  <ol class="carousel-indicators">
                      <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                      <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                      <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                    </ol>
              <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <img class="d-block img-fluid" src="img/1.jpg" alt="First slide">
        
      </div>

      <div class="carousel-item">
        <img class="d-block img-fluid" src="img/2.jpg" alt="First slide">
        
      </div>

      <div class="carousel-item">
        <img class="d-block img-fluid" src="img/7.jpg" alt="First slide">
        
      </div>

      
    </div>
    </div>	   
          
      </div>
    </div>
  </div>
  </section>

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script  src="js/sweetalert2.min.js"></script>

 </body>
</html>

<?php include_once 'msg/msg_empresa.php' ?>



