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
		jQuery(function() {
			function getObject() {
				var object_data = new Array();
				$.ajax({
					type: 'POST',
					url: 'index.php?action=getObject&object_id=1',
					data: 'object_id=1',
					dataType: 'json',
					cache: false,
					success: function(result) {
						object_data = result;
						$('#evidenceBagNotice').hide();
						$('ul#evidences').append('<li id=itemLi'+ object_data[0] +' style="display: none;"><div class="removeBtn" onClick="removeObject('+object_data[0]+')">remove</div><img src="'+ object_data[2] +'" alt ="'+ object_data[1] +'" /><h5>'+ object_data[1] +'</h5><p class="objectPrice">£'+ object_data[3] +'</p></li>');
						$('#itemLi'+object_data[0]).slideDown();
					},
				});
			}
			window.getObject=getObject;
		});
		function removeObject(id){
			$('#itemLi'+id).slideUp('fast', function(){
				$(this).remove();
				// show message if evidence bag is empty
				if ($('ul#evidences li').length == 0) {
					$('#evidenceBagNotice').show();
				}
			});
		}
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