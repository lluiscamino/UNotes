  document.addEventListener('DOMContentLoaded', function() {
	  var copyButton = document.getElementById('copy-button');
	  if (copyButton !== null) {
		  copyButton.addEventListener('click', function(){
			    var inputLink = document.getElementById('share-link');
			    if (inputLink !== null) {
			    	inputLink.select();
			    	document.execCommand("copy");
			    }
		  });
	  }
  });