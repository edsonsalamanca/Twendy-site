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

        $sql ="SELECT * FROM tbl_agendamento WHERE id_cliente='$id'";

        $rs = mysqli_query($conexao,$sql);

        if (mysqli_num_rows($rs) > 0) {
            
            $_SESSION['msg_cliente'] ="Este cliente já está associado a um orçamento";
            header('Location: ../cliente.php');

        } else {
            
       
            $sql_delete ="DELETE FROM  tbl_cliente WHERE id='$id'";

            if (mysqli_query($conexao, $sql_delete)) {
                
                $_SESSION['msg_cliente'] ="Cliente excluido com sucesso";
				 header('Location: ../cliente.php');

            } else {
                
                $_SESSION['msg_cliente'] ="Erro de inserção, verifique o seu código";
				 header('Location: ../cliente.php');
            }

        }
        
     

		
		


	}



?>