function on_image_changed(){
	var selectedFile = document.getElementById('select_image').files[0];
    var img = document.getElementById('selected_image')
    
    var reader = new FileReader();
    reader.onload = function(){
        img.src = this.result;
    }

    reader.readAsDataURL(selectedFile);
 }