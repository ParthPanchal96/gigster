<?php include('cfg/cfg.php'); ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<title><?php echo $sitename;?></title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
  ================================================== -->
<link rel="stylesheet" href="<?php echo $serverpath;?>css/base.css">
<link rel="stylesheet" href="<?php echo $serverpath;?>css/skeleton.css">
<link rel="stylesheet" href="<?php echo $serverpath;?>css/layout.css">
<link rel="stylesheet" href="<?php echo $serverpath;?>font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="<?php echo $serverpath;?>css/colorbox.css">
<link rel="stylesheet" href="<?php echo $serverpath;?>css/colors/retina.css">
<link rel="alternate stylesheet" type="text/css" href="<?php echo $serverpath;?>css/colors/color-orange.css" title="orange">
<link rel="alternate stylesheet" type="text/css" href="<?php echo $serverpath;?>css/colors/color-green.css" title="green">
<link rel="alternate stylesheet" type="text/css" href="<?php echo $serverpath;?>css/colors/color-red.css" title="red">
<link rel="alternate stylesheet" type="text/css" href="<?php echo $serverpath;?>css/colors/color-blue.css" title="blue">
<link rel="alternate stylesheet" type="text/css" href="<?php echo $serverpath;?>css/colors/color-yellow.css" title="yellow">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<script style="" src="<?php echo $serverpath;?>js/commonmaputilmarker.js" charset="UTF-8" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="<?php echo $serverpath;?>custom.css" />

<!-- Add jQuery library -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="<?php echo $serverpath;?>js/plugins/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?php echo $serverpath;?>js/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $serverpath;?>js/jquery.fancybox.css?v=2.1.5" media="screen" />
<script>
			$('.fancybox').fancybox();
			$('.fancyboxaddgig').fancybox({
				width:450,
			    height:450
				});
</script>

</head>
<body class="">
<!-- Primary Page Layout
	================================================== -->

<div id="menu-wrap" class="menu-back cbp-af-header cbp-af-header-shrink">
  <div class="container">
    <div class="sixteen columns">
      <div class="logo" style="font-size:29px; line-height:250%; font-weight:700;"><a href="#home" style="color:black;"><img src="<?php echo $serverpath;?>images/Gigster-Logo.png" /></a></div>
      <div style="display: none;" class="">
        <div class="collapse-button"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </div>
      </div>
      <ul class="slimmenu">
        <li> <a class="scroll" href="#home">Home</a> </li>
        <li> <a class="scroll" href="#about">About</a>
        <li class="messages-menu"> <a class="fancybox fancybox.iframe" href="<?php echo $serverpath; ?>gigs.php">Gigs</a> </li>
		<li class="messages-menu"> <a class="fancyboxaddgig fancybox.iframe" href="<?php if(isset($_SESSION['uId'])) { ?>islogin.html<?php } else { ?>nologin.html<?php } ?>" >Add A Gig</a> </li>
        <li> <a class="scroll" href="#contact">Contact Us </a> </li>
        <?php if(isset($_SESSION['uId']))
		{
			?>
        <li> <a href="<?php echo $serverpath;?>dashboard">My Account</a> </li>
        <?php
		}
		?>
      </ul>
    </div>
  </div>
</div>
<div  id="home">
  <div class="mbBgndGallery"></div>
  <div class="just_pattern"></div>
  <div class="bgBox">
    <div class="big-text">
      <ul>
        <li style="top: 0px; opacity: 1;"><span><?php echo $sitename;?></span>
          <div class="small-text" >- Join us to empower the world. -</div>
        </li>
        <li style="opacity: 0; top: -100px;"><span><?php echo $sitename;?></span>
          <div class="small-text" >- Join us to empower the world. -</div>
        </li>
        <li style="top: -100px; opacity: 0;"><span><?php echo $sitename;?></span></li>
      </ul>
    </div>
   
    <div class="social-top" style="padding: 15px 30px;" >
      <ul class="list-social" >
        <li style="background-color:#3b5998;"> <a href="<?php echo $serverpath;?>loginwithfacebook" class="mwhite"><i class="fa fa-facebook"></i> Login with Facebook</a> </li>
        <li style="background-color:#2ba9e1;"> <a href="<?php echo $serverpath;?>loginwithtwitter" class="mwhite"><i class="fa fa-twitter"></i> Login with Twitter</a> </li>
        <li class="gglclr" style="background-color:#dd4b39;"> <a href="<?php echo $serverpath;?>loginwithgoogle" class="mwhite"><i class="fa fa-google"></i> Login with Google</a> </li>
        <li style="background-color:#007bb6;"> <a href="<?php echo $serverpath;?>loginwithtlinkedin" class="mwhite"><i class="fa fa-linkedin"></i> Login with Linkedin</a> </li>
      </ul>
    </div>
  </div>
  <div id="wrapper-slider">
    <div id="controls">
      <div class="prev"></div>
      <div class="next"></div>
    </div>
  </div>
  <a class="scroll" href="#about">
  <div class="scroll-btn tipped tipper-attached" data-title="about agency" data-tipper-options="{&quot;direction&quot;:&quot;top&quot;,&quot;follow&quot;:&quot;true&quot;}"></div>
  </a> </div>
