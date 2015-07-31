<?php $path = DIR . 'app/templates/teacher-dashboard/css/'; ?>
<!doctype html>
<html lang="em">
	<head>
		<title><?=$data['title'] . ' | ' . SITETITLE?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	  	<link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>

	  	<!-- Dynamic Styling -->
	  	<?php if (isset($data['css-assets'])) { ?>
	  	<?php foreach($data['css-assets'] as $asset) {?>
	  	<link rel="stylesheet" type="text/css" href="<?=$path?><?=$asset?>">
	  	<?php } ?>
	  	<?php } ?>
	  	<!-- End of Dynamic Styling -->

	  	<link rel="stylesheet" type="text/css" href="<?=$path?>teacher-sidebar.css">
	  	<script type="text/javascript" src="<?=DIR?>app/files/tinymce/tinymce.min.js"></script>
	</head>

	<body>

	<!-- Top bar -->
	
	<nav class="navbar" id="navigation-bar">
		<div class="container-fluid">
	    	<div class="navbar-header">
	    		<a class="navbar-brand" href="#">E-Learning</a>
	    	</div>
	    <div>
	      	<ul class="nav navbar-nav">
	        	<li id="toggle-btn" onclick="toggleSidebar();"><a href="#"><span class="glyphicon glyphicon-list"></span></a></li>
	      	</ul>
	      	<?php if (isset($data['username'])) {?>
	      	<ul class="nav navbar-nav navbar-right">
	        	<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?=$data['username']?> <span class="caret"></span></a>
	          		<ul class="dropdown-menu">
	 	           <li><a href="<?=DIR . 'logout'?>">Log Out</a></li>
	        	  </ul>
	        	</li>
	      	</ul>
	      	<?php } ?>
	    </div>
	  </div>
	</nav>