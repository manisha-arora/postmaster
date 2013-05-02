<?php
  foreach($requests as $request){
    echo "<form action='index.php?controller=request&action=acceptReject' method='POST'>
   <input type='' name='form[id]' value='$request->id' />
 From:{$request->fname}<input type='submit' value='Accept' name='form[accept]' /><input type='submit' value='Reject' name='form[reject]' /></form><br />";
  }
?>
