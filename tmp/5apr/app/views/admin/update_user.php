<?php include($CONFIG['site']['app_path'].'/views/site/_partial.php'); ?>
<form action="index.php?controller=admin&action=updateUser" method="post">
  <div class="row">
   <?php foreach($user as $info){?>
   <input type="hidden" name="id" value="<?php $id=get_input('id');
   echo $id;?>" >
	 <label>First Name:</label><input type="text" name="form[fname]" value="<?php echo $info->fname;?>">
	 
     <label>Last Name:</label><input type="text" name="form[lname]" value="<?php echo $info->lname;?>">
	 
	 <label>About:</label><textarea name="form[about]" ><?php echo $info->about; ?>
      </textarea>	 
	  
	 <label>Password:</label><input type="password" name="form[password]" value="">
	 </div>
	 
	 <label>Admin:<input type="checkbox" name="form[is_admin]" value="1" <?php if($info->is_admin){ echo 'checked="checked"';} ?>>
     
	 <?php }?>
	 <br><input type="submit" value="Save" name="form[action]"> 
</form>  