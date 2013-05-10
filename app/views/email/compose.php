<form method="POST" enctype="multipart/form-data" action="<?php echo get_url(array('email','compose'))?>">
<table>
    <tr><td>Users:</td><td>
     <select name="form[user_id]">
	 <option value="<?php echo get_session_user()->id; ?>"><?php echo get_session_user()->fullName(); ?></option>
      <?php foreach($request as $val){
      echo '<option value="'.$val->id.'">'.$val->fname.' '.$val->lname .'</option>';
      } ?>
      </select>
    </td></tr>
    <tr><td>Subject:</td><td><input type="text" name="form[subject]" value="" /></td></tr>
    <tr><td>Message:</td><td><textarea rows="5" cols="20" name="form[message]"></textarea></td></tr>
    <tr><td>Attachment:</td><td><input type="file" name="form[attachment]" /></td></tr>
    <tr><td></td><td><input type="submit" value="Send" name="form[send]" /></td></tr>
</table> 
</form>
