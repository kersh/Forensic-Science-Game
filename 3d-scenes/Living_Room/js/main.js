// Set the startGLGE function to be called when the page has loaded.
window.onload = startGLGE;

var canvasElement;
var XMLdoc;
var renderer;
var scene;

// *********************************** All Handles
// Handles the mouse events.
var mouse;
var mouseOverCanvas;
var mouseDown = false;
var mouseUp = false;

// Handles the keyboard events.
var keys;

// Handles games time.
var lasttime=0;
var now;
// -----------------------------------

// *********************************** Factors and FPS
// Frames per secone.
var fps = 16;

// Movement speed.
var cameraSpeed = 0.005;

// Roatate factor.
var rotateFactor = 0.0005;
// -----------------------------------

// *********************************** Open Collada models variables
// Stores an open collada model.
var aModel;
// -----------------------------------

// A funtion to start GLGE. Sets key variables.
function startGLGE() {
	canvasElement = document.getElementById('canvas');
	XMLdoc = new GLGE.Document();
	
	// Set the keyboard.
	keys = new GLGE.KeyInput();

	// Set the mouse.
	mouse = new GLGE.MouseInput(document.getElementById('canvas'));
	
	XMLdoc.onLoad = function(){
		renderer = new GLGE.Renderer(canvasElement);
		scene = new GLGE.Scene();
		
		scene = XMLdoc.getElement("mainScene");
		renderer.setScene(scene);

		setTimeout(finishLoading, 2000);
	}
	
	// Parse the GLGE xml file.
	XMLdoc.load("3d-scenes/Living_Room/scene_objects_info.xml");
}

function finishLoading() {
	// Set the timer.
	setInterval(render,fps);

	// Add an event to set if the mouse is over our canvs.
	document.getElementById("canvas").onmouseover=function(e){ mouseOverCanvas = true; }
	document.getElementById("canvas").onmousemove=function(e){ mouseovercanvas = true; }
	document.getElementById("canvas").onmouseout=function(e){ mouseOverCanvas = false; }
	document.getElementById("canvas").onmouseup=function(e){ mouseUp = true; }

	// Remove "Loading..." status.
	document.getElementById("loading_status").style.display="none";
}

// The game timer (aka game loop). Called x times per second.
function render(){
	// Work out the current time.
	now = parseInt(new Date().getTime());
	
	// Check for mouse location.
	if(mouseUp == true){
		mouseUp = false;
		whatClicked();
	}

	// Runs mouse control function.
	mouselook();

	// Checks for key events and moves the camera.
	checkCameraMove();
	
	// Render the scene.
	renderer.render();
	
	// Set the last time.
	lasttime = now;
}

// Finds what has been clicked in a scene.
function whatClicked(){
	if( mouseOverCanvas ){
		var mousepos = mouse.getMousePosition();

		if( mousepos.x && mousepos.y ){
			aRay = scene.pick( mousepos.x, mousepos.y );
			if(aRay != null){
				obj = aRay.object;
				if( obj != null ){
					// Debug information. This requires a div in your HTML. E.g. where id=debugInfo.
					// document.getElementById("debugInfo2").innerHTML = "Object found (obj.skeleton.id) = " + obj.skeleton.id + ".<br><br>";
					//Debug information. END.

					jQuery(function(){
						getObject();
					});

					obj.getSkeleton().setVisible(false);

					// Gets the model the mouse is currently over.
					// aModel = XMLdoc.getElement( obj.skeleton.id );
				} else {
					document.getElementById("debugInfo2").innerHTML = document.getElementById("debugInfo2").innerHTML + "NO ANI | MOUSE UP. ";
				}
			}
		}
	}
}

