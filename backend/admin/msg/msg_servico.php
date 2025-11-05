<?php

	if (isset($_SESSION['msg_servico'])) {

		if ($_SESSION['msg_servico']=='Formatos inválidos, usa apenas jpg,png ou jpeg') {

			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg_servico']; ?>",
					  icon: "error"
					});

				</script>

			<?php
		}elseif($_SESSION['msg_servico']=='Dados cadastrados com sucesso'){


			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg_servico']; ?>",
					  icon: "success"
					});

				</script>

			<?php


		}elseif($_SESSION['msg_servico']=='Erro de inserção, verifique o seu código'){


			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg_servico']; ?>",
					  icon: "error"
					});

				</script>

			<?php


		}elseif($_SESSION['msg_servico']=='Dados alterados com sucesso'){


			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg_servico']; ?>",
					  icon: "success"
					});

				</script>

			<?php


		}elseif($_SESSION['msg_servico']=='Dados excluidos com sucesso'){


			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg_servico']; ?>",
					  icon: "success"
					});

				</script>

			<?php


		}elseif($_SESSION['msg_servico']=='Este serviço já está associado a um orçamento'){


			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg_servico']; ?>",
					  icon: "error"
					});

				</script>

			<?php


		}
		

	}

	unset($_SESSION['msg_servico']);



?>