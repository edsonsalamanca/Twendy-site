<?php

	if (isset($_SESSION['msg2'])) {


        if ($_SESSION['msg2']=='Senha alterada com sucesso') {

            ?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg2']; ?>",
					  icon: "success"
					});

				</script>

			<?php
            


        } else {
          
        
        

			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg2']; ?>",
					  icon: "error"
					});

				</script>

			<?php


        }
		
		

	}

	unset($_SESSION['msg2']);



?>