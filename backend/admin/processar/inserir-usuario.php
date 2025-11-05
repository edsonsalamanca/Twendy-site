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


		$nome =limpar($_POST['cnome']);
		$sobrenome =limpar($_POST['csobrenome']);
		$perfil =limpar($_POST['cperfil']);
		$email =limpar($_POST['cemail']);
		$senha =limpar($_POST['csenha']);

		$password = password_hash($senha,PASSWORD_DEFAULT);

		$imagem = $_FILES['cfile']['name'];

		$sql_email ="SELECT * FROM tbl_usuario WHERE email='$email'";
		$rs = mysqli_query($conexao,$sql_email);

		if (mysqli_num_rows($rs)==1) {


			$_SESSION['msg'] ="Já existe um utilizador com este e-mail";
			header('Location: ../utilizador.php');


		} else {
			
			$formatos = ['jpg','png','jpeg'];

			$extensao = pathinfo($imagem,PATHINFO_EXTENSION);

			$nova_extensao = strtolower($extensao);


			if (in_array($nova_extensao,$formatos)) {



				$pasta ="../usuario/";
				$temporario =$_FILES['cfile']['tmp_name'];

				$novo = uniqid().".$nova_extensao";

				move_uploaded_file($temporario,$pasta.$novo);

				$sql_insert ="INSERT INTO tbl_usuario 
				VALUES(DEFAULT,'$nome','$sobrenome','$perfil','$email','$password','$novo','Activo')";

				if (mysqli_query($conexao,$sql_insert)) {
					
					$_SESSION['msg'] ="Dados cadastrados com sucesso";
					header('Location: ../utilizador.php');

				} else {
					
					$_SESSION['msg'] ="Erro de inserção, verifique o seu código";
					header('Location: ../utilizador.php');
				}
				
			} else {
				
				$_SESSION['msg'] ="Formatos inválidos, usa apenas jpg,png ou jpeg";
				header('Location: ../utilizador.php');
			}



		}
		


	}



?>