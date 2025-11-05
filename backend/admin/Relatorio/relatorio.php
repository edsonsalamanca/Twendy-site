<?php
	session_start();
	include_once '../../db/conexao.php';
	include_once 'vendor/autoload.php';
	date_default_timezone_set('Africa/Luanda');

	$data = date("d/m/Y");
	$data_db = date("Y-m-d");

	$datahora = date('d/m/Y H:i:s');

	$ano = date('Y');

    
    $id_venda = filter_input(INPUT_GET,'id');


   	$sql_user ="SELECT a.estado_agendamento as estado,c.nome as nome,c.BI as nif,c.telefone as telefone,c.localizacao as morada 
    FROM tbl_agendamento as a INNER JOIN tbl_cliente as c ON c.id=a.id_cliente WHERE a.id='$id_venda'";
   	$rs_user = mysqli_query($conexao,$sql_user);
   	$dados_user = mysqli_fetch_array($rs_user);

   	$nome = $dados_user['nome'];
   	
   	$morada_c = $dados_user['morada'];
   	$telefone_c = $dados_user['telefone'];
   	$cliente = $nome;
   $nif_cliente = $dados_user['nif'];

   $estado = $dados_user['estado'];
	
	$mes = date('M');
	if ($mes =='Jan') {
		$mes = 'Janeiro';
	} elseif($mes =='Feb') {
		$mes='Fevereiro';
	}
	elseif($mes=='Mar'){
		$mes='Março';
	}
	elseif ($mes=='Apr') {
		$mes='Abril';
	}
	elseif ($mes=='May') {
		$mes='Maio';
	}
	elseif ($mes=='Jun') {
		$mes='Junho';
	}
	elseif ($mes=='Jul') {
		$mes='Julho';
	}
	elseif ($mes=='Aug') {
		$mes='Agosto';
	}elseif ($mes=='Sep') {
		$mes='Setembro';
	}
	elseif ($mes=='Oct') {
		$mes='Outubro';
	}
	elseif ($mes=='Nov') {
		$mes='Novembro';
	}
	elseif ($mes=='Dec') {
		$mes='Dezembro';
	}
	

	use Mpdf\Mpdf;

	$html ="

		<!DOCTYPE html>
		<html lang='en'>
		<head>
			<meta charset='UTF-8'>
			<meta name='viewport' content='width=device-width, initial-scale=1.0'>
			<title>Relatório de Matrícula</title>
			<link rel='icon' href='img/logo1.png'>
		</head>
		<body>
		";

			$sql ="SELECT * FROM tbl_empresa";
			$rs = mysqli_query($conexao,$sql);
			$dados = mysqli_fetch_array($rs);
			
			$nif = $dados['nif'] ;
			$empresa = $dados['empresa'];
			
			$telefone = $dados['telefone'];
			$telefone2 = $dados['alternativo'];
			$email = $dados['email'];
			$morada = $dados['morada'];
			$logo = $dados['logo'];
			
		

		$html = $html."
			<div class='image'>
				<img src='../logo/{$logo}'>
			</div>
			<div class='morada'>
				<p>NIF: {$nif}</p>
				<p>Empresa: {$empresa}</p>
				<p><strong>Morada:</strong> {$morada}</p>
				<p><strong>E-mail:</strong> {$email}</p>
				<p><strong>Tel. :</strong>{$telefone} </p>
			</div>
			<div class='perfil'>
				<p>Exmo.(s) Sr.(s)</p>
				<p><strong>{$cliente}</strong></p> 
				
				<p>{$morada_c}</p>

				<p>{$telefone_c}</p>

                <p>Estado agendamento  <br> <br> {$estado}</p>



			</div>
			<h4>Factura nº FT {$data}</h4>
			<h5>Original</h5>
			<hr class='hr1'>
			<div class='data'>
				<p>Data de Emissão</p>
				<p class='data1'>{$data}</p>
			</div>
			<div class='data-1'>
				<p>Factura Referente</p>
				<p class='data1' id='center'>Mês de {$mes}</p>
			</div>

			<div class='data-3'>
				<p>Contribuinte</p>
				<p class='data1'>{$nif_cliente}</p>
			</div>

			<div class='data-2'>
				<p>Data & Hora</p>
				<p class='data1' >{$datahora}</p>
			</div>
			<h6>DOCUMENTO</h6>
			<hr class='hr2'>
			<p class='tipo'>Relatório de Orçamento</p>
			<hr class='hr3'>
			<table>
				<thead>
					<tr>
                        <th>Nº ordem.</th>
            			<th>Serviço</th>
						<th>Categoria</th>
            			
            			<th>Qtd</th>
                      
						

					</tr>
				</thead>
				<tbody>
				"; 

				$soma =0; 
                
                $contar =1;

					$sql ="SELECT S.servico as servico,s.imagem as categoria,i.qtd as qtd FROM tbl_agendamento as a 
                    INNER JOIN tbl_itens_servico as i ON i.id_agendamento=a.id 
                    INNER JOIN tbl_sevico as s ON S.id=i.id_servico WHERE a.id='$id_venda'";

					$rs =mysqli_query($conexao,$sql);

					while ($dados = mysqli_fetch_array($rs)) {
											
						
                        
						$servico = $dados['servico'];
						$categoria = $dados['categoria'];
			            
			              $qtd = $dados['qtd'];
			             
			               
			               
                                            
						$html = $html."
						<tr>
                            <td>#{$contar}</td>
							<td>{$servico}</td>
							
				            <td>{$categoria}</td>
				            
							<td>{$qtd}</td>
							
						</tr>";


                        $contar++;

					}

				$html = $html."
				
				</tbody>
			</table>
			<hr class='hr4'>

			<div class='taxa'>

				";


                $sql_orcamento ="SELECT * FROM tbl_orcamento WHERE id_agendamento='$id_venda'";
                $rs = mysqli_query($conexao,$sql_orcamento);
                $dados = mysqli_fetch_array($rs);

                $valor = $dados['valor'];

                $valor1 = number_format($valor,2,",",".")."Kz";




                $html=$html."

	
				
					<div class='valores'>
						<p>Forma de Pagamento</p>
						<p class='taxa3' id='tra'>Transferência</p>
						<p class='taxa4'>{$valor1}</p>
					</div>

					

			</div>

			
				

			<div class='valores-1'>
				<p class='taxa3'>Orçamento</p>
				<p class='taxa4'>{$valor1}</p>
			</div><br>

			
		</body>
		</html>

	";
	$css = file_get_contents('css/dados224.css');
	// Ticket ['mode'=> 'utf-8','format' => [80,155]];
	$pdf = new mPDF();

	$pdf->AddPage();
	$pdf->SetHTMLFooter('
	<table width="100%">
	    <tr>
	        <td width="33%">{DATE j-m-Y}</td>
	        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
	        <td width="39%" style="text-align: right;">Pró-servir - Comércio & prestação de serviço</td>
	    </tr>
	</table>');
	$pdf->writeHtml($css, 1);
	$pdf->writeHtml($html);
	
	
	$pdf->Output();


?>