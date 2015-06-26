function addProductToCar(id){
	
	$.ajax({
		url: "http://www.importadoraseverino.com/wp-content/themes/topshop/functions/add_product_car.php?id="+id,
		dataType: "json",
		beforeSend: showLoading(),
		success: function(result){
			hideLoading();
			if(result.status == "error"){
				console.log("Esta es una respuesta: " + result.msg);
			}else{
				console.log("Esta es una respuesta: " + result.data);
			}
        	
        }
   	});
}

function showLoading(){
	$("#loading").css("display","block");
}

function hideLoading(){
	$("#loading").css("display","none");
}

$(document).ready(function(){
	console.log("JSDO");
});
