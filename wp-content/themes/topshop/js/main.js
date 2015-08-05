function addProductToCar(id,stock){
	var url_petition = "http://www.importadoraseverino.com/wp-content/themes/topshop/functions/add_product_car.php?id="+id+"&stock="+stock;

	$.ajax({
		url: url_petition,
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

function create_quote () {
  $.ajax({
		url: "http://www.importadoraseverino.com/wp-content/themes/topshop/functions/create_quote.php",
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

function moreStock(){ 
	var new_count = parseInt($('#count').val()) + 1; 
	
	$('#count').val(new_count);
}

function lessStock(){ 
	var new_count = parseInt($('#count').val()) - 1;
	
	$('#count').val(new_count);
}

function addProductFromPI(id){
	var stock = parseInt($('#count').val());
	addProductToCar(id,stock);
}



$(document).ready(function(){	$('.home_slick').slick({
		centerMode: true,
		variableWidth:true,
		slidesToShow: 3,
		autoplay:true,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					arrows: false,
					centerMode: true,
					slidesToShow: 3
				}
			},
			{
				breakpoint: 480,
				settings: {
					arrows: false,
					centerMode: true,
					slidesToShow: 1
				}
			}
		]
	});
	
	$("#create_user").click(function(){
		var email = $("#user_email").val();
		var name = $("#user_name").val();
		var pass = $("#user_password").val();
		var pass2 = $("#user_password2").val();
		var errors = 0;
		
		
		if(email==''){
			errors++;
			// alert("El email es obligatorio");
		}
		if(name==''){
			errors++;
			// alert("El nombre de usuario es obligatorio");
		}
		if(pass==''){
			errors++;
			// alert("El nombre de usuario es obligatorio");
		}
		if(pass2==''){
			errors++;
			// alert("Porfavor confirma tu contraseña");		}
		}
		if(pass!=pass2){
			errors++;
			// alert("las contraseñas no coinciden");		
		}
		
		console.log(errors);
		
		if(errors==0){
			console.log("todo va bien");
			$.ajax({
				method: "POST",
				url: "http://www.importadoraseverino.com/wp-content/themes/topshop/functions/create_user.php",
				data: { email: "John", name: "Boston",pass: "John" },
				dataType: "json",
				beforeSend: showLoading(),
				success: function(result){
					hideLoading();
					if(result.status == "error"){
						console.log("Esta es una respuesta: " + result.status);
					}else{
						console.log("Esta es una respuesta: " + result.status);
						window.location = "http://www.importadoraseverino.com";
					}
		
		        }
		   	});
		}else{
			alert("Tienes algunos errores en el formulario");
			console.log("Errores en el formulario");
		}
		
		// alert("JSDO");
	});
	
	console.log("JSDOa");
});