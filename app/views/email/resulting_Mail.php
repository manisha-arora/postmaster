<div class="table">
<table width="100%">
		<th></th>
		<th align="left">Name</th>
		<th align="left">Subject</th>
		<th align="left">Date</th>
	</tr>
	<?php foreach($emails as $val){ ?>
	<tr><td><img src="<?php echo ($val->attachment)?web_root().'images/attachment.png':    web_root().'images/email.png'; ?>"></td>
		<td><a href="<?php echo get_url(array('user','viewUserInfo',$val->uid))?>">
<?php echo $val->fname .' '.$val->lname ;?></a></td>
        <td><?php echo $val->subject; ?></td>
        <td><?php echo $val->getFormattedTime();?></td>
    </tr>
<?php }?>
</table>
</div>