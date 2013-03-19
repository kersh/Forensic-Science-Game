<h3>Select room that you want to play:</h3>

<div id="rooms_wrapper">
<?php if(count($each_room_data) != 0): ?>

	<?php for ($i = 0; isset($each_room_data[$i][1]); $i++): ?>
		<div class="room_item">
			<div class="room_img"><img src="<?php echo $each_room_data[$i][1]; ?>" alt=""/></div>
			<div class="room_content">
				<h4><?php echo $each_room_data[$i][0]; ?></h4>
				<p class="desc"><?php echo $each_room_data[$i][3]; ?></p>
				<p class="budget"><span>Given budget:</span> £<?php echo $each_room_data[$i][2]; ?></p>
				<p class="spent_budget"><span>Spent budget:</span> £<?php echo $room_user_data[$i][3]; ?></p>
				<p class="status"><span>Status:</span> <?php echo $room_user_data[$i][2]; ?></p>
				<a href="index.php?action=playGame&room_id=<?php echo $room_user_data[$i][1]; ?>&room=<?php echo str_replace(' ', '_', $each_room_data[$i][0]); ?>">Play</a>
			</div>
			<div class="clearAll"></div>
		</div>
	<?php endfor; ?>

<?php else: ?>
	<div class="no_room">
		<p>No room here</p>
	</div>
<?php endif; ?>
</div>