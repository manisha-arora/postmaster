<div class="table">
<form action="index.php?controller=email&action=delete" method="post">
<table>
      <tr><input type="submit" value="Delete" name="form[action]" /></tr>
    <tr><th><input type="checkbox"></th>
	    <th></th>
		<th>To</th>
		<th>Subject</th>
		<th>Date</th>
		<th>Size</th>
	</tr>	
	<?php foreach($email as $val){?>
	<tr><td><input type="checkbox" name="form[check_id][]" value="<?php echo $val->id; ?>"></td>  
        <td><img src="http://ballhankandskein.com/Include/Images/Email-Logo.jpg" height="25" width ="15"></td>
        <td><?php echo $val->fname.' '.$val->lname; ?></td>
        <td><?php echo $val->subject; ?></td>
        <td><?php echo $val->created_on; ?></td>
    </tr>
<?php }?>
</table>
</form>
</div>	
