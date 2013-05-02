<div class="table">
<form action="index.php?controller=email&action=delete" method="post">
<table>
  <tr><select name="form[label_id]">
      <option value="0">Inbox</option>
      <?php foreach($labels as $lable_object){ ?>
      <option value="<?php echo $lable_object->id; ?>"><?php echo $lable_object->name; ?></option>
      <?php } ?>
      </select>
        <input type="submit" value="Move" name="form[action]" />
        <input type="submit" value="Delete" name="form[action]" />
  </tr>
  <tr><th><input type="checkbox" name="email_id" value=""></th>
	    <th></th>
		<th>From</th>
		<th>Subject</th>
		<th>Date</th>
		<th>Size</th>
  </tr>	
	   <?php foreach($email as $val){?>
  <tr><td><input type="checkbox" name="form[check_id][]" value="<?php echo $val->id; ?>"></td>  
        <td><img src="http://ballhankandskein.com/Include/Images/Email-Logo.jpg" height="25" width ="15"></td>
		<td><?php echo $val->fname. ' '. $val->lname; ?></td>
        <td><?php echo'<a href="index.php?controller=email&action=showMessage&id='.$val->id.'">'?><?php echo $val->subject; ?></a></td>
        <td><?php echo $val->created_on; ?></td>
  </tr>
        <?php } ?>	
</table>	
</form>
</div>
