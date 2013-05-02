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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<style>
body{background-color:white}
div.logo-header{background-color: maroon;border-top-right-radius: 15px; border-top-left-radius: 15px;border-bottom-right-radius: 15px; border-bottom-left-radius: 15px;  border-top-left-radius: 15px;text-indent: 110px;}
div.container{margin-top: 20px; margin-bottom: 20px}
div.menu{background-color: #e8e8e8; padding: 10px 0 10px 0;border-top-right-radius: 15px; border-top-left-radius: 15px;}
td.row{text-align:center}
h3.request{background-color: #98bf21;color:white;text-align:center}
h2.form-title{color:maroon;text-align:center;background-color: white;}
ul.header-menu{margin:0 0 0 10px;padding:0;list-style:none;}
ul.header-menu li{display:inline; margin: 0 10px 0 0}
ul.footer-menu{margin:0;padding:0;list-style:none;float: right;}
ul.footer-menu li{display:inline; margin: 0 10px 0 0}
div.footer{background-color:maroon;}
div.form-row label{display:block}
div.z-form h3 {background-color: #e8e8e8;}
div.right-sidebar{margin:0 0 0 0}
form label{display:block}
div.row{display:block}
div.my_color{background-color: #fff}

</style>
<script>
$(document).ready(function(){
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
</head>
<body>
<div class="container">
  <!--header-->
  <div class="span-24 last logo-header">
     <div class="span-18"><h1><font color="white">zmail</font></h1></div>
  <div class="span-6 last">
      <form action="index.php?controller=email&action=searchMail" method="post">
  <input type="text" placeholder="search" name="form[subject]" value="">
  <input type="submit" name="form[search]" value="Search Mail">
</form>
   </div>
  </div>
  <!--end of header-->

     <?php if(is_user_logged_in()){ ?>
  <div class="span-24 last menu">
   <ul class="header-menu">
   <li><a href="index.php?controller=user&action=setting">Settings</a></li>
   <li><a href="index.php?controller=site&action=logout">Logout</a></li></ul>
  </div>
  <?php } ?>

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

    <div class="span-19">
     <h2 class="form-title"><?php echo $form_title; ?></h2> 
     <?php include($work_area); ?></div>
     <!--right-sidebar-->
     <div class="span-5 right-sidebar last"><?php include($CONFIG['site']['right_sidebar']); ?></div>
  </div>
  <!--end of middle-->
  <!--footer-->
  <div class="span-24 footer last">
    <div class="span-6">Powered by <a href="http://www.izap.in">iZAP</a></div>
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
