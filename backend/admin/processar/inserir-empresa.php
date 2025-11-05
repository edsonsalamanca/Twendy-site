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

        $empresa =  limpar($_POST['cempresa']);
        $nif =  limpar($_POST['cnif']);
        $email = limpar($_POST['cemail']);
        $telefone = limpar($_POST['ctelefone']);
        $morada =  limpar($_POST['cmorada']);
        $logo = $_FILES['cfile']['name'];


        $formatos = ['jpg','png','jpeg'];

		$extensao = pathinfo($logo,PATHINFO_EXTENSION);

		$nova_extensao = strtolower($extensao);


		if (in_array($nova_extensao,$formatos)) {

			$pasta ="../logo/";
			$temporario =$_FILES['cfile']['tmp_name'];

			$novo = uniqid().".$nova_extensao";

			move_uploaded_file($temporario,$pasta.$novo);


            $sql ="INSERT INTO tbl_empresa VALUES('$nif','$empresa','$email','$telefone','$morada','$novo')";

            if (mysqli_query($conexao,$sql)) {
                
                $_SESSION['msg_empresa'] ="Dados da empresa cadastrados com sucesso";
			    header('Location: ../dashboard.php');

            } else {
                
                 $_SESSION['msg_erro'] ="Erro de cadastro, verifica seu código";
			    header('Location: ../dados-empresa.php');
            }
            

         }else {

            $_SESSION['msg_erro'] ="Formatos inválidos, usa apenas jpg,png ou jpeg";
			header('Location: ../dados-empresa.php');
                
        }


    }


?>