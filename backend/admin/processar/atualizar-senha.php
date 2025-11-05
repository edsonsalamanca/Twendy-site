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


		$email =limpar($_POST['cemail']);
		$id =limpar($_POST['cid']);
		$senha = limpar($_POST['csenha']);

		$password = password_hash($senha,PASSWORD_DEFAULT);

		$sql_verificar ="SELECT * FROM  tbl_usuario WHERE email='$email' AND id='$id'";
		$rs = mysqli_query($conexao,$sql_verificar);

		if (mysqli_num_rows($rs)==1) {


			$sql_insert ="UPDATE tbl_usuario 
				SET senha='$password' WHERE id='$id'";

				if (mysqli_query($conexao,$sql_insert)) {
					
					$_SESSION['msg2'] ="Senha alterada com sucesso";
					header('Location: ../alterar-senha.php');

				} else {
					
					$_SESSION['msg2'] ="Erro de inserção, verifique o seu código";
					header('Location: ../alterar-senha.php');
				}


		} else {
			
			$_SESSION['msg2'] ="Não estás associado a esta conta";
			header('Location: ../alterar-senha.php');

		}
		



	}



?>