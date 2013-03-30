<h3>These are object that you have been selected:</h3>

<div id="objects_wrapper">
<?php if(count($each_item_data) != 0): ?>

	<?php for ($i = 0; isset($each_item_data[$i][1]); $i++): ?>
		<div class="object_item">
			<div class="object_img"><img src="<?php echo $each_item_data[$i][1]; ?>" alt=""/></div>
			<div class="object_content">
				<h4><?php echo $each_item_data[$i][0]; ?></h4>
				<p class="object_price">Object price: £ <?php echo $each_item_data[$i][3]; ?></p>
				<p class="dna_piece"><span>DNA found:</span> <?php echo $each_item_data[$i][2]; ?></p>
			</div>
			<div class="clearAll"></div>
		</div>
	<?php endfor; ?>

<?php else: ?>
	<div class="no_room">
		<p>No items where selected</p>
	</div>
<?php endif; ?>
<a href="index.php?action=generateDNAProfile&dnaFound=<?php echo $dna_found; ?>">Get DNA results</a>
</div> <!-- end #items_wrapper -->