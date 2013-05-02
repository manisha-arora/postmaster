<?php include($CONFIG['site']['app_path'].'/views/site/_partial.php');
?>
      
<table>
   <tr><th><u>Friends</u></th>
        <th><u>Action</u></th></tr>
      <?php foreach($friends as $friend){
	    $profile_pic_directory = $CONFIG['site']['root'].'/uploads/profile/'.$friend->id.'/'.$friend->picture;?> 
   <tr><th><a href="index.php?controller=user&action=viewUserInfo&id=<?php echo $friend->id;?>"><?php echo $friend->fname .' '.$friend->lname ;?></th></tr>
	
   <tr><th><img src="<?php echo ($friend->picture && file_exists(                      $profile_pic_directory))?web_root().'uploads/profile/'.$friend->id . '/' . $friend->picture:web_root().'images/noimage.jpg'; ?>" height="60" width="60"/></th>		
    
       <th><a href="index.php?controller=request&action=delete&id=<?php echo $friend->rid;?>">Unfriend</a></th></tr>
	        <?php } ?>	
</table>