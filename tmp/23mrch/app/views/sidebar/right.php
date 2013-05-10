<?php
  if(is_user_logged_in()){ ?>
     <a href="index.php?controller=email&action=compose">Compose Mail</a><br>
     <a href="index.php?controller=email">Inbox</a><br>
	 <a href="index.php?controller=email&action=sent">Sent Mail</a>
<br><br>
<h3>Labels</h3>
<?php
foreach($labels as $lable_object){
  echo '<a href="index.php?controller=email&label_id='.$lable_object->id.'">'.$lable_object->name.'</a><br>';
}
} else { ?>
<form action="index.php?controller=site&action=login" method="POST">
<div class="z-form">
<h3>Sign in to Zmail !</h3>
<div class="form-row">
<label>Username:</label>
<input type="text" name="form[username]" value="" />
</div>
<div class="form-row">
<label>password:</label>
<input type="password" name="form[password]" value="" />
</div>
<div class="form-button"><input type="submit" name="action" value="Login" /></div>
&nbsp
&nbsp
&nbsp
<div><h5><a href="index.php?controller=site&action=creating_new_account"><font color="">create new Account</font></a></h5></div>
</form>

</div>
<?php } ?>
