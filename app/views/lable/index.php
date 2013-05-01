<?php echo output_open_form('lable'); ?>
<table>
<tr>
<td><input type="text" value="<?php echo $lables->name;?>" name="form[name]" placeholder="Name.." /></td>

<td><input type="submit" value="<?php echo submit_value(); ?>" name="action"/></td>
</tr>
</table>

<?php
     echo output_close_form();
	 echo $lab->getHTMLTable();