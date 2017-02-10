$(document).ready(function(){
	$("#esegui").on('click', function(){
		$("#filtro").fadeIn(0);
	});

	$("form").on('submit', function(){ $("#filtro").fadeIn(0); });

	$("a").on('click', function(){ 
		if(
			$(this).attr('class') != 'dropdown-toggle' &&
			$(this).attr('target') != '_blank'
		){
			$("#filtro").fadeIn(0); 
		}
	});

	 



});