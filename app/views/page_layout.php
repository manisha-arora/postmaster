<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo  $CONFIG['site']['window_title_prefix'].(($window_title)?" :: $window_title ":''); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo web_root();?>css/screen.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo web_root();?>css/print.css" media="print" />
<link rel="stylesheet" type="text/css" href="<?php echo web_root();?>css/prop.css" media="screen, projection" />
<script type="text/javascript" src="<?php echo web_root();?>js/jquery-1.4.4.min.js"></script>
<link rel="stylesheet" href="<?php echo web_root();?>css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<script src="<?php echo web_root();?>js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
function slideSwitch() {
    var $active = $('.slideshow IMG.active');
    if ( $active.length == 0 ) $active = $('.slideshow IMG:last');
    // use this to pull the images in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('.slideshow IMG:first');
    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}
$(document).ready(function(){
  setInterval( "slideSwitch()", 5000);
  
  $('#signup').click(function(){
    window.location.replace("index.php?controller=site&action=creating_new_account");
  });
  
  $(".error").click(function(){
    $(this).slideUp("fast");
  });
  
  $(".success").click(function(){
    $(this).slideUp("fast");
  });

  $(".info").click(function(){
    $(this).slideUp("fast");
  });
  
});
</script>
<script type="text/javascript" src="<?php echo web_root(); ?>vendors/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
        tinyMCE.init({
                mode : "textareas",
                theme : "simple"
        });
</script>
</head>
<body>
<div class="logo"><img src="<?php echo web_root();?>images/logo/logo.jpg" /></div>
<div class="container">
    <div class="header">
       <?php include('site/header/menu.php'); ?> 
       <div class="clear"></div>
    </div>
    <div class="banner span-24">
        <div class="slideshow">
            <img src="<?php echo web_root(); ?>/images/banner-1.jpg" class="active" />
            <img src="<?php echo web_root(); ?>/images/banner-2.jpg" />
            <img src="<?php echo web_root(); ?>/images/banner-3.jpg" />
        </div>
       
    </div>
    <div class="clear"></div>
	
	<?php if(count($_SESSION['success'])){
       $success = return_message('success');
       foreach($success as $s_message){
         echo '<div class="success">'.$s_message.'</div>';
       }
     } ?>
     <?php if(count($_SESSION['error'])){
       $error = return_message('error');
        foreach($error as $e_message){
         echo '<div class="error">'.$e_message.'</div>';
       }
     } ?>
     <?php if(count($_SESSION['info'])){
       $info = return_message('info');
         foreach($info as $i_message){
         echo '<div class="info">'.$i_message.'</div>';
       }
     } ?> 
    <div class="workspace span-24 last">
      <?php if($right_sidebar): ?>
      <div class="l-h-s-content span-17">
           <h1 class="page-hdng" style="background-color:skyblue;color:blue;text-align:center"><?php echo $form_title; ?></h1>
           <?php include($work_area); ?>    
        </div>
        <div class="r-h-s-content span-7 last">
          <?php include('site/sidebar/right.php'); ?>
        </div>
      <?php else: ?>
           <h1 class="page-hdng"><?php echo $form_title; ?></h1>
           <?php include($work_area); ?>    
      <?php endif; ?>
      
    </div>
</div>
<div class="footer">
	<span><a href="http://www.izap.in/">Powered by iZAP</a></span>
       <?php include('site/header/menu.php'); ?> 
</div>
<div class="back"></div>
</body>
</html>
