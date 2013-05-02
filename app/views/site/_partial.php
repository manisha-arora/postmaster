<table>
<tr><td><a href="<?php echo get_url(array('user','setting'));?>">Edit Profile</a>  |  <a href="<?php echo get_url(array('lable'));?>">Manage Labels</a> | <a href="<?php echo get_url(array('request','friends'));?>">Friends</a><?php if(admin_gateway()){ ?> | <a href="<?php echo get_url(array('admin'));?>">Manage users</a><?php } ?></tr>
</table>