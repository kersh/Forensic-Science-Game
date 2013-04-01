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
		function checkItems(){
			var itemList = new Array();
			// var testVar = "someTestTo::Test";

			// Iterate through the <li> items inside <ul id="evidences">
			$("#evidences").children("li").each(function() {
				itemList.push($(this).children("h5").text());
			});

			// items:itemList.join("::");

			window.location = "index.php?action=showSelectedItems&room_name=<?php echo $room_name; ?>&items="+itemList.join("::");
		}
	</script>
	<script type="text/javascript">
		jQuery(function() {
			function getObject(object_id) {
				var object_data = new Array();
				$.ajax({
					type: 'POST',
					url: 'index.php?action=getObject&object_id='+object_id,
					dataType: 'json',
					cache: false,
					success: function(result) {
						object_data = result;
						$('#evidenceBagNotice').hide();
						$('#checkItemsBtn').removeAttr("disabled");
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
				jQuery(function(){
					returnObject(id);
				});
				// show message if evidence bag is empty
				if ($('ul#evidences li').length == 0) {
					$('#evidenceBagNotice').show();
					$('#checkItemsBtn').attr("disabled", "disabled");
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