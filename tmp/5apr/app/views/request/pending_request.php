<form action='index.php?controller=request&action=acceptReject' method='POST'>
  <?php foreach($requests as $val){?>
   <input type='hidden' name='form[id]' value=<?php echo $val->id ?> />
<table>
       <?php $profile_pic_directory = $CONFIG['site']['root'].'/uploads/profile/'.$val->from_id.'/'.$val->picture; ?>
  <tr><td>From:<a href="index.php?controller=user&action=viewUserInfo&id=<?php echo $val->         from_id ;?>"><?php echo $val->fname . ' ' .$val->lname ?></a></td></tr>
  
  <tr><td><img src="<?php echo ($val->picture && file_exists($profile_pic_directory))?         web_root().'uploads/profile/'.$val->from_id . '/' . $val->picture:web_root().         'images/noimage.jpg'; ?>" height="50" width="50"/>
      <input type='submit' value='Accept' name='form[accept]' />
      <input type='submit' value='Reject' name='form[reject]' /></td></tr>
</table>
</form>
 <?php } ?>
  