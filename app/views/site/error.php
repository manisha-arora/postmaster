<?php if(count($_SESSION['success'])){
       $success = return_message('success');
       foreach($success as $s_message){
         echo '<div class="success" onClick="hide(this)">'.$s_message.'</div>';
       }
     } ?>
     <?php if(count($_SESSION['error'])){
       $error = return_message('error');
        foreach($error as $e_message){
         echo '<div class="error" onClick="hide(this)">'.$e_message.'</div>';
       }
     } ?>
     <?php if(count($_SESSION['info'])){
       $info = return_message('info');
         foreach($info as $i_message){
         echo '<div class="info" onClick="hide(this)">'.$i_message.'</div>';
       }
     } ?>
