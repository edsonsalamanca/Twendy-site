<?php

    session_start();
    include_once 'conexao.php';

    if (isset($_POST['btn-enviar'])) {
		
		function limpar($input){

			global $conexao;

			$sql_injection = mysqli_escape_string($conexao,$input);
			$xss = htmlspecialchars($sql_injection);
			return $xss;
		}


		$nome =limpar($_POST['cnome']);
		$funcao =limpar($_POST['cfunc']);
        $testemunho = limpar($_POST['ctestemunho']);
		

		$imagem = $_FILES['cfile']['name'];

		
			
			$formatos = ['jpg','png','jpeg'];

			$extensao = pathinfo($imagem,PATHINFO_EXTENSION);

			$nova_extensao = strtolower($extensao);


			if (in_array($nova_extensao,$formatos)) {



				$pasta ="../servico-img/";
				$temporario =$_FILES['cfile']['tmp_name'];

				$novo = uniqid().".$nova_extensao";

				move_uploaded_file($temporario,$pasta.$novo);

				$sql_insert ="INSERT INTO tbl_testemunho 
				VALUES(DEFAULT,'$nome','$testemunho','$funcao','$novo')";

				if (mysqli_query($conexao,$sql_insert)) {
					
					
					header('Location: ../index.php#carr');

				} 
				
			} else {
				
				$_SESSION['dados'] ="Formatos inválidos, usa apenas jpg,png ou jpeg";
				header('Location: ../testemunho.php');
			}



		
		


	}



?>






?>