<form>
<?php foreach($email as $val){ ?>
    <br><label>From:</label><?php echo $val->from_id; ?>
	<br><label>To:</label><?php echo $val->to_id; ?>
    <br><label>Message:</label><?php echo $val->body; ?>
	  <?php } ?>
</form>	  