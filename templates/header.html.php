<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Forensic Game</title>

	<meta name="description" content="">
	<meta name="author" content="Vladimirs Safikovs (1008629)"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
	<div id="wrapper">

		<!-- Header containing top section & navigation. -->
		<header>
			<h1>University of Wolverhampton</h1>
			<nav role="navigation">
				<ul>
					<?php if($userBtn=="logoutBtn"){ ?>
						<li><a href="index.php?action=logout">Log Out</a></li>
					<?php } ?>
				</ul>
			</nav>
		</header>

		<!-- Any content goes inside this div -->
		<div id="content">
			<!-- some of the templates goes below from other files -->