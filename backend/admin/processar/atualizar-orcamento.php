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



            $id = limpar($_POST['cid_orcamento']);
            
            $valor = limpar($_POST['cvalor']);
           

            $sql_delete ="UPDATE tbl_orcamento SET valor='$valor' WHERE id='$id'";
            if (mysqli_query($conexao,$sql_delete)) {

			
					
					
                	$_SESSION['msg3'] ="Orçamento alterado com sucesso";
			        header('Location: ../orcamento.php');
				




            }

		

		


	}



?>