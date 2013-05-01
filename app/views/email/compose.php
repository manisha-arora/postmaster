<form method="POST" enctype="multipart/form-data" action="index.php?controller=email&action=compose">
<div class="table">
<table>
    <tr><td>Users:</td><td>
     <select name="form[user_id]">
      <?php foreach($users as $user){
      echo '<option value="'.$user->id.'">'.$user->fullName().'</option>';
      } ?>
      </select>
    </td></tr>
    <tr><td>Subject:</td><td><input type="text" name="form[subject]" value="" /></td></tr>
    <tr><td>Message:</td><td><textarea rows="5" cols="20" name="form[message]"></textarea></td></tr>
    <tr><td>Attachment:</td><td><input type="file" name="form[attachment]" /></td></tr>
    <tr><td></td><td><input type="submit" value="Send" name="form[send]" /></td></tr>
</table> 
</div>
</form>
