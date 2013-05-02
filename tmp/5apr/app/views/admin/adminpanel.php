<?php include($CONFIG['site']['app_path'].'/views/site/_partial.php'); ?>
<table>
     <th><u> Users profile </u></th>
     <th><u> Admin</u></th>
     <th><u> Action</u></th>

<?php foreach($user as $val){?> 
<tr><td align="left"> 
    <b>Name:</b><?php echo $val->fullName() ; ?><br>
    <b>Username:</b><?php echo $val->username; ?><br>
    <b>Dob:</b><?php echo $val->dob; ?><br></td>
    <td><?php echo ($val->is_admin)?'Yes':'No'; ?>
    </td>
<td>
  <a href="index.php?controller=admin&action=edit&id=<?php echo $val->id;?>">Edit</a> /
  <a href="index.php?controller=admin&action=delete&id=<?php echo $val->id;?>">Delete</a></td></tr>
	
   <?php } ?>	
</table>