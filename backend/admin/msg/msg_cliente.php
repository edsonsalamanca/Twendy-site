<?php

	if (isset($_SESSION['msg_cliente'])) {


        if ($_SESSION['msg_cliente']=='Cliente excluido com sucesso') {

            ?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg_cliente']; ?>",
					  icon: "success"
					});

				</script>

			<?php
            


        } else {
          
        
        

			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg_cliente']; ?>",
					  icon: "error"
					});

				</script>

			<?php


        }
		
		

	}

	unset($_SESSION['msg_cliente']);



?>