// Checks for mouse events and rotates the camera accordingly.
function mouselook(){
	if(mouseOverCanvas){
		var mousepos = mouse.getMousePosition();
		
		var scrollTop = $(window).scrollTop();
		var elementOffset = $('#myDivContainer').offset().top;
		var topOffset = elementOffset - scrollTop;
 		// var testval = $(window).height() - ($('#myDivContainer').offset().top + $('#myDivContainer').height());

		//Debug information. This requires a div in your HTML. E.g. where id=debugInfo.
		// document.getElementById("debugInfo").innerHTML = "Debug info raw position: <br>" + 
			// "<br>mousepos.x = " + mousepos.x + " | mousepos.y = " + mousepos.y + ".<br>";
		//Debug information. END.
		
		mousepos.x = mousepos.x - document.getElementById("myDivContainer").offsetLeft;
		mousepos.y = mousepos.y - topOffset;

		//Debug information. This requires a div in your HTML. E.g. where id=debugInfo.
		// document.getElementById("debugInfo2").innerHTML = "Debug info after offset: <br>" + 
			// "<br>mousepos.x = " + mousepos.x + " | mousepos.y = " + mousepos.y + ".<br>";
		//Debug information. END.

		//Debug information. This requires a div in your HTML. E.g. where id=debugInfo.
		// document.getElementById("debugInfo").innerHTML = document.getElementById("debugInfo").innerHTML +
		// 	"<br>offsetLeft = " + document.getElementById("myDivContainer").offsetLeft + " | offsetTop = " + document.getElementById("myDivContainer").offsetTop + ".<br>" +
		// 	"<br>With offset - mousepos.x = " + mousepos.x + " | mousepos.y = " + mousepos.y + ".<br><br>";
		//Debug information. END.
		
		// Get camera variables.
		var camera = scene.camera;
		var cameraRot = camera.getRotation();
		
		// Move the camera.
		var width = document.getElementById('canvas').offsetWidth;
		if(mousepos.x < width * 0.4){
			var turn = Math.pow( (mousepos.x - width * 0.4) / (width * 0.4), 2 ) * 0.0008 * (now - lasttime);
			//var turn = 0.005;
			camera.setRotY(cameraRot.y + turn);
		}
		if(mousepos.x > width * 0.6){
			var turn = Math.pow( (mousepos.x - width * 0.6) / (width * 0.4), 2 ) * 0.0008 * ( now - lasttime);
			camera.setRotY(cameraRot.y - turn);
		}
		
		var height = document.getElementById('canvas').offsetHeight;
		if(mousepos.y < height * 0.4){
			var turn = Math.pow( (mousepos.y - height * 0.4) / (height * 0.4), 2 ) * 0.0008 * (now - lasttime);
			//var turn = 0.005;
			camera.setRotX(cameraRot.x + turn);
		}
		if(mousepos.y > height * 0.6){
			var turn = Math.pow( (mousepos.y - height * 0.6) / (height * 0.4), 2 ) * 0.0008 * ( now - lasttime);
			camera.setRotX(cameraRot.x - turn);
		}
		
	}
}

