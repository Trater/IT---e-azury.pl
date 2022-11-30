imgInp.onchange = evt => {
	const [file] = imgInp.files
	if (file) {
	  blah.src = URL.createObjectURL(file)
	}
    
	blah.style.visibility='visible';

    
  }