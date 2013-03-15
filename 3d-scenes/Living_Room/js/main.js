// Set the startGLGE function to be called when the page has loaded.
window.onload = startGLGE;

var canvasElement;
var XMLdoc;
var renderer;
var scene;

// Handles the keyboard events.
var keys;

// Handles games time.
var lasttime=0;
var now;

// Frames per secone.
var fps = 16;

// Movement speed.
var cameraSpeed = 0.005;

// Roatate factor.
var rotateFactor = 0.0005;


// A funtion to start GLGE. Sets key variables.
function startGLGE() {
	canvasElement = document.getElementById('canvas');
	XMLdoc = new GLGE.Document();
	
	// Set the keyboard.
	keys = new GLGE.KeyInput();
	
	XMLdoc.onLoad = function(){
		renderer = new GLGE.Renderer(canvasElement);
		scene = new GLGE.Scene();
		
		scene = XMLdoc.getElement("mainScene");
		renderer.setScene(scene);

		// Set the timer.
		setInterval(render,fps);
	}
	
	// Parse the GLGE xml file.
	XMLdoc.load("3d-scenes/Living_Room/scene_objects_info.xml");
}

// The game timer (aka game loop). Called x times per second.
function render(){
	// Work out the current time.
	now = parseInt(new Date().getTime());
	
	// Checks for key events and moves the camera.
	checkCameraMove();
	
	// Render the scene.
	renderer.render();
	
	// Set the last time.
	lasttime = now;
}

// Checks for key events and moves the camera.
// This function requires the variables now and lasttime to be declared and updated in the render function.
function checkCameraMove(){
	// Get camera variables.
	var camera = scene.camera;
	var cameraPos = camera.getPosition();
	var cameraRot = camera.getRotation();
	
	// Gets the rotaion matrix of the camera. 
	var cameraRotMat = camera.getRotMatrix();
	
	//Debug information. This requires a div in your HTML. E.g. where id=debugInfo.
	// document.getElementById("debugInfo").innerHTML = "Debug info: <br>" +
	// 	"cameraPos = x: " + cameraPos.x + ", y: " + cameraPos.y + ", z: " + cameraPos.z + ".<br>" +
	// 	"cameraRotMat =<br>" +
	// 			" " + cameraRotMat[0] + " " + cameraRotMat[1] + " " + cameraRotMat[2] + " " + cameraRotMat[3] + ".<br>" +
	// 			" " + cameraRotMat[4] + " " + cameraRotMat[5] + " " + cameraRotMat[6] + " " + cameraRotMat[7] + ".<br>" +
	// 			" " + cameraRotMat[8] + " " + cameraRotMat[9] + " " + cameraRotMat[10] + " " + cameraRotMat[11] + ".<br>" +
	// 			" " + cameraRotMat[12] + " " + cameraRotMat[13] + " " + cameraRotMat[14] + " " + cameraRotMat[15] + ".<br>";
	//Debug information. END.
	
	// Look At..
	// ------------

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
	
	// Look At.. END.
	// ------------
	
	// Left..
	// ------------
	
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
	
	// Look up.
	if(keys.isKeyPressed(GLGE.KI_U)){
		// Rotate the view. Radians.
		camera.setRotX(cameraRot.x + (1 * rotateFactor * (now-lasttime)) );
	}
	// Look down.
	if(keys.isKeyPressed(GLGE.KI_J)){
		// Rotate the view. Radians.
		camera.setRotX(cameraRot.x - (1 * rotateFactor * (now-lasttime)) );
	}
	// Rotate left
	if(keys.isKeyPressed(GLGE.KI_H)){
		// Rotate the view. Radians.
		camera.setRotY(cameraRot.y + (1 * rotateFactor * (now-lasttime)) );
	}
	// Turn right.
	if(keys.isKeyPressed(GLGE.KI_K)) {
		// Rotate the view. Radians.
		camera.setRotY(cameraRot.y - (1 * rotateFactor * (now-lasttime)) );
	}
	
	// ************************************************
	// Collision Detection.
	if(xIncrease !=0 || yIncrease !=0 || zIncrease !=0 ){
		// Collision Detection.
		var origin = [cameraPos.x,cameraPos.y,cameraPos.z];
		
		//Debug information. This requires a div in your HTML. E.g. where id=debugInfo.
		// document.getElementById("debugInfo2").innerHTML = 
		// 	"origin x = " + origin[0] + ", y = " + origin[1] + ", z = " + origin[2] + ".<br>" +
		// 	"xIncrease = " + xIncrease + ", yIncrease = " + yIncrease + ", zIncrease = " + zIncrease + ".<br>";
		//Debug information. END.
		
		distRayX = scene.ray(origin,[-xIncrease,0,0]);
		distRayY = scene.ray(origin,[0,-yIncrease,0]);
		distRayZ = scene.ray(origin,[0,0,-zIncrease]);
		
		// x.
		if(distRayX != null){
			if(distRayX.distance < 5) xIncrease = 0;
			
			//Debug information. This requires a div in your HTML. E.g. where id=debugInfo.
			// document.getElementById("debugInfo2").innerHTML = document.getElementById("debugInfo2").innerHTML +
			// 	"distRayX = " + distRayX.distance + ".<br>";
			//Debug information. END.
		} else {
			//Debug information. This requires a div in your HTML. E.g. where id=debugInfo.
			// document.getElementById("debugInfo2").innerHTML = document.getElementById("debugInfo2").innerHTML +
			// 	"distRayX = NULL" + ".<br>";
			//Debug information. END.
		}
		// y.
		if(distRayY != null){
			if(distRayY.distance < 5) yIncrease = 0;
			
			//Debug information. This requires a div in your HTML. E.g. where id=debugInfo.
			// document.getElementById("debugInfo2").innerHTML = document.getElementById("debugInfo2").innerHTML +
			// 	"distRayY = " + distRayY.distance + ".<br>";
			//Debug information. END.
		} else {
			//Debug information. This requires a div in your HTML. E.g. where id=debugInfo.
			// document.getElementById("debugInfo2").innerHTML = document.getElementById("debugInfo2").innerHTML +
			// 	"distRayY = NULL" + ".<br>";
			//Debug information. END.
		}
		// z.
		if(distRayZ != null){
			if(distRayZ.distance < 5) zIncrease = 0;
			
			//Debug information. This requires a div in your HTML. E.g. where id=debugInfo.
			// document.getElementById("debugInfo2").innerHTML = document.getElementById("debugInfo2").innerHTML +
			// 	"distRayZ = " + distRayZ.distance + ".<br>";
			//Debug information. END.
		} else {
			//Debug information. This requires a div in your HTML. E.g. where id=debugInfo.
			// document.getElementById("debugInfo2").innerHTML = document.getElementById("debugInfo2").innerHTML +
			// 	"distRayZ = NULL" + ".<br>";
			//Debug information. END.
		}
		
	}
	// END:~ Collision Detection.
	// ************************************************

	// Move the camera.
	if(xIncrease !=0 || yIncrease !=0 || zIncrease !=0 ){
		camera.setLocX( cameraPos.x + (xIncrease * cameraSpeed * (now-lasttime)) );
		camera.setLocY( cameraPos.y + (yIncrease * cameraSpeed * (now-lasttime)) );
		camera.setLocZ( cameraPos.z + (zIncrease * cameraSpeed * (now-lasttime)) );
	}

}