// Checks for key events and moves the camera.
function checkCameraMove(){
	// Get camera variables.
	var camera = scene.camera;
	var cameraPos = camera.getPosition();
	var cameraRot = camera.getRotation();
	
	// Gets the rotaion matrix of the camera. 
	var cameraRotMat = camera.getRotMatrix();

	// Multiplies two mat4's (4 x 4 matrices). Returns {GLGE.Mat} the matrix multiplication of the matrices.
	// [0,0,-1,1] = the default postion we are looking at. GlGE is right handed system. If the camera is at 0,0,0 its default
	// looking direction will along -z. Therefore 0,0,-1 is a position we are looking at.
	// During each game loop we multiply this by our current rotation.
	var translationMat = GLGE.mulMat4Vec4(cameraRotMat, [0,0,-1,1] );
		
	// Find the magnitude (size) of the matrix.
	var translationMatMagnitude = Math.pow( Math.pow(translationMat[0],2) +
						Math.pow(translationMat[1],2) +
						Math.pow(translationMat[2],2), 0.5);
		
	// The unit maxtix / normalised maxtrix.
	translationMat[0] = translationMat[0]  / translationMatMagnitude;
	translationMat[1] = translationMat[1]  / translationMatMagnitude;
	translationMat[2] = translationMat[2]  / translationMatMagnitude;
	
	// Multiplies two mat4's (4 x 4 matrices). Returns {GLGE.Mat} the matrix multiplication of the matrices.
	// [-1,0,0,1] = the left postion to the direction we are looking. GlGE is right handed system. If the camera is at 0,0,0 its default
	// looking direction will along -z. Therefore 1,0,0 is a position to the left.
	// During each game loop we multiply this by our current rotation.
	var leftMat = GLGE.mulMat4Vec4(cameraRotMat, [-1,0,0,1] );
		
	// Find the magnitude (size) of the matrix.
	var leftMatMagnitude = Math.pow( Math.pow(leftMat[0],2) +
					 Math.pow(leftMat[1],2) +
					 Math.pow(leftMat[2],2), 0.5);
		
	// The unit maxtix / normalised maxtrix.
	leftMat[0] = leftMat[0]  / leftMatMagnitude;
	leftMat[1] = leftMat[1]  / leftMatMagnitude;
	leftMat[2] = leftMat[2]  / leftMatMagnitude;
	
	// Left.. END.
	// ------------
	
	// Check keys and add an increase if required.
	var xIncrease = 0;
	var yIncrease = 0;
	var zIncrease = 0;

	// Forward.
	if(keys.isKeyPressed(GLGE.KI_W)) {
		xIncrease = xIncrease + parseFloat( translationMat[0] );
		yIncrease = yIncrease + parseFloat( translationMat[1] );
		zIncrease = zIncrease + parseFloat( translationMat[2] );
	}
	// Back.
	if(keys.isKeyPressed(GLGE.KI_S)) {
		xIncrease = xIncrease - parseFloat( translationMat[0] );
		yIncrease = yIncrease - parseFloat( translationMat[1] );
		zIncrease = zIncrease - parseFloat( translationMat[2] );
	}
	// Left.
	if(keys.isKeyPressed(GLGE.KI_A)) {
		xIncrease = xIncrease + parseFloat( leftMat[0] );
		yIncrease = yIncrease + parseFloat( leftMat[1] );
		zIncrease = zIncrease + parseFloat( leftMat[2] );
		
	}
	// right.
	if(keys.isKeyPressed(GLGE.KI_D)) {
		xIncrease = xIncrease - parseFloat( leftMat[0] );
		yIncrease = yIncrease - parseFloat( leftMat[1] );
		zIncrease = zIncrease - parseFloat( leftMat[2] );
	}

	// Collision Detection ************************************************
	if(xIncrease !=0 || yIncrease !=0 || zIncrease !=0 ){
		// Collision Detection.
		var origin = [cameraPos.x,cameraPos.y,cameraPos.z];

		distRayX = scene.ray(origin,[-xIncrease,0,0]);
		distRayY = scene.ray(origin,[0,-yIncrease,0]);
		distRayZ = scene.ray(origin,[0,0,-zIncrease]);

		// x
		if( distRayX != null ){
		  if( distRayX.distance < 5 ) xIncrease = 0;
		}

		// y
		if( distRayY != null ){
			if( distRayY.distance < 5 ) yIncrease = 0;
		}

		// z
		if( distRayZ != null ){
			if( distRayZ.distance < 5 ) zIncrease = 0;
		}
	}
	// END: Collision Detection ************************************************
		
	// Move the camera.
	if(xIncrease !=0 || yIncrease !=0 || zIncrease !=0 ){
		camera.setLocX( cameraPos.x + (xIncrease * cameraSpeed * (now-lasttime)) );
		camera.setLocY( cameraPos.y + (yIncrease * cameraSpeed * (now-lasttime)) );
		camera.setLocZ( cameraPos.z + (zIncrease * cameraSpeed * (now-lasttime)) );
	}
}
