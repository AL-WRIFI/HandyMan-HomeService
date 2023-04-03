var box  = document.getElementById('boxn');
var down = false;


function toggle_Notifi(){
	if (down) {
		// box.style.height  = '0px';
		box.style.display='none';
		down = false;
	}else {
		// box.style.height  = '510px';
        box.style.display = 'block';
		down = true;
	}
}