</div>
<div id="about">
  <div class="container">
    <div class="sixteen columns">
      <h1><span>about Gigster</span></h1>
      <div class="head-subtext">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text </div>
    </div>
    <div class="clear"></div>
    <div class="sixteen columns"> </div>
    <div class="clear"></div>
    <div data-sr-complete="true" data-sr-init="true" class="one-fourth column" data-scrollreveal="enter left and move 50px over 1s">
      <h6>WHAT WE DO.</h6>
          <ul class="hmul">
              <li>Get Anything Done<br>Tell us what you need help with and post a Gig.<br></li>
              <li>Choose the Gigster<br>We'll find the right local Gigsters and you just select one.<br></li>
              <li>All done!<br>Once the Gig is done, you pay directly to the Gigster. No additional charges!</li>
          </ul>
    </div>
    <div data-sr-complete="true" data-sr-init="true" class="one-fourth column" data-scrollreveal="enter right and move 50px over 1s">
      <h6>Why use Gigster?</h6>
          <ul class="hmul">
              <li>Get help for anything. Done by your local Gigsters.<br></li>
              <li>No need to spend hours on searching, We will find the right Gigster for you.<br></li>
              <li>Available online and on mobile, making it easy to choose and communicate with your Gigster<br></li>
              <li>There are no service fees! Pay directly to the Gigster.<br></li>
              <li>You decide how much you want to pay.</li>
          </ul>
    </div>
    <div data-sr-complete="true" data-sr-init="true" class="one-fourth column" data-scrollreveal="enter bottom and move 50px over 1s">
      <h6>WHAT WE ACHIEVE.</h6>
      <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.Praesent commodo arcu massa.</p>
    </div>
    <div data-sr-complete="true" data-sr-init="true" class="one-fourth column" data-scrollreveal="enter right and move 50px over 1s">
      <h6>AT THE END.</h6>
      <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.Praesent commodo arcu massa.</p>
    </div>
  </div>
</div>
<div id="contact">
  <div class="just_pattern"></div>
  <div class="just_pattern1"></div>
  <div class="parallax2"></div>
  <div class="container z-index">
    <div class="sixteen columns" data-scrollreveal="enter bottom and move 150px over 1s">
      <div class="contact-wrap">
        <p><i class="icon-contact1">&#xf095;</i><span>call us:</span> (381) 267-6386 <small><em>Monday–Friday | 9am–5pm (GMT +1)</em></small></p>
        <p><i class="icon-contact1">&#xf041;</i><span>Visit Us:</span> First Street, Sunrise Avenue, New York, USA</p>
        <h6>contact us:</h6>
        <form name="ajax-form" id="ajax-form" action="mail-it.php" method="post">
          <label for="name">Your Lovely Name: * <span class="error" id="err-name">please enter name</span> </label>
          <input name="name" id="name" type="text" />
          <label for="email">E-Mail: * <span class="error" id="err-email">please enter e-mail</span> <span class="error" id="err-emailvld">e-mail is not a valid format</span> </label>
          <input name="email" id="email" type="text" />
          <label for="message">Tell Us Everything:</label>
          <textarea name="message" id="message"></textarea>
          <div id="button-con">
            <button class="send_message" id="send">Submit</button>
          </div>
          <div class="error text-align-center" id="err-form">There was a problem validating the form please check!</div>
          <div class="error text-align-center" id="err-timedout">The connection to the server timed out!</div>
          <div class="error" id="err-state"></div>
        </form>
        <div id="ajaxsuccess">Successfully sent!!</div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <br>
  <br>
</div>
<div id="footer"> <a class="scroll" href="#home">
  <div class="back-top">&#xf102;</div>
  </a>
  <div class="container">
    <div class="sixteen columns">
      <p><small>Copyright © 2014 <?php echo $sitename;?>. All Rights Reserved.</small></p>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo $serverpath;?>js/jquery.js"></script> 
<script type="text/javascript" src="<?php echo $serverpath;?>js/modernizr.js"></script> 
<script type="text/javascript" src="<?php echo $serverpath;?>js/classie.js"></script> 
<script type="text/javascript" src="<?php echo $serverpath;?>js/styleswitcher.js"></script> 
<script type="text/javascript" src="<?php echo $serverpath;?>js/retina-1.js"></script> 
<script type="text/javascript" src="<?php echo $serverpath;?>js/mb.js"></script> 
<script type="text/javascript" src="<?php echo $serverpath;?>js/jquery_004.js"></script> 
<script type="text/javascript" src="<?php echo $serverpath;?>js/svganimations.js"></script> 
<script type="text/javascript" src="<?php echo $serverpath;?>js/jquery_003.js"></script> 
<script type="text/javascript" src="<?php echo $serverpath;?>js/jquery_002.js"></script> 
<script type="text/javascript" src="<?php echo $serverpath;?>js/contact.js"></script> 
<script src="<?php echo $serverpath;?>js/main.js" type="text/javascript"></script> 
<script type="text/javascript" src="<?php echo $serverpath;?>js/plugins.js"></script> 
<script type="text/javascript" src="<?php echo $serverpath;?>js/template.js"></script>
</body>
</html>