<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema de Agendamento</title>
  <link rel="icon" href="img/logo.jpg">
  <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/estilo1.css">
</head>
<body>
  

<section class="login-block">

    <div class="container">
	<div class="row p-2">
		<div class="col-md-4 login-sec">
		    <h2 class="text-center" style="color:#61C43E; font-size: 20px;">INICIAR SESSÃO</h2>
	<form class="login-form" method="POST" action="db/autenticar.php">
    <div class="form-group">
      <label for="exampleInputEmail1" class="text-uppercase">E-mail de acesso</label>
      <input type="text" name="cemail" required class="form-control" placeholder="">
      
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Password</label>
    <input type="password" name="csenha" required class="form-control" placeholder="">
  </div>
  
  <head>

    <title>Sistema de Agendamento</title>
  
  <link rel="icon" href="img/logo.jpg">

  </head>
    
    <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      <small>Lembrar-me</small>
    </label>
    <button type="submit" name="btn-entrar" class="btn btn-login float-right">Entrar</button>
  </div>

  
</form>
<p class="text-center mt-3">
  <b class="text-danger">
    <?php
      if (isset($_SESSION['autenticar'])) {
        echo $_SESSION['autenticar'];
      }

      unset($_SESSION['autenticar']);
    ?>
  </b>
</p>
<div class="copy-text">Acesso admin <i class="fa fa-user"></i> <a href="index.php">Voltar ao inicio</a></div>
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


<script src="js/bootstrap.bundle.min.js"></script>


</body>
</html>
