<?php $val = $email[0];
 $profile_pic_directory = $CONFIG['site']['root'].'/uploads/profile/'.$val->from_id.'/'.$val->picture;
 $profile_pic = $CONFIG['site']['root'].'/uploads/profile/'.get_session_user()->id . '/'.get_session_user()->picture; ?>
<table>
    <?php $action=get_input('action'); 
	if($action == showInboxMessage){?>
<tr><td>
    <img src="<?php echo ($val->picture && file_exists(                  $profile_pic_directory))?web_root().'uploads/profile/'.$val->from_id . '/' . $val->picture:web_root().'images/noimage.jpg'; ?>" height="70" width="60"/></th></tr>
    
	&nbsp;&nbsp;&nbsp;<tr><td><a href="<?php echo get_url(array('user','viewUserInfo',$val->from_id))?>"><?php echo $val->fname . ' ' . $val->lname; ?></a><tr>
	
<td>To:<a href="<?php echo get_url(array('user','viewUserInfo',$val->to_id))?>"><?php echo get_session_user()->fname . ' ' .get_session_user()->lname; ?></a></td></tr>
	     <?php } else { ?>
		 
<tr><td><img src="<?php echo (get_session_user()->picture && file_exists($profile_pic))?web_root().'uploads/profile/'.get_session_user()->id . '/' .get_session_user()->picture:web_root().'images/noimage.jpg'; ?>" height="70" width="60"/></td>
</tr>	
   <tr><td><a href="<?php echo get_url(array('user','viewUserInfo',$val->from_id))?>"><?php echo get_session_user()->fname . ' ' .get_session_user()->lname ; ?></a></td></tr>
	
   <th>To:<a href="<?php echo get_url(array('user','viewUserInfo',$val->to_id))?>"><?php echo $val->fname . ' ' . $val->lname; ?></a></th></tr>
	<?php }?>
	<th><u>Date:</u><?php echo $val->getFormattedTime(); ?></th></tr>
	<?php if($val->body){ ?>
    <tr><th><u>Message:</u><?php echo $val->body; ?></th></tr>
	<?php } ?>
</table>

<?php if($val->attachment){ 
$icon = $CONFIG['file'][get_file_extentions($val->attachment)];
?>
<table>
	<tr><th><b><u>Attachment:</u></b></th></tr>
	<tr><th><a href="<?php echo web_root() . 'uploads/'. $val->from_id . '/' . $val->attachment;?>"><img src="<?php echo $icon; ?>" height="50" width="50"></a></th></tr>
</table>	
<?php } ?>
