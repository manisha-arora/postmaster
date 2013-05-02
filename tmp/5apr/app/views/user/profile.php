<?php include('_partial.php'); 
$date = get_formatted_date(get_session_user()->dob);

?>
<form action="index.php?controller=user&action=updateProfile" method="post" enctype="multipart/form-data"/>
<input type="hidden" name="form[id]" value="<?php echo get_session_user()->id; ?>" />
<table>
    <tr><td>
    <img src="<?php echo web_root().'uploads/profile/'.get_session_user()->id .'/'.get_session_user()->picture; ?>"width="200" height="200"/> </td>
	</tr></table>
     <input type="file" name="form[picture]" />
     <br><br>
     <div class="row">
	 <label>First Name:</label></td><td><input type="text" name="form[fname]"        value="<?php echo get_session_user()->fname;?>">
	 
     <label>Last Name:</label></td><td><input type="text" name="form[lname]" value="<?php echo get_session_user()->lname;?>">
	  
 <label>Date of Birth: </label>
 <select name="form[dob][y]">
        <option value="0">Year</option>
<?php for($y=2013;$y>=1980;$y--){
    echo '<option value="'.$y.'"'.(($date['y']==$y)?'selected':''). '>'.$y.'</option>';
} ?>
</select>
  <select name="form[dob][m]">
         <option value="0">Month</option>
<?php  for($m=1;$m<=12;$m++){
          echo '<option value="'.$m.'"'.(($date['m']==$m)?'selected':''). '>'.$m.'</option>';
     } ?>
</select>
  <select name="form[dob][d]">
        <option value="0">Date</option>
   <?php for($d=1;$d<=31;$d++){
      echo '<option value="'.$d.'"'.(($date['d']==$d)?'selected':''). '>'.$d.'</option>';
    }?>
</select>  
	  <label>About:</label></td><td><textarea rows="7" cols="15" 
	          name="form[about]"><?php echo get_session_user()->about;?></textarea>
	 
	  <label>Address:</label></td><td><input type="text" name="form[address]"        value="<?php echo get_session_user()->address;?>">
     
	  <input type="submit" value="Save" name="form[action]">
</div>  
</form>  
