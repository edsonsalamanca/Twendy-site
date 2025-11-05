<?php

	if (isset($_SESSION['msg1'])) {


        if ($_SESSION['msg1']=='Dados atualizados com sucesso') {

            ?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg1']; ?>",
					  icon: "success"
					});

				</script>

			<?php
            


        } else {
          
        
        

			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg1']; ?>",
					  icon: "error"
					});

				</script>

			<?php


        }
		
		

	}

	unset($_SESSION['msg1']);



?>