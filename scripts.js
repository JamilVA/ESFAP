// JavaScript Document
$(window).on("load", function(){
	$("#precarga").fadeOut('slow');
});
$(function(){
	//ScriollUp
	$.scrollUp({
		scrollName: 'scrollUp',
		topDistance: '300',
		topSpeed: 300,
		animation: 'fade',
		animationInSpeed: 200,
		animationOutSpeed: 200,
		scrollText: '',
		activeOverlay: false,
	});
	//Validar campo numerico
	$("#telefono").numeric();
	//OwlCarousel
	$('.owl-carousel').owlCarousel({
		loop			: true,
    	margin			: 10,
		items			: 1,
		autoplay		: true,
		responsiveClass	: true
	});
	//jQuery Fancybox
	$('.fancybox').fancybox();
	//Inicializar el control del menu
	var oculto = true;
	$("#mmovil").click(function(){
		if(oculto == true){
		   	$("#menu ul").css("right", "0");
			$("#mmovil").removeClass('icon-menu');
			$("#mmovil").addClass('icon-cancel-1');
			oculto = false;
		}else{
		   	$("#menu ul").css("right", "-101%");
			$("#mmovil").removeClass('icon-cancel-1');
			$("#mmovil").addClass('icon-menu');
			oculto = true;
		}
	})
	//Validar el Formulario Registro
	$("#bregistrar").click(function(){
		var emailreg	= /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if($("#nombres").val()==''){
		   	alertify.error("Debe ingresar su nombre");
			$("#nombres").focus();
			return false;
		}
		if($("#telefono").val()==''){
		   	alertify.error("Debe ingresar su telefono");
			$("#telefono").focus();
			return false;
		}
		if($("#email").val()=='' || !emailreg.test($("#email").val())){
		   	alertify.error("Debe ingresar un email valido");
			$("#email").focus();
			return false;
		}
		if($("#distrito").val()==''){
		   	alertify.error("Debe ingresar su distrito");
			$("#distrito").focus();
			return false;
		}
		if($('input[type=checkbox]:checked').length === 0){
		   	alertify.error("Aceptar términos de servicio y politica de privacidad");
			return false;  	
		}
		registrarUsuario();
	});	
	//Validar el Formulario Boletin
	$("#enviarbol").click(function(){
		var emailboletin	= /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if($("#emailbol").val()=='' || !emailboletin.test($("#emailbol").val())){
		   	alertify.error("Debe ingresar un email valido");
			$("#emailbol").focus();
			return false;
		}
		suscribirBoletin();
	});
	
});//Fin document ready
function registrarUsuario(){
	$("#proceso").val('registrarUsuario');
	var datosUsuario = $("#fregistros").serialize();
	$.ajax({
		data	: datosUsuario,
		url		: "procesos.php",
		type	: "post",
		dataType: "json",
		success	: function(datos){
			$("#nombres").val('');
			$("#telefono").val('');
			$("#email").val('');
			$("#distrito").val('');
			$("#cajaterminos").html(datos.respuesta);
		}
	});
}	
/*************************/
function suscribirBoletin(){
	$("#procesobol").val('suscripcionBoletin');
	var datosSuscriptor = $("#fboletin").serialize();
	$.ajax({
		data	: datosSuscriptor,
		url		: "procesos.php",
		type	: "post",
		dataType: "json",
		success	: function(datos){
			$("#emailbol").val(datos.respuesta);
		}
	});
}