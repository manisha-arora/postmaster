<?php include('_partial.php'); 
$date = get_formatted_date(get_session_user()->dob);?>

<form action="<?php echo get_url(array('user','updateprofile'))?>" method="post" enctype="multipart/form-data"/>
<input type="hidden" name="form[id]" value="<?php echo get_session_user()->id; ?>" />
<table>
    <tr><td>
    <img src="<?php echo web_root().'uploads/profile/'.get_session_user()->id .'/'.get_session_user()->picture; ?>"width="80" height="80"/>
    <input type="file" name="form[picture]" /></td>
	</tr></table>
     
     
     <div class="row">
	 <table><tr><td><label>Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="form[fname]" value="<?php echo get_session_user()->fname;?>">
	 
     <input type="text" name="form[lname]" value="<?php echo get_session_user()->lname;?>"></td></tr>
	  
     <tr><td><label>Dob:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
</select></td></tr>  

      <tr><td><label>Address:</label>&nbsp;<input type="text" name="form[address]" value="<?php echo get_session_user()->address;?>"></td></tr>
     
	  <tr><td><label>About:</label><textarea rows="7" cols="15" name="form[about]"><?php echo get_session_user()->about;?></textarea></td></tr>
	  <tr><td>
	  <input type="submit" value="Save" name="form[action]"></td></tr>
	  </table>
</div>  
</form>  
