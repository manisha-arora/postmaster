<?php include($CONFIG['site']['app_path'].'/views/site/_partial.php'); 
$id=get_input('id');
$action = ($id)?'edit':'add';
?>
<form action="index.php?controller=lable&action=<?php echo $action ?>" method="post">
<input type="hidden" name="form[id]" value="<?php echo $id ?>" />

      <label>Label:<input type="text" name="form[name]" value="<?php echo $edit_lable[0]->name; ?>" /><input type="submit" value="<?php
	   echo ($id)?'Update':'Add'; ?>" name="form[add_update]" />
	  <table>
	  <tr><th>Sr.</th>
	      <th>Label</th>
	      <th>Action</th>
     </tr>
<?php foreach($lables as $val){ ?>
     <tr><td><?php echo $val->id; ?></td>
	     <td><?php echo $val->name; ?></td>
	     <td><a href="index.php?controller=lable&action=edit&id=<?php echo $val->id;?>">Edit</a> / <a href="index.php?controller=lable&action=delete&id=<?php echo $val->id;?>">Delete</a></td>
    </tr>
 <?php }?>
</table>
</form>
