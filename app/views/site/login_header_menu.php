<?php if(is_user_logged_in()){ ?>
        <ul class="header-menu">
        <?php $profile_pic_directory = $CONFIG['site']['root'].'/uploads/profile/'.get_session_user()->id.'/'.get_session_user()->picture;?>
  <li><a href="index.php?controller=user&action=viewUserInfo&id=<?php echo get_session_user()->id ;?>"><img src="<?php echo (get_session_user()->picture && file_exists($profile_pic_directory))? web_root().'/uploads/profile/'.get_session_user()->id .'/'. get_session_user()->picture:web_root().'images/noimage.jpg'; ?>" width="50" height="40" /></a></li>

   <li><a href="index.php?controller=user&action=viewUserInfo&id=<?php echo get_session_user()->id ;?>"><?php echo get_session_user()->fullName(); ?></a></li>

   <li><a href="index.php?controller=user&action=setting">Settings</a></li>
   <li><a href="index.php?controller=site&action=logout">Logout</a></li></ul>
  <?php } ?>
 