<?php $val=$user[0];

$profile_pic_directory = $CONFIG['site']['root'].'/uploads/profile/'.$val->id.'/'.$val->picture;

?> 
<table>
    <tr><td class="row"><img src="<?php echo ($val->picture && file_exists($profile_pic_directory))? web_root().'uploads/profile/'.$val->id . '/' . $val->picture:web_root().'images/noimage.jpg'; ?>" height="250" width="350"/>
	</td></tr>
	<tr><td align="left"><b> About: </b><?php echo $val->about; ?></td></tr>
	<tr><td align="left"><b> Dob: </b><?php echo $val->dob; ?></td></tr>
</table>
