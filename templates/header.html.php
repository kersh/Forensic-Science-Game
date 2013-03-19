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
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<?php if(isset($room_name)): ?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	
	<script type="text/javascript">
		// $(document).ready( function() {
		// 	var object_data = new Array();
		// 	$('#buttonTest').click( function(){
		// 		$.ajax({
		// 			type: 'GET',
		// 			url: 'actions/getObject.php',
		// 			data: 'object_id=1',
		// 			dataType: 'json',
		// 			cache: false,
		// 			success: function(result) {
		// 				object_data = result;
		// 				alert(object_data[0]);
		// 			},
		// 		});
		// 	});
		// });

		jQuery(function() {
			function getObject() {
				var object_data = new Array();
				$.ajax({
					type: 'GET',
					url: 'actions/getObject.php',
					data: 'object_id=1',
					dataType: 'json',
					cache: false,
					success: function(result) {
						object_data = result;
						alert(object_data[0]);
						console.log(object_data[1]);
					},
				});
			}
			window.getObject=getObject;
		});
	</script>
	<!-- Here we include the glge JavaScript files. -->
	<script type="text/javascript" src="GLGE/glge-compiled-min.js"></script>
	<script type="text/javascript" src="3d-scenes/<?php echo $room_name; ?>/js/main.js"></script>
	<?php endif; ?>

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