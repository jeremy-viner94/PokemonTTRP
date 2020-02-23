<!DOCTYPE html>
<html lang="de" class="page-<?=str_replace("/", "-", $subView)?>">
<head>
	<meta charset="utf-8">
	<title>Titel</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<link rel="stylesheet" type="text/css" href="/css/master.css" media="screen">
	<link rel="stylesheet" type="text/css" href="/css/custom.css" media="screen">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script charset="utf-8" type="text/javascript" src="/js/master.js"></script>
</head>
<body>
<div id="wrapper">
	<header>
		<div id="title">Welcome to the Pokemon TTRPG</div>
		<ul>
			<li class="nav-home"><a href="/">Home</a></li>
			<li class="nav-kontakt"><a href="/login">Login</a></li>
		</ul>
	</header>
	<div id="content">
		
<?php self::view($subView, $data, false) ?>
		
	</div>
<?php self::view('trainerbar', $data, false) ?>
	
	<footer>&copy; Footer</footer>
</div>
</body>
</html>