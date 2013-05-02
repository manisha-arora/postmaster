<script>
  function check_all(current_element){
    current_form = current_element.form;
    for(i=0;i<=current_form.length;i++){
      frm_element = current_form.elements[i];
      if(frm_element.type == 'checkbox'){
        if(current_element.checked){
         current_form.elements[i].checked = true;
        }else{
         current_form.elements[i].checked = false;
        }
      }
    }
  }
</script>
<div class="table">
<form action="<?php echo get_url(array('email','delete'))?>" method="post">
<table width="100%">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<tr><input type="submit" value="Delete" name="form[action]" /></tr>
	  <hr>
    <tr><th width="16px"><input type="checkbox" name="email_id" onChange="check_all(this)" value=""></th>
	    <th>&nbsp;</th>
		<th align="left">To</th>
		<th align="left">Subject</th>
		<th align="left">Date</th>
	</tr>	
	<?php foreach($email as $val){?>
	<tr><td><input type="checkbox" name="form[check_id][]" value="<?php echo $val->id; ?>"></td>  
        <td><img src="<?php echo ($val->attachment)?web_root().'images/attachment.png':web_root().'images/email.png'; ?>"></td>
        <td> <a href="<?php echo get_url(array('user','viewUserInfo',$val->to_id))?>"><?php echo $val->fname.' '.$val->lname; ?></a></td>
        <td> <a href="<?php echo get_url(array('email','showSentMessage',$val->id))?>"><?php echo $val->subject; ?></td>
        <td><?php echo $val->getFormattedTime(); //$val->created_on; ?></td>
    </tr>
<?php }?>
</table>
</form>
</div>	
