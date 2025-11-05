<?php

    include_once 'conexao.php';
    session_start();

    if (isset($_POST['btn-cadastrar'])) {
        
        function limpar($input){

            global $conexao;

            $sql_injection = mysqli_escape_string($conexao,$input);
            $xss = htmlspecialchars($sql_injection);
            return $xss;
        }

        $nome =  limpar($_POST['cnome']);
        
        $email = limpar($_POST['cemail']);
        $assunto =  limpar($_POST['cassunto']);
        $mensagem = limpar($_POST['cmensagem']);
        
        
			

            $sql ="INSERT INTO tbl_mensagem VALUES(DEFAULT,'$nome','$email','$assunto','$mensagem')";

            if (mysqli_query($conexao,$sql)) {
                
                $_SESSION['msg_assunto'] ="Mensagem enviada com sucesso";
			    header('Location: ../index.php#contact-section');

            } 

    }


?>