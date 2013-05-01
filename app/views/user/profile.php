<?php include('_partial.php'); ?>
<form action="index.php?controller=user&action=editProfile" method="post">
<input type="hidden" name="form[id]" value="<?php echo get_session_user()->id; ?>" />
<table>
      <tr><td><label>First Name:</label></td><td><input type="text" name="form[fname]"        value="<?php echo get_session_user()->fname;?>"></td>
      </tr>
      <tr><td><label>Last Name:</label></td><td><input type="text" name="form[lname]"        value="<?php echo get_session_user()->lname;?>"></td>
	  </tr>
      <tr><td><label>About:</label></td><td><textarea rows="7" cols="15" 
	          name="form[about]"><?php echo get_session_user()->about;?></textarea></td>
	  </tr>
      <tr><td></td><td><input type="submit" value="Save" name="form[action]"></tr></td>
</table>	  
</form>  