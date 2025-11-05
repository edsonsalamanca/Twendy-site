<?php

    include_once 'conexao.php';

    session_start();
    if (isset($_POST['btn-entrar'])) {
        
   


    $email = filter_input(INPUT_POST,'cemail');

    $senha = filter_input(INPUT_POST,'csenha');

    $sql_empresa ="SELECT * FROM tbl_empresa LIMIT 1";

    $rs1 = mysqli_query($conexao,$sql_empresa);

    $dados1 = mysqli_fetch_array($rs1);

    $nif = $dados1['nif'];


    $sql_verificar ="SELECT * FROM tbl_usuario WHERE email ='$email'";
    $rs = mysqli_query($conexao,$sql_verificar);

    if (mysqli_num_rows($rs) ==1) {
        

        $dados = mysqli_fetch_array($rs);

        $id = $dados['id'];
        $senha_hash = $dados['senha'];

        $perfil = $dados['perfil'];


        if (password_verify($senha,$senha_hash)) {
            
            if ($perfil=='Admin') {

                if (empty($nif)) {
                    
                    $_SESSION['user_logado']=$id;
                    header('Location: ../admin/dados-empresa.php');

                } else {


                    $_SESSION['user_logado']=$id;
                    header('Location: ../admin/dashboard.php');
                    

                }
          
            } else {

                $_SESSION['user_logado']=$id;
                header('Location: ../atendente/dashboard.php');
                

            }
            


        } else {
            $_SESSION['autenticar'] ="Senha inválida, tenta novamente";
            header('Location: ../login.php');
        }
        
    } else {
        
        $_SESSION['autenticar'] ="E-mail inválido, tenta novamente";
        header('Location: ../login.php');
    }
    


}


?>