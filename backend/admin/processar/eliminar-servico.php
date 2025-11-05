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

        $sql ="SELECT * FROM tbl_itens_servico WHERE id_servico='$id'";

        $rs = mysqli_query($conexao,$sql);

        if (mysqli_num_rows($rs) > 0) {
            
            $_SESSION['msg_servico'] ="Este serviço já está associado a um orçamento";
            header('Location: ../listagem-servico.php');

        } else {
            
       
            $sql_delete ="DELETE FROM  tbl_sevico WHERE id='$id'";

            if (mysqli_query($conexao, $sql_delete)) {
                
                $_SESSION['msg_servico'] ="Dados excluidos com sucesso";
				header('Location: ../listagem-servico.php');

            } else {
                
                $_SESSION['msg_servico'] ="Erro de inserção, verifique o seu código";
				header('Location: ../servico.php');
            }

        }
        
     

		
		


	}



?>