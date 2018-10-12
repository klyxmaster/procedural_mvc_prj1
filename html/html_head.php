<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Casual Game Station</title>
		
		<link rel="stylesheet" href="<?=URL;?>html/styles.css" type="text/css" />
		<link rel="stylesheet" href="<?=URL;?>html/cgs_style.css" type="text/css" />
		<link href="<?=URL;?>html/css/lightbox.css" rel="stylesheet">

		<script src="<?=URL;?>html/js/jquery.min.js"></script>     
		<script src="<?=URL;?>html/js/lightbox.js"></script>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="Thousands of casual games, with new ones coming in daily!" />
		<meta name="keywords" content="hidden objects, match 3, marble popper, rpg, strategy, tower defense, mobile, mac, pc, card games, games, casual, free games, mystery, platformer, sims, sim, diner dash" />
		<meta name="author" content="metatags generator">
		<meta name="robots" content="index, follow">
		<meta name="revisit-after" content="3 days">
	</head>
	
	<body>
	<div id="container">
		<div id="header">
			<h1><a href="/"><?=SITE_NAME;?></a></h1>
			<h2><?=SITE_TAG;?></h2>
		</div>
	
		<div class="menu">
			<ul>
				<li><a href="<?=URL;?>">New Game</a></li>
				<li><a href="<?=URL;?>recent">Recent Games</a></li>
				<li><a href="<?=URL;?>top50">Top 50</a></li>
				<li><a href="<?=URL;?>online">Play Online</a></li>				
			</ul>
			
			<form class="search-form" method="post" action="<?=URL;?>search">
				<input type="text" name="searchtxt" autofocus required/>
			</form>
		</div>
		
		
		<div id="body">
			<div id="content">