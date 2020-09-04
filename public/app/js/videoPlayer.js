const video = document.getElementById('video');
const play = document.getElementById('play');
const stopVid = document.getElementById('stop');
const progress = document.getElementById('progress');
const timestamp = document.getElementById('timestamp');
const fullscreenbtn = document.querySelector(".fa-expand");
const volumeslider = document.getElementById("volumeslider");
const volinc = document.querySelector('.fa-volume-up');
const voldec = document.querySelector('.fa-volume-down');

// Play & pause video
function toggleVideoStatus() {
  if (video.paused) {
    video.play();
  } else {
    video.pause();
  }
}

// Detect press of spacebar, toggle play
function detectKeypress(e) {
	if (e.keyCode == 32) {
	  toggleVideoStatus();
	} else {
      return;
	}
}

// update play/pause icon
function updatePlayIcon() {
  if (video.paused) {
    play.innerHTML = '<i class="fa fa-play fa-2x"></i>';
  } else {
    play.innerHTML = '<i class="fa fa-pause fa-2x"></i>';
  }
}

// stop
// Update progress & timestamp
function updateProgress() {
  progress.value = (video.currentTime / video.duration) * 100;

  // Get minutes
  let mins = Math.floor(video.currentTime / 60);
  if (mins < 10) {
    mins = '0' + String(mins);
  }

  // Get seconds
  let secs = Math.floor(video.currentTime % 60);
  if (secs < 10) {
    secs = '0' + String(secs);
  }

  timestamp.innerHTML = `${mins}:${secs}`;
}

// Stop video
function stopVideo() {
  video.currentTime = 0;
  video.pause();
}

// Set video time to progress
function setVideoProgress() {
  video.currentTime = (+progress.value * video.duration) / 100;
}

function toggleFullScreen(){
	if(video.requestFullScreen){
		video.requestFullScreen();
	} else if(video.webkitRequestFullScreen){
		video.webkitRequestFullScreen();
	} else if(video.mozRequestFullScreen){
		video.mozRequestFullScreen();
  }
  else if(video.mzRequestFullScreen){
		video.mzRequestFullScreen();
	}
}

// Change the volume
var alterVolume = function(dir) {
  var currentVolume = Math.floor(video.volume * 10) / 10;
  if (dir === '+') {
      if (currentVolume < 1) video.volume += 0.1;
  }
  else if (dir === '-') {
     if (currentVolume > 0) video.volume -= 0.1;
  }
}



// Event listeners
video.addEventListener('click', toggleVideoStatus);
video.addEventListener('pause', updatePlayIcon);
video.addEventListener('play', updatePlayIcon);
video.addEventListener('timeupdate', updateProgress);
play.addEventListener('click', toggleVideoStatus);
stopVid.addEventListener('click', stopVideo);
progress.addEventListener('change', setVideoProgress);


fullscreenbtn.addEventListener("click",toggleFullScreen,false);

volinc.addEventListener('click', function(e) {
  alterVolume('+');
});
voldec.addEventListener('click', function(e) {
  alterVolume('-');
});


