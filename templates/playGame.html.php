<!-- <p>You are in a playGame mode. Your room is: <?php //echo str_replace("_", " ", $room_name); ?></p> -->

<!-- Here user will add evidences found inside 3D scene -->
<div id="evidenceBag">
	<ul id="evidences">
		<p id="evidenceBagNotice">Empty bag. Click on the object in scene to add them here.</p>
	</ul>
	<button id="checkItemsBtn" onClick="checkItems()" disabled="disabled">Check items for DNA</a>
	<div class="clearAll"></div>
</div>
<div class="clearAll"></div>

<!-- Camera debug info --> 
<div id="debugInfo" style="position: fixed; top: 0px; left: 100px; width: 300px; background: Olive; display:inline;"></div>
<div id="debugInfo2" style="position: fixed; top: 0px; left: 400px; width: 300px; background: Olive; display:inline;"></div>

<div id="myDivContainer">
	<!-- Loading status div -->
	<div id="loading_status">Loading...</div>
	
	<!-- Your 3D graphics are drawn in this canvas. -->
	<canvas id="canvas" width="860" height="600"></canvas>
</div> 

<!-- Control info -->
<div id="generalInfo" style="position: absolute; top: 10px; left: 920px; width: 480px; background: Brown; display:none;">
	<p>Keyboard controls: W,A,S,D = forward, strafe left, back, strafe right. U, J = look up, look down. H, K = turn left, turn right</p>

</div>


<!-- Object debug info -->
<!-- <div id="debugInfo2" style="position: relative; top: 0px; left: 0; width: 480px; background: Teal; display:inline;"></div> -->