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


		$servico =limpar($_POST['cdescricao']);
		$categoria =limpar($_POST['ccategoria']);
		

		$imagem = $_FILES['cfile']['name'];

		
			
			$formatos = ['jpg','png','jpeg'];

			$extensao = pathinfo($imagem,PATHINFO_EXTENSION);

			$nova_extensao = strtolower($extensao);


			if (in_array($nova_extensao,$formatos)) {



				$pasta ="../servico/";
				$temporario =$_FILES['cfile']['tmp_name'];

				$novo = uniqid().".$nova_extensao";

				move_uploaded_file($temporario,$pasta.$novo);

				$sql_insert ="INSERT INTO tbl_sevico 
				VALUES(DEFAULT,'$servico','$categoria','$novo')";

				if (mysqli_query($conexao,$sql_insert)) {
					
					$_SESSION['msg_servico'] ="Dados cadastrados com sucesso";
					header('Location: ../servico.php');

				} else {
					
					$_SESSION['msg_servico'] ="Erro de inserção, verifique o seu código";
					header('Location: ../servico.php');
				}
				
			} else {
				
				$_SESSION['msg_servico'] ="Formatos inválidos, usa apenas jpg,png ou jpeg";
				header('Location: ../servico.php');
			}



		
		


	}



?>