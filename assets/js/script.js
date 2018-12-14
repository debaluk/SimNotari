function select_name(nama){
	var a = nama.value;
	
	if(a=="other"){
		$("#titleevent").fadeIn();
	}else{
		$("#titleevent").fadeOut();
		$("#titleevent").val("");
	}
}

function select_locationevent(nama){
	var a = nama.value;
	if(a=="other"){
		$("#locationevent").fadeIn();
	}else{
		$("#locationevent").fadeOut();
		$("#locationevent").val("");
	}
}