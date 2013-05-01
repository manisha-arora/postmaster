<?php echo output_open_form('user');  ?>
<table>
<tr>
<td><input type="text" value="<?php echo $users->fname;?>" name="form[fname]" placeholder="First Name.." /></td>

<td><input type="text" value="<?php echo $users->lname;?>" name="form[lname]" placeholder="Last Name.." /></td>
<td><input type="text" value="<?php echo $users->dob;?>" name="form[dob]" placeholder="Date of birth.." /></td>

<td><input type="text" value="<?php echo $users->about;?>" name="form[about]" placeholder="About..." /></td>

<td><input type="text" value="<?php echo $users->address;?>" name="form[address]" placeholder="Address.." /></td>

<td><input type="text" value="<?php echo $users->username;?>" name="form[username]" placeholder="Username.." /></td>

 <td><input type="password" value="<?php echo $users->password;?>" name="form[password]" placeholder="Password.." /></td>

 <td><input type="checkbox" name="form[is_admin]" value="1" <?php if($users->is_admin){ echo 'checked="checked"';} ?> /></td>
 
 <td><?php echo ouput_submit_button(); ?></td>
 </tr>
</table>

<?php
     echo output_close_form();
     echo $user->getHTMLTable();
