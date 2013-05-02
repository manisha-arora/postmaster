<?php include($CONFIG['site']['app_path'].'/views/site/_partial.php'); ?>
<div class="table">
<table width="100%">
     <tr><th align="left"><u> Users</u></th>
     <th align="left"><u> Admin</u></th>
     <th align="left"><u> Action</u></th>
	 </tr>
<?php foreach($user as $val){?> 
<tr><td align="left"> 
    <b>Name:</b><?php echo $val->fullName() ; ?><br>
    <b>Username:</b><?php echo $val->username; ?><br>
    <b>Dob:</b><?php echo $val->dob; ?><br></td>
    <td><?php echo ($val->is_admin)?'Yes':'No'; ?>
    </td>
<td>

  <a href="<?php echo get_url(array('admin','edit',$val->id))?>">Edit</a>
  <a href="<?php echo get_url(array('admin','delete',$val->id))?>">Delete</a>
  
  </td></tr>
   <?php } ?>	
</table>
</div>