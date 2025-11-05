<?php

	include_once '../../db/conexao.php';

	session_start();

	if (isset($_POST['btn-eliminar'])) {
		
		function limpar($input){

			global $conexao;

			$sql_injection = mysqli_escape_string($conexao,$input);
			$xss = htmlspecialchars($sql_injection);
			return $xss;
		}



            $id = limpar($_POST['cid']);
			$id_agendar = limpar($_POST['cid_agendar']);
		


            $sql_delete ="DELETE FROM tbl_orcamento WHERE id='$id'";
            if (mysqli_query($conexao,$sql_delete)) {

				$sql_d ="DELETE FROM tbl_agendamento WHERE id='$id_agendar'";
				if (mysqli_query($conexao,$sql_d)) {
					
					$_SESSION['msg3'] ="Orçamento excluidos com sucesso";
			        header('Location: ../orcamento.php');
				}

                	
            }

		

		


	}



?>