<div class="table">
<form action="index.php?controller=email&action=delete" method="post">
<table>
      <tr><input type="submit" value="Delete" name="form[action]" /></tr>
    <tr><th><input type="checkbox"></th>
	    <th></th>
		<th>To</th>
		<th>Subject</th>
		<th>Date</th>
	</tr>	
	<?php foreach($email as $val){?>
	<tr><td><input type="checkbox" name="form[check_id][]" value="<?php echo $val->id; ?>"></td>  
        <td><img src="<?php echo ($val->attachment)?web_root().'images/attachment.png':web_root().'images/email.png'; ?>"></td>
        <td><?php echo '<a href="index.php?controller=user&action=viewUserInfo&id='.$val->to_id.'">' ?><?php echo $val->fname.' '.$val->lname; ?></a></td>
        <td><?php echo'<a href="index.php?controller=email&action=showSentMessage&id='.$val->id.'">'?><?php echo $val->subject; ?></td>
        <td><?php echo $val->getFormattedTime(); //$val->created_on; ?></td>
    </tr>
<?php }?>
</table>
</form>
</div>	
