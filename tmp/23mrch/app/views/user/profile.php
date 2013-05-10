<?php include('_partial.php'); ?>
 
 <form action="index.php?controller=user&action=updateProfile" method="post" enctype="multipart/form-data"/>

<input type="hidden" name="form[id]" value="<?php echo get_session_user()->id; ?>" />
<table>
<tr><td>
<img src="<?php echo web_root().'/uploads/'.get_session_user()->id.'/profile/'.get_session_user()->picture; ?>" width="200" height="200" /> <br />

</td><td>
<input type="file" name="form[picture]" />
</td>
      </tr>
      <tr><td><label>First Name:</label></td><td><input type="text" name="form[fname]"        value="<?php echo get_session_user()->fname;?>"></td>
      </tr>
      <tr><td><label>Last Name:</label></td><td><input type="text" name="form[lname]"        value="<?php echo get_session_user()->lname;?>"></td>
	  </tr>
      <tr><td><label>About us:</label></td><td><textarea rows="7" cols="15" 
	          name="form[about]"><?php echo get_session_user()->about;?></textarea></td>
	  </tr>
	  <tr><td><label>address:</label></td><td><input type="text" name="form[address]"        value="<?php echo get_session_user()->address;?>"></td>
      </tr>

<tr><td></td><td><input type="submit" value="Save" name="form[action]"></tr></td>
</table>	  
</form>  
