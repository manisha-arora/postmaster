<div class="lable">
<?php include($CONFIG['site']['app_path'].'/views/site/_partial.php'); 
$id=get_input('id');
$action = ($id)?'edit':'add';
?>
<form action="<?php echo get_url(array('lable',$action)) ?>" method="post">
<input type="hidden" name="form[id]" value="<?php echo $id ?>" />

      <label>Label:<input type="text" name="form[name]" value="<?php echo $edit_lable[0]->name; ?>" /><input type="submit" value="<?php
	   echo ($id)?'Update':'Add'; ?>" name="form[add_update]" />
	  <table width="100%">
	  <tr><th alignleft">Sr.</th>
	      <th align="left" >Label</th>
	      <th align="left">Action</th>
     </tr>
<?php foreach($lables as $val){ ?>
     <tr><td><?php echo $val->id; ?></td>
	     <td><?php echo $val->name; ?></td>
	     <td><a href="<?php echo get_url(array('lable','edit',$val->id));?>">Edit</a> / <a href=" <?php echo get_url(array('lable','delete',$val->id));?>">Delete</a></td>
    </tr>
 <?php }?>
</table>
</form>
</div>
