<!DOCTYPE html>
<!-- Header -->
<html>
<header id="header" class="alt">
	<title><?php if($_GET['module']){ echo $_GET['module'];}else{ echo "main";} ?> </title>

	<!-- CSS -->
	<link href="<?php echo CSS_PATH ?>font-awesome.min.css" rel="stylesheet" />
	<link href="<?php echo CSS_PATH ?>ie8.css" rel="stylesheet" />
	<link href="<?php echo CSS_PATH ?>ie9.css" rel="stylesheet" />
	<link href="<?php echo CSS_PATH ?>main.css" rel="stylesheet" />


	<!-- Scripts -->
	<script src="<?php echo PLUGIN_PATH ?>jquery.min.js"></script>
	<script src="<?php echo PLUGIN_PATH ?>jquery.scrollex.min.js"></script>
	<script src="<?php echo PLUGIN_PATH ?>jquery.scrolly.min.js"></script>
	<script src="<?php echo JS_PATH ?>skel.min.js"></script>
	<script src="<?php echo JS_PATH ?>util.js"></script>
	<!--[if lte IE 8]><script src="view/js/ie/respond.min.js"></script><![endif]-->
	<script src="<?php echo JS_PATH ?>main.js"></script>

  <!-- Datepicker -->
   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
   <script src="//code.jquery.com/jquery-1.10.2.js"></script>
   <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
   <!--<link rel="stylesheet" href="/resources/demos/style.css">-->
</header>

<!-- Banner -->
<section id="banner">
	<div class="inner">
		<h2>Spectral</h2>
		<p>Another fine responsive<br />
		site template freebie<br />
		crafted by <a href="http://html5up.net">HTML5 UP</a>.</p>
		<ul class="actions">
			<li><a href="#" class="button special">Activate</a></li>
		</ul>
	</div>
	<a href="#one" class="more scrolly">Learn More</a>
</section>
