<!-- <p>You are in a playGame mode. Your room is: <?php //echo str_replace("_", " ", $room_name); ?></p> -->

<div id="myDivContainer" style="position: relative; width: 860px;">
	<!-- Your 3D graphics are drawn in this canvas. -->
	<canvas id="canvas" width="860" height="600"></canvas>
</div> 

<!-- Control info -->
<div id="generalInfo" style="position: absolute; top: 10px; left: 920px; width: 480px; background: Brown; display:none;">
	<p>Keyboard controls: W,A,S,D = forward, strafe left, back, strafe right. U, J = look up, look down. H, K = turn left, turn right</p>

</div>

<!-- Camera debug info --> 
<div id="debugInfo" style="position: relative; top: 90px; left: 911px; width: 480px; background: Olive; display:none;"></div>

<!-- Object debug info -->
<div id="debugInfo2" style="position: relative; top: 110px; left: 911px; width: 480px; background: Teal; display:none;"></div>