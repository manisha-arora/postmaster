<form action="<?php echo get_url(array('site','creating_new_account'))?>" method="post">
  <div class="account">
  <table><tr><td>
    <label for="username">Username: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="form[username]" /></td></tr>
    
    <tr><td><label for="password">Password:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="form[password]" /></td></tr>
  
    <tr><td><label for="cpassword">Confirm password: </label>&nbsp;<input type="password" name="form[cpassword]"/></td></tr>
  
  
    <tr><td><label>First name: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="fname" type="text" name="form[fname]"/></td></tr>
  
    <tr><td><label for="lname">Last name: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="form[lname]" /></td></tr>
  
  
    <tr><td><label>Date of Birth: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="form[dob][d]">
        <option value="0">Date</option>
   <?php for($d=1;$d<=31;$d++){
      echo '<option value="'.$d.'">'.$d.'</option>';
    }?>
</select>
<select name="form[dob][m]">
<option value="0">Month</option>
<?php  for($m=1;$m<=12;$m++){
          echo '<option value="'.$m.'">'.$m.'</option>';
     } ?>
</select>
  <select name="form[dob][y]">
        <option value="0">Year</option>
<?php for($y=2013;$y>=1980;$y--){
        echo '<option value="'.$y.'">'.$y.'</option>';
        } ?>
</select></td></tr>
</table>
</div>

<input type="submit" value="Signup" name="form[signup]" />
</form>