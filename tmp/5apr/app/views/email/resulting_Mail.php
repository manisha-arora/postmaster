<table>
		<th></th>
		<th>Name</th>
		<th>Subject</th>
		<th>Date</th>
	</tr>	
	<?php foreach($emails as $val){ ?>
	<tr><td><img src="<?php echo ($val->attachment)?web_root().'images/attachment.png':    web_root().'images/email.png'; ?>"></td>
		<td><a href="index.php?controller=user&action=viewUserInfo&id=<?php echo $val->uid;?>"><?php echo $val->fname .' '.$val->lname ;?></td>
        <td><?php echo $val->subject; ?></td>
        <td><?php echo $val->getFormattedTime();?></td>
    </tr>
<?php }?>
</table>