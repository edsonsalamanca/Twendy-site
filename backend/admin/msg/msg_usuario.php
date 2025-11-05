<?php

	if (isset($_SESSION['msg'])) {

		if ($_SESSION['msg']=='Formatos inválidos, usa apenas jpg,png ou jpeg') {

			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg']; ?>",
					  icon: "error"
					});

				</script>

			<?php
		}elseif($_SESSION['msg']=='Dados cadastrados com sucesso'){


			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg']; ?>",
					  icon: "success"
					});

				</script>

			<?php


		}elseif($_SESSION['msg']=='Já existe um utilizador com este e-mail'){


			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg']; ?>",
					  icon: "error"
					});

				</script>

			<?php


		}elseif($_SESSION['msg']=='Dados atualizados com sucesso'){


			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg']; ?>",
					  icon: "success"
					});

				</script>

			<?php


		}elseif($_SESSION['msg']=='Dados excluidos com sucesso'){


			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg']; ?>",
					  icon: "success"
					});

				</script>

			<?php


		}
		

	}

	unset($_SESSION['msg']);



?>