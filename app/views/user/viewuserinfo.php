<?php $val=$user[0];

$profile_pic_directory = $CONFIG['site']['root'].'/uploads/profile/'.$val->id.'/'.$val->picture;

?> 
<table style="font-size:18px;">
    <tr><td><center><img src="<?php echo ($val->picture && file_exists($profile_pic_directory))? web_root().'uploads/profile/'.$val->id . '/' . $val->picture:web_root().'images/noimage.jpg'; ?>" height="250" width="250" /></center>
	</td></tr>
	<tr><td><b> <u>About:- </u></b><?php echo $val->about; ?></td></tr>
	<tr><td><b><u> Dob:-</u> </b><?php echo $val->dob; ?></td></tr>
</table>