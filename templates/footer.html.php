		</div> <!-- end of #content -->
		<div id="footer">
			<p>University of Wolverhampton | All Rights Reserved | 2013</p>
		</div>
	</div> <!-- end of #wrapper -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	
	<script type="text/javascript">
		$(document).ready( function() {
			var object_data = new Array();
			$('#buttonTest').click( function(){
				$.ajax({
					type: 'GET',
					url: 'actions/getObject.php',
					data: 'object_id=1',
					dataType: 'json',
					cache: false,
					success: function(result) {
						object_data = result;
						alert(object_data[0]);
					},
				});
			});
		});

		// function recp(object_id) {
		// 	// var $object_data = 'string';
		// 	var object_data, object_data2;
		// 	$('#evidenceBag').load('actions/getObject.php?object_id=' + object_id);

		// 	$('object_data2').load('actions/getObject.php?object_id=' + object_id);
		// 	// object_data = $(object_data2).text();
		// 	alert(object_data2);
		// 	console.log(object_data2);
		// }
	</script>
</body>
</html>