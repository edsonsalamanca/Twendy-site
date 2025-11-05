<?php

	if (isset($_SESSION['msg_empresa'])) {




			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg_empresa']; ?>",
					  icon: "success"
					});

				</script>

			<?php
		
		

	}

	unset($_SESSION['msg_empresa']);



?>