<?php

	include_once '../../db/conexao.php';

	session_start();

	if (isset($_POST['btn-cadastrar'])) {
		
		function limpar($input){

			global $conexao;

			$sql_injection = mysqli_escape_string($conexao,$input);
			$xss = htmlspecialchars($sql_injection);
			return $xss;
		}


		$projeto =limpar($_POST['cprojeto']);
		$categoria =limpar($_POST['ccategoria']);
        $local = limpar($_POST['conde']);
		

		$imagem = $_FILES['cfile']['name'];

		
			
			$formatos = ['jpg','png','jpeg'];

			$extensao = pathinfo($imagem,PATHINFO_EXTENSION);

			$nova_extensao = strtolower($extensao);


			if (in_array($nova_extensao,$formatos)) {



				$pasta ="../servico/";
				$temporario =$_FILES['cfile']['tmp_name'];

				$novo = uniqid().".$nova_extensao";

				move_uploaded_file($temporario,$pasta.$novo);

				$sql_insert ="INSERT INTO tbl_projeto 
				VALUES(DEFAULT,'$projeto','$categoria','$novo','$local')";

				if (mysqli_query($conexao,$sql_insert)) {
					
					$_SESSION['msg_projeto'] ="Dados cadastrados com sucesso";
					header('Location: ../projeto.php');

				} else {
					
					$_SESSION['msg_projeto'] ="Erro de inserção, verifique o seu código";
					header('Location: ../projeto.php');
				}
				
			} else {
				
				$_SESSION['msg_projeto'] ="Formatos inválidos, usa apenas jpg,png ou jpeg";
				header('Location: ../projeto.php');
			}



		
		


	}



?>