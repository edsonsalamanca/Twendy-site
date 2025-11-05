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


		$projeto =limpar($_POST['cdescricao']);
		$categoria =limpar($_POST['ccategoria']);
        $local = limpar($_POST['conde']);

		$imagem = $_FILES['cfile']['name'];

        $id = limpar($_POST['cid']);

        if (empty($imagem)) {

            $sql_update ="UPDATE tbl_projeto SET nome='$projeto',categoria='$categoria',endereco='$local' WHERE id='$id'";

            if (mysqli_query($conexao,$sql_update)) {

                $_SESSION['msg_projeto'] ="Dados atualizados com sucesso";
				header('Location: ../listagem-projeto.php');
                
            }
            
        } else {
            

			$formatos = ['jpg','png','jpeg'];

			$extensao = pathinfo($imagem,PATHINFO_EXTENSION);

			$nova_extensao = strtolower($extensao);


			if (in_array($nova_extensao,$formatos)) {



				$pasta ="../servico/";
				$temporario =$_FILES['cfile']['tmp_name'];

				$novo = uniqid().".$nova_extensao";

				move_uploaded_file($temporario,$pasta.$novo);

				$sql_insert ="UPDATE tbl_projeto SET nome='$projeto',categoria='$categoria', imagem='$novo', endereco='$local'
                 WHERE id='$id'";

				if (mysqli_query($conexao,$sql_insert)) {
					
					$_SESSION['msg_projeto'] ="Dados atualizados com sucesso";
				    header('Location: ../listagem-projeto.php');

				} else {
					
					$_SESSION['msg_projeto'] ="Erro de inserção, verifique o seu código";
					header('Location: ../listagem-projeto.php');
				}
				
			} else {
				
				$_SESSION['msg_projeto'] ="Formatos inválidos, usa apenas jpg,png ou jpeg";
				header('Location: ../listagem-projeto.php');
			}

        }
        


		
		


	}



?>