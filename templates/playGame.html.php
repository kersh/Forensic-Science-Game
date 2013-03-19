<!-- <p>You are in a playGame mode. Your room is: <?php //echo str_replace("_", " ", $room_name); ?></p> -->

<!-- Loading status div -->
<div id="loading_status" style="position: relative; top: 10px; left: 10px; width: 920px;">Loading...</div>

<!-- Here user will add evidences found inside 3D scene -->
<div id="evidenceBag" style="position: relative; top: 40px; left: 0; width: 480px; background: Teal; display:inline;">
	<p class="evidenceBagNotice">Empty bag. Click on the object in scene to add them here.</p>
	<ul>
		<li>
			<img src="" alt ="" />
			<h5></h5>
			<div class="removeBtn">remove</div>
		</li>
	</ul>
</div>



<div id="myDivContainer" style="position: relative; width: 860px;">
	<!-- Your 3D graphics are drawn in this canvas. -->
	<canvas id="canvas" width="860" height="600"></canvas>
</div> 

<!-- Control info -->
<div id="generalInfo" style="position: absolute; top: 10px; left: 920px; width: 480px; background: Brown; display:none;">
	<p>Keyboard controls: W,A,S,D = forward, strafe left, back, strafe right. U, J = look up, look down. H, K = turn left, turn right</p>

</div>

<!-- Camera debug info --> 
<div id="debugInfo" style="position: relative; top: 90px; left: 911px; width: 480px; background: Olive; display:inline;"></div>

<!-- Object debug info -->
<div id="debugInfo2" style="position: relative; top: 0px; left: 0; width: 480px; background: Teal; display:inline;">
	<a href="#" id="buttonTest" >One test</a>
	Test
</div>