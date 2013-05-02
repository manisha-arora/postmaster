<ul>
   <li><a href="<?php echo get_url(); ?>">HOME</a></li>
   <li><a href="<?php echo get_url(array('site','aboutus')); ?>">ABOUT US</a></li>
   <li><a href="<?php echo get_url(array('site','products')); ?>">PRODUCTS</a></li>
   <li><a href="<?php echo get_url(array('site','contactus')); ?>">CONTACT US</a></li>
   <?php if(is_user_logged_in()){ ?>
   <li><a href="<?php echo get_url(array('site','logout')); ?>">LOGOUT</a></li>
  <?php } ?>     
</ul>
