<?php

	include_once '../../db/conexao.php';

	session_start();

    date_default_timezone_set('Africa/Luanda'); // Exemplo para Angola
    $data_sistema = date('Y-m-d');

	if (isset($_POST['btn-atualizar'])) {
		
		function limpar($input){

			global $conexao;

			$sql_injection = mysqli_escape_string($conexao,$input);
			$xss = htmlspecialchars($sql_injection);
			return $xss;
		}



            $id = limpar($_POST['cid']);
            $estado = limpar($_POST['cestado']);
            

		


				$sql_update ="UPDATE tbl_agendamento SET estado_agendamento='$estado' WHERE id='$id'";

				if (mysqli_query($conexao,$sql_update)) {
					
					
                	$_SESSION['msg3'] ="Estado do orçamento alterado com sucesso";
			        header('Location: ../orcamento.php');
				}




            }

		

		


	



?>