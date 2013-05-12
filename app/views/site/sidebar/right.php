<?php if(is_user_logged_in()): ?>
<div class="r-s-wdgt l-grey">
  <h5>Welcome <?php echo get_session_user()->fullName() ;?></h5>
   <div class="login">
     <div class="span-2"><?php $profile_pic_directory = $CONFIG['site']['root'].'/uploads/profile/'.get_session_user()->id.'/'.get_session_user()->picture;?>
	
	  <img src="<?php echo (get_session_user()->picture && file_exists($profile_pic_directory))? web_root().'/uploads/profile/'.get_session_user()->id .'/'. get_session_user()->picture:web_root().'images/noimage.jpg'; ?>" width="50" height="50" />
	  </div>
	  
	  <div class="span-3 last"><a href="<?php echo get_url(array('user','viewuserinfo',get_session_user()->id)) ?>"><?php echo get_session_user()->username; ?></a> <br />
	  <a href="<?php echo get_url(array('user','setting')) ?>">Settings</a>
	  </div>
	  
	  <div class="clear"></div>
	 </div>
   </div>
   <div class="r-s-wdgt l-grey">
   <h5>Let's compose</h5>
   <div class="login">
		 <ul class="right-navi">
		   <li><a href="<?php echo get_url(array('email','compose')) ?>">Compose Mail</a></li>
		   <li><a href="<?php echo get_url(array('email')) ?>">Inbox</a></li>
		   <li><a href="<?php echo get_url(array('email',sent)) ?>">Sent Mail</a></li>
		 </ul>
	 </div>
   </div>
   <?php if(get_class($controller) != 'siteController'): ?>
   <div class="r-s-wdgt l-grey">
    <h5>Labels</h5>
   <div class="login">
       <ul class="right-navi">
		<?php
		foreach($labels as $lable_object){ ?>
		  <li><a href="<?php echo get_url(array('email','index',$lable_object->id))?>"><?php echo $lable_object->name ?></a></li>
		<?php } ?>
		</ul>
	  </div>
  </div>
  
  <?php if(count($requests)): ?>
    <div class="r-s-wdgt l-grey">
     <h5>Friendship Requests</h5> 
      <div class="login"><?php foreach($requests as $request){ ?>
	    <form action="<?php echo get_url(array('request','acceptreject')) ?>" method='POST'>
	    <div class="span-2">
		 <input type='hidden' name='form[id]' value="<?php echo $request->id ?>" />
	     <?php $profile_pic_directory = $CONFIG['site']['root'].'/uploads/profile/'.$request->from_id.'/'.$request->picture; ?>
       
	   <a href="<?php echo get_url(array('user','viewuserinfo',$request->from_id)) ?>"><?php echo $request->fname;?></a><br />
	   
	   <a href="<?php echo get_url(array('user','viewuserinfo',$request->from_id)) ?>"><img src="<?php echo ($request->picture && file_exists($profile_pic_directory))? web_root().'/uploads/profile/'.$request->from_id .'/'. $request->picture:web_root().'<?php echo web_root(); ?>/images/noimage.jpg'; ?>" width="35" height="28" /></a>
	  </div>
	  <div class="span-3 last">
	    <br>
	    <input type='submit' value='Accept' name='form[accept]' />
        <input type='submit' value='Reject' name='form[reject]' />
	  </div></form>
	  <div class="clear"></div>
      <?php } ?>
	</div>	   
  </div>
<?php endif; ?>

<div class="r-s-wdgt l-grey">
   <h5>Send Requests</h5>
    <div class="login">
     <form action="<?php echo get_url(array('request','send')) ?>" method="POST">
      <input placeholder="Username...." type="text" value="" name="form[username]" />
       <input type="submit" value="Send" name="form[send]" />
     </form>
   </div>
 </div>

  <div class="r-s-wdgt l-grey">
    <h5>Search Mail</h5> 
     <div class="login">
      <form action="<?php echo get_url(array('email','searchmail')) ?>" method="post">
      <input type="text" placeholder="Search" name="form[subject]" value="">
      <input type="submit" name="form[search]" value="Go">
	  </form>
   </div>
 </div>
  <?php endif; // condition for siteController ?>

  <?php else: ?>
 <div class="r-s-wdgt l-grey">
	 <h5>Sign in to Zmail !</h5>
		 <div class="login">
			<form action="<?php echo get_url(array('site','login')) ?>" method="POST">
			<div class="z-form">
			
			<div class="form-row">
			<label>Username:</label>
			<input type="text" name="form[username]" value="" placeholder="Username" />
			</div>
			<div class="form-row">
			<label>Password:</label>
			<input type="password" name="form[password]" value="" placeholder="Password" />
			</div>
			<div class="form-button"><input type="submit" name="action" value="Login" />&nbsp;&nbsp;<input type="button" id="signup" name="signup" value="Create new account" /></div>
			</div>
		</form>
		</div>
	</div>
<?php endif; 
?> 
 <?php if(get_class($controller) == 'siteController'): ?>	
<div class="r-s-wdgt l-grey">
	<h5>Our Products</h5>
	<div class="prdct-area">
		<div class="prdct-slides" >
			<img src="<?php echo web_root(); ?>/images/product-1.jpg" />
		</div>
		<h5>Flanges</h5>
		<span><a href="<?php echo get_url(array('site','products')) ?>">View All</a></span>
	</div>
</div>	
			
<div class="r-s-wdgt l-grey">
	<h5>Our Clients</h5>
	<div class="client-area">
		<div class="client-slides" >
			<img src="<?php echo web_root(); ?>/images/hero-logo.png" />
		</div>
	</div>
</div>
<?php endif; ?>
