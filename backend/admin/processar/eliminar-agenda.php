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
		


            $sql_delete ="DELETE FROM tbl_agendamento  WHERE id='$id'";
            if (mysqli_query($conexao,$sql_delete)) {

                	$_SESSION['msg3'] ="Dados excluidos com sucesso";
			        header('Location: ../agendamento.php');
            }

		

		


	}



?>