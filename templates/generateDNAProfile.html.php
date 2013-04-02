<h3>Here is the information that was gathered from the object:</h3>

<div id="dna_wrapper">
<?php if($dnaFound == true): ?>
	<div id="table_wrapper">
		<p>We took mouth swab sample to get victim DNA:</p>
		<table border="1" class="dna_profile_table victim">
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
				<?php for ($i = 4; $i < 25; $i=$i+2): ?>

					<td><?php echo $allelesArray[0][$i]; ?></td>
					<td><?php echo $allelesArray[0][($i+1)]; ?></td>

				<?php endfor; ?>
				<!-- <td>15</td>
				<td>17</td> -->
			</tr>
		</table>

		<p>The DNA profile that was found on the object that you found is:</p>
		<table border="1" class="dna_profile_table victim">
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
				<?php for ($i = 0; $i < 21; $i=$i+2): ?>

					<td><?php echo $suspectDNA[$i]; ?></td>
					<td><?php echo $suspectDNA[($i+1)]; ?></td>

				<?php endfor; ?>
				<!-- <td>15</td>
				<td>17</td> -->
			</tr>
		</table>

		<p>We found DNA profile in poliec database that partly match your incomplete DNA profile:</p>
		<table border="1" class="dna_profile_table victim">
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
				<?php for ($i = 4; $i < 25; $i=$i+2): ?>

					<td><?php echo $allelesArray[1][$i]; ?></td>
					<td><?php echo $allelesArray[1][($i+1)]; ?></td>

				<?php endfor; ?>
				<!-- <td>15</td>
				<td>17</td> -->
			</tr>
		</table>
	</div><!-- end #table_wrapper -->

	<div class="after_tables">
		<p>number format must be like this: [1.12345678910E-10]</p>
		<form action="actions/submitEAsResult.php" id="eaInput" method="get">
			<input type="hidden" name="room_name" value="<?php echo $room_name; ?>">
			EA1: <input type="text" name="EA1" placeholder="5.110000000E-10" required><br>
			EA3: <input type="text" name="EA3" placeholder="5.110000000E-10" required><br>
			EA4: <input type="text" name="EA4" placeholder="5.110000000E-10" required><br>
			<input type="submit" value="Submit" id="ea_submit_btn">
		</form>
	</div>



<?php else: ?>

	<div class="no_dna">
		<p>No DNA was found. Try to select different object from the scene.</p>
	</div>

<?php endif; ?>
</div> <!-- end #dna_wrapper -->