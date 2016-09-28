<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="robots" content="noindex">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Jessica</title>
    <meta name="description" content="This is the Jessica Theme.">
    <link href='http://fonts.googleapis.com/css?family=Tinos:400,700,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
    <body>

      <header class="site-header wrap">

        <div class="title-head">
          <h1 class="site-title"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/jessica-logo.png" width="225" height="auto"><span class="screen-reader-text">Jessica</span></h1>
          <p class="site-desc">Jessica is elegant and beautiful, just like you.</p>
        </div>

        <ul class="social-head">
          <li><a href=""><span class="fa fa-facebook"></span><span class="screen-reader-text">Facebook</span></a></li>
          <li><a href=""><span class="fa fa-twitter"></span><span class="screen-reader-text">Twitter</span></a></li>
          <li><a href=""><span class="fa fa-google-plus"></span><span class="screen-reader-text">Google Plus</span></a></li>
          <li><a href=""><span class="fa fa-instagram"></span><span class="screen-reader-text">Instagram</span></a></li>
          <li><a href=""><span class="fa fa-envelope"></span><span class="screen-reader-text">Contact</span></a></li>
        </ul>
        
      </header>

      <nav class="main-menu">
				<div id="menu" class="wrap" role="navigation">
				  <a href="#menu"><span class="fa fa-bars"></span><span class="screen-reader-text">Show Navigation</span></a>
				  <a href="#"><span class="fa fa-times"></span><span class="screen-reader-text">Hide Navigation</span></a>
				  <ul><!-- FIRST -->
				    <li><a href="index.php">Home</a></li>
				    <li><a href="archive.php">Blog</a></li>
				  	<li><a href="page.php">Page</a></li>
				    <li><a href="single.php">Single</a></li>
				    <li><a href="page-sidebar.php">Page w/Sidebar</a></li>
				    <li><a href="gallery.php">Gallery</a></li>
				  	<li><a href="contact.php">Contact Us</a></li>
				    <li><a href="ui-elements.php">UI Elements</a></li>
				  </ul>
			  </div>
			</nav>

			<?php get_template_part('includes/home', 'slider'); ?>
			<?php get_template_part('includes/home', 'page'); ?>

    <footer>
    	<div class="footer-1 wrap clearfix">

    		<aside class="foot-col">
    			<div class="widget">
    				<h4 class="widgettitle">About Us</h4>
    				<p><strong>Jessica</strong> lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
    			</div>
    			<div class="widget">
    				<h4 class="widgettitle">Connect With Us</h4>
    				<ul class="social-foot">
		          <li><a href=""><span class="fa fa-facebook"></span><span class="screen-reader-text">Facebook</span></a></li>
		          <li><a href=""><span class="fa fa-twitter"></span><span class="screen-reader-text">Twitter</span></a></li>
		          <li><a href=""><span class="fa fa-google-plus"></span><span class="screen-reader-text">Google Plus</span></a></li>
		          <li><a href=""><span class="fa fa-instagram"></span><span class="screen-reader-text">Instagram</span></a></li>
		          <li><a href=""><span class="fa fa-envelope"></span><span class="screen-reader-text">Contact</span></a></li>
		        </ul>
    			</div>
    		</aside>

    		<aside class="foot-col">
    			<div class="widget">
    				<h4 class="widgettitle">Page Links</h4>
    				<ul>
    					<li><a href="#">Home</a></li>
    					<li><a href="#">Portfolio</a></li>
    					<li><a href="#">Blog</a></li>
    					<li><a href="#">Galleries</a></li>
    					<li><a href="#">About</a></li>
    					<li><a href="#">Services</a></li>
    					<li><a href="#">Contact</a></li>
    				</ul>
    			</div>
    		</aside>

    		<aside class="foot-col">
    			<div class="widget">
    				<h4 class="widgettitle">Archives</h4>
    				<ul>
    					<li><a href="#">April 2015 <span>(20)</span></a></li>
    					<li><a href="#">March 2015 <span>(25)</span></a></li>
    					<li><a href="#">February 2015 <span>(18)</span></a></li>
    					<li><a href="#">January 2015 <span>(30)</span></a></li>
    					<li><a href="#">December 2014 <span>(15)</span></a></li>
    					<li><a href="#">November 2014 <span>(16)</span></a></li>
    				</ul>
    			</div>
    		</aside>

    		<aside class="foot-col">
    			<div class="widget">
    				<h4 class="widgettitle">Instagram</h4>
    				<ul class="instagram">
    					<li><a href="#"><img src="http://placehold.it/86x80.jpg" width="86" height="80"></a></li>
    					<li><a href="#"><img src="http://placehold.it/86x80.jpg" width="86" height="80"></a></li>
    					<li><a href="#"><img src="http://placehold.it/86x80.jpg" width="86" height="80"></a></li>
    					<li><a href="#"><img src="http://placehold.it/86x80.jpg" width="86" height="80"></a></li>
    					<li><a href="#"><img src="http://placehold.it/86x80.jpg" width="86" height="80"></a></li>
    					<li><a href="#"><img src="http://placehold.it/86x80.jpg" width="86" height="80"></a></li>
    				</ul>
    			</div>
    		</aside>

    	</div><?php // End .footer-1 ?>

	    <div class="footer-2 wrap">
	      <p>Copyright <?php echo date('Y'); ?> &copy; <a href="http://themehoney.com" target="_blank">Theme Honey</a> & <a href="http://angelajholden.com" target="_blank">Angela J. Holden</a></p>
	    </div>
    </footer>

	  <script src="<?php echo get_stylesheet_directory_uri(); ?>/compiled/base.min.js"></script>

  </body>
</html>