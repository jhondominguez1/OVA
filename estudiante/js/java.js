function mostrar_comen(){
	$('#con_comentarios').fadeToggle();
}
function mostrarPanel(cp){

	window.location="./?cargar=cpanel&cp="+cp;

}
function mostrarUpdate(cp,id){

	window.location="./?cargar=cpanel&cp="+cp+"&id="+id;

}
function mostrarEntrada(id){
//alert(mp);

		$("#post"+id).css({"height":"300px"});
	
}
function deletEntrada(cp,id){
	var mes = confirm("¿Desea eliminar el registro..?")
	if (mes) {
		window.location="./?cargar=cpanel&cp="+cp+"&del_id="+id;
	};
	
}
$(document).ready(init);

function init() {
    $("#acordeon h3").click(function(){
		//slide up all the link lists
		$("#acordeon ul ul").slideUp();
		//slide down the link list below the h3 clicked - only if its closed
		if(!$(this).next().is(":visible"))
		{
			$(this).next().slideDown();
		}
	})
}
$(document).ready(mos);

function mos() {
    $("#slider h3").click(function(){
    	var ancho = $(window).width();
    	var alto = $(window).height();
    	if (ancho<766) {
    		$("#slider ul ul").slideUp();
		//slide down the link list below the h3 clicked - only if its closed
		if(!$(this).next().is(":visible"))
		{
			$(this).next().slideDown();
		}
    	};
    	
		//slide up all the link lists
		
	})
}
$(window).scroll(function(){
	var ancho = $(window).width();
	            if ($(this).scrollTop()){
					 $('.navbar').addClass("fixed").slideDow("show");
					 //$('.contenedor').addClass("margen").fadeIn();
				}
                else {
					$('.navbar').removeClass("fixed");
					//$('.contenedor').removeClass("margen");
				}
});
