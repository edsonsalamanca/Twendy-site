<?php

	if (isset($_SESSION['msg3'])) {


        if ($_SESSION['msg3']=='Dados excluidos com sucesso') {

            ?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg3']; ?>",
					  icon: "success"
					});

				</script>

			<?php
            


        } elseif ($_SESSION['msg3']=='Estado alterado com sucesso') {
          
       
          

			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg3']; ?>",
					  icon: "success"
					});

				</script>

			<?php


        }elseif ($_SESSION['msg3']=='Orçamento alterado com sucesso') {
          
       
          

			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg3']; ?>",
					  icon: "success"
					});

				</script>

			<?php


        }elseif ($_SESSION['msg3']=='Estado do orçamento alterado com sucesso') {
          
       
          

			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg3']; ?>",
					  icon: "success"
					});

				</script>

			<?php


        }elseif ($_SESSION['msg3']=='Orçamento excluidos com sucesso') {
          
       
          

			?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg3']; ?>",
					  icon: "success"
					});

				</script>

			<?php


        }else{


            ?>

				<script>
					Swal.fire({
					  
					  title: "Mensagem de alerta",
					  text: "<?php echo $_SESSION['msg3']; ?>",
					  icon: "error"
					});

				</script>

			<?php


        }
		
		

	}

	unset($_SESSION['msg3']);



?>