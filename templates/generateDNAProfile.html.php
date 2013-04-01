<h3>Here is the information that was gathered from the object:</h3>

<div id="dna_wrapper">
<?php if($dnaFound == true): ?>

	<p>True</p>
	<table border="1">
		<tr>
			<th></th>
			<th colspan="2">D3</th>
			<th colspan="2">VWA</th>
			<th colspan="2">D16</th>
			<th colspan="2">D2</th>
			<th colspan="2">Amelogenin</th>
			<th colspan="2">D8</th>
			<th colspan="2">D21</th>
			<th colspan="2">D18</th>
			<th colspan="2">D19</th>
			<th colspan="2">THO1</th>
			<th colspan="2">FGA</th>
		</tr>
		<tr>
			<th>Genotype</th>
			<?php //for ($i = 0; isset($receivedDNAs[$i][1]); $i++): ?>
				<td>15</td>
				<td>17</td>
			<?php //endfor; ?>
			<!-- <td>15</td>
			<td>17</td> -->
		</tr>
	</table>

	<?php  ?>

	<?php
			// $i = 0;
			$rowTest;
			while($row = mysql_fetch_array($receivedDNAs)) {
				$rowTest[$i][0] = $row['room_user_id'];
				// $room_user_data[$i][1] = $row['room_id'];
				// $room_user_data[$i][2] = $row['room_status'];
				// $room_user_data[$i][3] = $row['spent_budget'];
				echo $row['belonging'];
				echo "<br />";

				// $i++;
			}
	?>


<?php else: ?>

	<div class="no_dna">
		<p>No DNA was found. Try to select different object from the scene.</p>
	</div>

<?php endif; ?>
</div> <!-- end #dna_wrapper -->