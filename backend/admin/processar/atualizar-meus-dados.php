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

        $id = limpar($_POST['cid']);
		


		$imagem = $_FILES['cfile']['name'];


        
		if (empty($imagem)) {

            $sql_update ="UPDATE tbl_usuario SET nome='$nome',sobrenome='$sobrenome',perfil='$perfil' WHERE id='$id'";
            if (mysqli_query($conexao,$sql_update)) {

                	$_SESSION['msg1'] ="Dados atualizados com sucesso";
			        header('Location: ../meus-dados.php');
            }

		} else {
			
			$formatos = ['jpg','png','jpeg'];

			$extensao = pathinfo($imagem,PATHINFO_EXTENSION);

			$nova_extensao = strtolower($extensao);


			if (in_array($nova_extensao,$formatos)) {



				$pasta ="../usuario/";
				$temporario =$_FILES['cfile']['tmp_name'];

				$novo = uniqid().".$nova_extensao";

				move_uploaded_file($temporario,$pasta.$novo);

				$sql_insert ="UPDATE tbl_usuario SET nome='$nome',sobrenome='$sobrenome',perfil='$perfil',imagem='$novo' WHERE id='$id'";

				if (mysqli_query($conexao,$sql_insert)) {
					
					$_SESSION['msg1'] ="Dados atualizados com sucesso";
			        header('Location: ../meus-dados.php');

				} else {
					
					$_SESSION['msg1'] ="Erro de inserção, verifique o seu código";
					 header('Location: ../listagem-usuario.php');
				}
				
			} else {
				
				$_SESSION['msg1'] ="Formatos inválidos, usa apenas jpg,png ou jpeg";
				 header('Location: ../meus-dados.php');
			}



		}
		


	}



?>