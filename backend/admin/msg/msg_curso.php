<?php

	if (isset($_SESSION['msg'])) {

		if ($_SESSION['msg']=='Extensão de arquivos inválidas') {

			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg']; ?>",
					  icon: "error"
					});

				</script>

			<?php
		}else{


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