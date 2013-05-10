<?php
$result = mysql_query("SELECT * FROM users where id ='". get_session_user()->id."'");
while($row = mysql_fetch_assoc($result)){?>
<table border ="">
<body>
<img src="<?php echo web_root().'/uploads/'.get_session_user()->id.'/profile/'.get_session_user()->picture; ?>" width="150" height="140" /><br>
<tr><td>First Name:<?php echo "" . $row['fname'] . "</td></tr><br>";?>
<tr><td>
last Name:<?php echo "" . $row['lname'] . "</td></tr><br>";?>
<tr><td>
About Us:<?php echo "" . $row['about'] . "</td></tr>";}?>
</body>
</table>




  


<!--<table>
<body>
<tr><td>
<img src="<?php echo web_root().'/uploads/'.get_session_user()->id.'/profile/'.get_session_user()->picture; ?>" width="150" height="140" /></td></tr>
<tr>
<td width="10">First Name:<?php echo $udata->fname ?></td></tr><br> 
<tr><td>
last Name:<?php echo $user->lname ?></td></tr><br>
<tr>
<td>
About Us:<?php echo $user->about ?></td></tr>
<tr>
<td>
dob:<?php echo $user->dob ?></td></tr>
<tr>
<td>
Address:<?php echo $user->address ?></td></tr>
<tr>
<td>
About Us:<?php echo $user->about ?></td></tr>
</body>
</table>-->

  




        