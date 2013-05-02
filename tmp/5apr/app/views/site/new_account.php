<form action="index.php?controller=site&action=creating_new_account" method="post">
  <div class="row">
    <label for="username">Username: </label><input type="text" name="form[username]"
   /></div>
  <div class="row">
    <label for="password">Password:</label><input type="password" name="form[password]" />
  </div>
  <div class="row">
    <label for="cpassword">Confirm password: </label><input type="password" name="form[cpassword]" />
  </div>
  <div class="row">
    <label>First name: </label><input id="fname" type="text" name="form[fname]"/>
  </div>
  <div class="row">
    <label for="lname">Last name: </label><input type="text" name="form[lname]" />
  </div>
  <div class="row">
    <label>Date of Birth: </label><select name="form[dob][d]">
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
</select>
</div>
<div class="row"><input type="submit" value="Signup" name="form[signup]" /></div>
</form>