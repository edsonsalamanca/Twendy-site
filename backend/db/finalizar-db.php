<?php

include_once 'conexao.php'; 
session_start();

date_default_timezone_set('Africa/Luanda'); // Exemplo para Angola
$data_sistema = date('Y-m-d');


if (isset($_POST['btn-finalizar'])) {


    function limpar($input){

        global $conexao;

        $sql_injection = mysqli_escape_string($conexao,$input);
        $xss = htmlspecialchars($sql_injection);
        return $xss;
    }

    $verificar = limpar($_POST['modo']);
     $tipo ="Agendamento";
     $estado ="Pendente";




    if ($verificar=='completo') {

        $empresa = limpar($_POST['cempresa']);
        $nif = limpar($_POST['cnif']);
        $telefone = limpar($_POST['ctelefone']);
        $whatsapp = limpar($_POST['cwhatsapp']);
        $email = limpar($_POST['cemail']);
        $morada = limpar($_POST['cmorada']);
       


        if (empty($empresa) OR empty($nif) OR empty($email) OR empty($telefone) OR empty($whatsapp) OR 
        empty($morada) ) {
            
            $_SESSION['error']="Preencha todos os campos obrigatórios *";
            header('Location: ../finalizar.php');

        } else {


            $sql_email ="SELECT * FROM tbl_cliente  WHERE email='$email'";
            $rs_e = mysqli_query($conexao,$sql_email);

            if (mysqli_num_rows($rs_e)==1) {
                
                $_SESSION['error']="Este e-mail já foi registado";
                header('Location: ../finalizar.php');

            } else {
                

                $sql_insert ="INSERT INTO tbl_cliente 
                VALUES(DEFAULT,'$empresa','$nif','$telefone','$whatsapp','$email','$morada')";
                if (mysqli_query($conexao,$sql_insert)) {

                    $id_cliente = mysqli_insert_id($conexao);

                    $sql_insert_agenda ="INSERT INTO tbl_agendamento 
                    VALUES(DEFAULT,'$tipo','$id_cliente','$data_sistema','$estado')";

                    if (mysqli_query($conexao,$sql_insert_agenda)) {
                        $id_agenda = mysqli_insert_id($conexao);

                        foreach ($_SESSION['cart'] as $id_servico => $qtd) {
                            $id = $id_servico;
                            $qtd1 = $qtd;

                            $sql_insert_itens ="INSERT INTO tbl_itens_servico VALUES(DEFAULT,'$id','$id_agenda','$qtd1')";
                            if (mysqli_query($conexao,$sql_insert_itens)) {
                                
                                unset($_SESSION['cart']);
                                $_SESSION['dados'] ="Solicitação finalizada com sucesso";
                            }

                            
                        }

                        header('Location: ../testemunho.php');
                        exit();

                    }

                }


             }
            



            

        }
        

    } else {
        $email_verificar = limpar($_POST['cemail_vericar']);

        if (empty($email_verificar)) {
            
            $_SESSION['error']="Preencha  apenas o e-mail para verificar o seu registo *";
            header('Location: ../finalizar.php');

        } else {

            $sql_ver ="SELECT * FROM tbl_cliente WHERE email='$email_verificar'";
            $rs = mysqli_query($conexao,$sql_ver);
            if (mysqli_num_rows($rs)==1) {

                $dados = mysqli_fetch_array($rs);

                $id_c = $dados['id'];


                $sql_insert_agenda ="INSERT INTO tbl_agendamento 
                VALUES(DEFAULT,'$tipo','$id_c','$data_sistema','$estado')";

                if (mysqli_query($conexao,$sql_insert_agenda)) {
                    $id_agenda = mysqli_insert_id($conexao);

                    foreach ($_SESSION['cart'] as $id_servico => $qtd) {
                        $id = $id_servico;
                        $qtd1 = $qtd;

                        $sql_insert_itens ="INSERT INTO tbl_itens_servico VALUES(DEFAULT,'$id','$id_agenda','$qtd1')";
                        if (mysqli_query($conexao,$sql_insert_itens)) {
                            
                            unset($_SESSION['cart']);
                            $_SESSION['dados'] ="Solicitação finalizada com sucesso";
                        }

                        
                    }

                    header('Location: ../testemunho.php');
                    exit();

                }

            } else {
                
                $_SESSION['error']="Não tem nenhum registo com este e-mail";
                header('Location: ../finalizar.php');
            }

        }
        
    }
    
    

}



?>