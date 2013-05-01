<?php echo output_open_form('email'); ?>
<table>
<tr>
<td><input type="text" value="<?php echo $emails->subject;?>" name="form[subject]" placeholder="Subject.." /></td>
<td><input type="text" value="<?php echo $emails->body;?>" name="form[body]" placeholder="Body.." /></td>
<td><input type="text" value="<?php echo $emails->to_id;?>" name="form[to_id]" placeholder="To_id.." /></td>
<td><input type="text" value="<?php echo $emails->from_id;?>" name="form[from_id]" placeholder="From_id..." /></td>
<td><input type="text" value="<?php echo $emails->label_id;?>" name="form[label_id]" placeholder="Label_id.." /></td>
<td><input type="submit" value="<?php echo submit_value(); ?>" name="action"/></td>
</tr>
</table>
<?php echo output_close_form();
echo $email->getHTMLTable();
