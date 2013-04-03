<div class="container_for_header">
	<div class="objects_wrapper_icon"><i class="icon-tasks"></i></div>
	<div class="objects_wrapper_h3"><h3>Here is the information that was gathered from the object:</h3></div>
	<div class="clearAll"></div>
</div>

<div id="dna_wrapper">
<?php if($dnaFound == true): ?>
	<div id="table_wrapper">
		<h5>We took mouth swab sample to get victim DNA:</h5>
		<div class="dna_profile_lists">
			<ul class="dna_profile_headers">
				<li class="empty_field"></li>
				<li>D3</li>
				<li>VWA</li>
				<li>D16</li>
				<li>D2</li>
				<li class="amelogenin">Amelogenin</li>
				<li>D8</li>
				<li>D21</li>
				<li>D18</li>
				<li>D19</li>
				<li>THO1</li>
				<li>FGA</li>
			</ul>
			<div class="clearAll"></div>
			<ul class="dna_profile_data">
				<li class="genotype">Genotype</li>
				<?php for ($i = 4; $i < 25; $i=$i+2): ?>
				<li>
					<ul class="alleles">
						<li <?php if($allelesArray[0][$i]=="X"){ echo 'class="data_amelogenin"'; } ?>><?php echo $allelesArray[0][$i]; ?></li>
						<li <?php if($allelesArray[0][($i+1)]=="Y"){ echo 'class="data_amelogenin"'; } ?>><?php echo $allelesArray[0][($i+1)]; ?></li>
					</ul>
				</li>
				<?php endfor; ?>
			</ul>
		</div>
		<div class="clearAll"></div>

		<h5>The DNA profile that was found on the object that you found is:</h5>
		<div class="dna_profile_lists">
			<ul class="dna_profile_headers">
				<li class="empty_field"></li>
				<li>D3</li>
				<li>VWA</li>
				<li>D16</li>
				<li>D2</li>
				<li class="amelogenin">Amelogenin</li>
				<li>D8</li>
				<li>D21</li>
				<li>D18</li>
				<li>D19</li>
				<li>THO1</li>
				<li>FGA</li>
			</ul>
			<div class="clearAll"></div>
			<ul class="dna_profile_data">
				<li class="genotype">Genotype</li>
				<?php for ($i = 0; $i < 21; $i=$i+2): ?>
				<li>
					<ul class="alleles">
						<li <?php if($suspectDNA[$i]=="X"){ echo 'class="data_amelogenin"'; } ?>><?php echo $suspectDNA[$i]; ?></li>
						<li <?php if($suspectDNA[($i+1)]=="Y"){ echo 'class="data_amelogenin"'; } ?>><?php echo $suspectDNA[($i+1)]; ?></li>
					</ul>
				</li>
				<?php endfor; ?>
			</ul>
		</div>
		<div class="clearAll"></div>

		<h5>We found DNA profile in poliec database that partly match your incomplete DNA profile:</h5>
		<div class="dna_profile_lists">
			<ul class="dna_profile_headers">
				<li class="empty_field"></li>
				<li>D3</li>
				<li>VWA</li>
				<li>D16</li>
				<li>D2</li>
				<li class="amelogenin">Amelogenin</li>
				<li>D8</li>
				<li>D21</li>
				<li>D18</li>
				<li>D19</li>
				<li>THO1</li>
				<li>FGA</li>
			</ul>
			<div class="clearAll"></div>
			<ul class="dna_profile_data">
				<li class="genotype">Genotype</li>
				<?php for ($i = 4; $i < 25; $i=$i+2): ?>
				<li>
					<ul class="alleles">
						<li <?php if($allelesArray[1][$i]=="X"){ echo 'class="data_amelogenin"'; } ?>><?php echo $allelesArray[1][$i]; ?></li>
						<li <?php if($allelesArray[1][($i+1)]=="Y"){ echo 'class="data_amelogenin"'; } ?>><?php echo $allelesArray[1][($i+1)]; ?></li>
					</ul>
				</li>
				<?php endfor; ?>
			</ul>
		</div>
		<div class="clearAll"></div>
	</div><!-- end #table_wrapper -->

	<div class="after_tables">
		<p class="field_notice"><i class="icon-info-sign"></i> Number format must be like this: [1.12345678910E-10]</p>
		<form action="actions/submitEAsResult.php" id="eaInput" method="get">
			<input type="hidden" name="room_name" value="<?php echo $room_name; ?>">
			<p class="field_title">EA1:</p> <input type="text" name="EA1" placeholder="5.110000000E-10" required><br>
			<p class="field_title">EA3:</p> <input type="text" name="EA3" placeholder="5.110000000E-10" required><br>
			<p class="field_title">EA4:</p> <input type="text" name="EA4" placeholder="5.110000000E-10" required><br>
			<input type="submit" value="Submit" class="btn btn-primary" id="ea_submit_btn">
		</form>
	</div>



<?php else: ?>

	<div class="no_dna">
		<p>No DNA was found. Try to select different object from the scene.</p>
	</div>

<?php endif; ?>
</div> <!-- end #dna_wrapper -->