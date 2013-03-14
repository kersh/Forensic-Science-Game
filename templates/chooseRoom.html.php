<h3>Select room that you want to play:</h3>

<div class="rooms_wrapper">
	<?php for ($i = 0; isset($each_room_data[$i][1]); $i++): ?>
		<div class="room_item">
			<div class="room_img"><img src="<?php echo $each_room_data[$i][1]; ?>" alt=""/></div>
			<div class="room_content">
				<h4><?php echo $each_room_data[$i][0]; ?></h4>
				<p class="budget">£<?php echo $each_room_data[$i][2]; ?></p>
				<p class="spent_budget">£<?php echo $room_user_data[$i][3]; ?></p>
				<p class="desc"><?php echo $each_room_data[$i][3]; ?></p>
				<p class="status"><?php echo $room_user_data[$i][2]; ?></p>
			</div>
		</div>
	<?php endfor; ?>
</div>