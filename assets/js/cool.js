window.requestAnimFrame = (function(callback) {
    return window.requestAnimationFrame ||
    window.webkitRequestAnimationFrame ||
    window.mozRequestAnimationFrame ||
    window.oRequestAminationFrame ||
    window.msRequestAnimationFrame ||
	function(callback) {
	    window.setTimeout(callback, 1000/60);
	};
})();



function animate(b, bb, z, zb) {
    var c = document.getElementById("cool");
    var ctx = c.getContext("2d");

    var date = new Date();
    var time = date.getTime();
    var amplitude = 0.03125;

    var period = 10000;
    var sx = amplitude * Math.sin(time*2*Math.PI / period);
    
    // draw
    if(b) { 
//	ctx.transform(1,0,0,1,0,0);
//	console.log(c.width);
	ctx.scale(c.width/b.width, c.height/b.height);
	ctx.drawImage(b, 0, 0);
	ctx.scale(b.width/c.width, b.height/c.height);
    }
    if(z) { 
	ctx.translate(-z.width*sx, 0);
	ctx.transform(1,0,sx,1,0,0);
	ctx.drawImage(z, 0, 0);
	ctx.transform(1,0,-sx,1,0,0);
	ctx.translate(z.width*sx,0);
    }
    
    // request new frame
    requestAnimFrame(function() {
	animate(b, bb, z, zb);
    });
};

// On load, set canvas size
window.onload = function() {
    $("#cool").attr("width",$(window).width());

    var zimg = new Image();
    var bgimg = new Image();
    var zb = false;
    var bgb = false;

    bgimg.onload = function() {
	bgb = true;
    };
    zimg.onload = function() {
	zb = true;
    };    
    zimg.src = "http://i4.photobucket.com/albums/y142/SJM_18_MI/renders/videogame/zombie.png";
    bgimg.src = "http://upload.wikimedia.org/wikipedia/commons/1/1d/TCNJ_School_of_Business.JPG";
//    bgimg.src = "http://placehold.it/"+$(window).width()+"x400";
    
    animate(bgimg, bgb, zimg, zb);
};

// If window size reset, adjust the canvas!
$(window).resize(function() {
    $("#cool").attr("width",$(window).width());
//    animate(bgimg, bgb, zimg, zb);
});