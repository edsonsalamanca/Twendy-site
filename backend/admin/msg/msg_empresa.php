<?php

	if (isset($_SESSION['msg_erro'])) {

			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg_erro']; ?>",
					  icon: "error"
					});

				</script>

			<?php
		
		

	}

	unset($_SESSION['msg_erro']);



?>