var myVideos = [];

window.URL = window.URL || window.webkitURL;

// document.getElementById('video_file').onchange = setFileInfo;

function setFileInfo() {
    myVideos = [];
    var files = this.files;
    myVideos.push(files[0]);
    var video = document.createElement('video');
    video.preload = 'metadata';

    video.onloadedmetadata = function() {
        window.URL.revokeObjectURL(video.src);
        var duration = video.duration;
        myVideos[myVideos.length - 1].duration = duration;
        updateInfos();
    }

    video.src = URL.createObjectURL(files[0]);
}


function updateInfos() {
    var infos = document.getElementById('infos');
    infos.textContent = "";
    for (var i = 0; i < myVideos.length; i++) {
        if(myVideos[i].size < 5242880) {
            var duration = String(myVideos[i].duration);
            var size = String((myVideos[i].size/1048576).toFixed(2))+'mb';
            var durationArr = duration.split('.');
            // console.log(durationArr);
            if(durationArr.length == 2) {
                duration = durationArr[0]+' seconds';
            }
            if(durationArr.length == 3) {
                duration = durationArr[1]+' mins';
            }
            infos.innerHTML += "Duration: " + duration + '<br>' + "Size: " +  size ;
            // infos.textContent += myVideos[i].name + " duration: " + myVideos[i].duration + '\n';
        } else {
            infos.innerHTML += "File size exceeds 5mb";
            return;
        }
    }
}


function get_vid_type(id) {
    var vidInput = document.getElementById(id);
    var inpVal = vidInput.value;
    var inpArr = inpVal.split('\\');
    var vidFile = inpArr[inpArr.length - 1];
    var vidFileTypeArr = vidFile.split('.');
    var vidFileType = vidFileTypeArr[vidFileTypeArr.length - 1];
    return vidFileType;
}





function getExtension(filename) {
    var parts = filename.split('.');
    return parts[parts.length - 1];
  }
  
  function isImage(filename) {
    var ext = getExtension(filename);
    switch (ext.toLowerCase()) {
      case 'jpg':
      case 'gif':
      case 'bmp':
      case 'png':
        //etc
        return true;
    }
    return false;
  }
  
  function isVideo(filename) {
    var ext = getExtension(filename);
    switch (ext.toLowerCase()) {
      case 'm4v':
          return false;
      case 'avi':
          return false;
      case 'mpg':
          return false;
      case 'mp4':
        // etc
        return true;
    }
    return false;
  }