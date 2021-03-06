<!DOCTYPE html>
<html lang="en" ng-app="app"><head>
	<meta charset="utf-8">
    <title>Administrator | Login</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-select.css">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />


	<link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
		
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">
	
	<!-- sign in / log in CSS-->
	<link href="<?php echo base_url(); ?>assets/css/pages/signin.css" rel="stylesheet" type="text/css">
	<!--/sign in or log in CSS-->
	
	<!-- dashboard CSS-->
	<link href="<?php echo base_url(); ?>assets/css/pages/dashboard.css" rel="stylesheet">
	<!-- /dashboard CSS-->
	
	<!--Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	

</head>
<?php $body = (isset($page)) ? $page : 'home'; ?>
<body class="<?php echo $body ?>">

<div class="navbar navbar-fixed-top">	
	<div class="navbar-inner">		
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="index.html">
				<img src="<?php echo base_url(); ?>assets/img/qc-guide-app.png">			
			</a>	
			<?php 
				if (isset($isLogin)) :
			?>	
			<div class="nav-collapse">
				<ul class="nav pull-right">
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"> </i> &nbsp; <span> <?php  echo $username ?> </span>  
							 <b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="javascript:;">Profile</a></li>
							<li><a href="javascript:;">Logout</a></li>
						</ul>
					</li>
				</ul>
				<!--<form class="navbar-search pull-right">
					<input type="text" class="search-query" placeholder="Search">
				</form>-->
			</div>
			<!--/.nav-collapse --> 
			<?php endif ?>
		</div>
    <!-- /container --> 
	
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->




