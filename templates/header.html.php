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

			window.location = "index.php?action=showSelectedItems&room_name=<?php echo $room_name; ?>&items="+itemList.join("::");
		}
	</script>
	<script type="text/javascript">
		jQuery(function() {
			function getObject(object_id) {
				var budget_current;
				var canRemove;
				var object_data = new Array();
				$.ajax({
					type: 'POST',
					url: 'index.php?action=getObject&object_id='+object_id,
					async: false,
					dataType: 'json',
					cache: false,
					success: function(result) {
						object_data = result;
						budget_current = $('#budget span').text();
						if( (parseInt(budget_current) - parseInt(object_data[3])) >= 0 ) {
							canRemove = true;
							$('#evidenceBagNotice').hide();
							$('#checkItemsBtn').removeAttr("disabled");
							$('ul#evidences').append('<li id=itemLi'+ object_data[0] +' style="display: none;"><div class="removeBtn" onClick="removeObject('+object_data[0]+')">remove</div><img src="'+ object_data[2] +'" alt ="'+ object_data[1] +'" /><h5>'+ object_data[1] +'</h5><p class="objectPrice">£<span>'+ object_data[3] +'</span></p></li>');
							$('#itemLi'+object_data[0]).slideDown();
							budget_current = budget_current - object_data[3];
							$('#budget span').text(budget_current);
						} else {
							canRemove = false;
							$('#budget_warning').show().delay(4000).fadeOut();
						}
					},
				});
				if (canRemove) {
					return true;
				}
				else {
					return false;
				}
			}
			window.getObject=getObject;
		});
		function removeObject(id){
			var budget_current;
			var current_cost;
			$('#itemLi'+id).slideUp('fast', function(){
				current_cost = $('#itemLi'+id+' .objectPrice span').text();
				budget_current = $('#budget span').text();
				budget_current = parseInt(budget_current) + parseInt(current_cost);
				$('#budget span').text(budget_current);

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