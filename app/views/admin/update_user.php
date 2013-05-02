<?php include($CONFIG['site']['app_path'].'/views/site/_partial.php'); ?>
<form action="<?php echo get_url(array('admin','updateUser'))?>" method="post">
  <div class="row">
   <?php foreach($user as $info){?>
   <input type="hidden" name="id" value="<?php $id=get_input('id');
   echo $id;?>" >
   <table><tr><td>
	 <label>First Name:</label>&nbsp;<input type="text" name="form[fname]" value="<?php echo $info->fname;?>"></td></tr>
	 
     <tr><td><label>Last Name:</label>&nbsp;<input type="text" name="form[lname]" value="<?php echo $info->lname;?>"></td></tr>
	 
	 <tr><td><label>About:</label><textarea name="form[about]" ><?php echo $info->about; ?>
      </textarea></td></tr>	 
	  
	 <tr><td><label>Password:</label>&nbsp;<input type="password" name="form[password]" value=""></td></tr>
	 
	 <tr><td><label>Admin:</label>&nbsp;<input type="checkbox" name="form[is_admin]" value="1" <?php if($info->is_admin){ echo 'checked="checked"';} ?>></td></tr>
     </table></div>
	 <?php }?>
	 <br><input type="submit" value="Save" name="form[action]"> 
</form>  