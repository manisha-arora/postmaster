<html>
<head>
  <title><?php echo $window_title; ?></title>
  <link rel="stylesheet" href="<?php echo web_root(); ?>css/screen.css" type="text/css" media="screen, projection">
  <link rel="stylesheet" href="<?php echo web_root(); ?>css/print.css" type="text/css" media="print">    
<!--[if lt IE 8]><link rel="stylesheet" href="<?php echo web_root(); ?>css/ie.css" type="text/css" media="screen, projection"><![endif]-->
<script type="text/javascript" src="<?php echo web_root(); ?>vendors/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
        tinyMCE.init({
                mode : "textareas",
                theme : "simple"
        });
</script>
<style>
h2.form-title{background-color: red;}
h2.form-title{color:white;text-align:center;}
ul.header-menu{margin:20px 0 0 0;padding:0;list-style:none;float: right;}
ul.header-menu li{display:inline; margin: 0 10px 0 0}
ul.footer-menu{margin:0;padding:0;list-style:none;float: right;}
ul.footer-menu li{display:inline; margin: 0 10px 0 0}
div.footer{background-color:#e8e8e8;}
div.form-row label{display:block}
div.z-form h3 {background-color: #e8e8e8;}
div.right-sidebar{margin:0 0 0 0}
form label{display:block}
</style>
</head>
<body>

<div class="container">
  <!--header-->
  <div class="span-24 last">
     <div class="span-5"><a href="<?php echo web_root(); ?>"><img src="images/ppm_logo.png" alt="LOGO" /></a></div>
     <div class="span-19 last">
     <?php if(is_user_logged_in()){ ?>
        <ul class="header-menu">
   <li><img src="<?php echo web_root().'/uploads/'.get_session_user()->id.'/profile/'.get_session_user()->picture; ?>" width="50" height="50" /></li>
<li><a href="index.php?controller=user&action=profile"><?php echo get_session_user()->fullName(); ?></a></li>
   <li><a href="index.php?controller=user&action=setting">Settings</a></li>
<li><a href="index.php?controller=site&action=logout">Logout</a></li></ul>
  <?php } ?>   </div>
  </div>
  <!--end of header-->
  <!--middle-->
  <div class="span-24 last">
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

     <!--workarea--> 
    <div class="span-19">
     <h2 class="form-title"><?php echo $form_title; ?></h2> 
     <?php include($work_area); ?></div>
     <!--right-sidebar-->
     <div class="span-5 right-sidebar last"><?php include($CONFIG['site']['right_sidebar']); ?></div>
  </div>
  <!--end of middle-->
  <!--footer-->
  <div class="span-24 footer last">
    <div class="span-6">Powerd by <a href="http://www.izap.in">iZAP</a></div>
    <div class="span-18 last">
      <ul class="footer-menu">
      <li><a href="index.php?controller=site">Home</a></li>
      <li><a href="">Career</a></li>
      <li><a href="">About us</a></li>
      <li><a href="">Privacy policy</a></li>
     </ul>
    </div>
  </div>
  <!--end of footer-->
</div>
</body>
</html>
