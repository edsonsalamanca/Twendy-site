<?php

	if (isset($_SESSION['msg_projeto'])) {

		if ($_SESSION['msg_projeto']=='Formatos inválidos, usa apenas jpg,png ou jpeg') {

			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg_projeto']; ?>",
					  icon: "error"
					});

				</script>

			<?php
		}elseif($_SESSION['msg_projeto']=='Dados cadastrados com sucesso'){


			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg_projeto']; ?>",
					  icon: "success"
					});

				</script>

			<?php


		}elseif($_SESSION['msg_projeto']=='Erro de inserção, verifique o seu código'){


			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg_projeto']; ?>",
					  icon: "error"
					});

				</script>

			<?php


		}elseif($_SESSION['msg_projeto']=='Dados atualizados com sucesso'){


			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg_projeto']; ?>",
					  icon: "success"
					});

				</script>

			<?php


		}elseif($_SESSION['msg_projeto']=='Dados excluidos com sucesso'){


			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg_projeto']; ?>",
					  icon: "success"
					});

				</script>

			<?php


		}

	}

	unset($_SESSION['msg_projeto']);



?>