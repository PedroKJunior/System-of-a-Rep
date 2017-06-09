$(document).ready(function(){
	
	$('input').blur(function(){

		if($(this).val())
			$(this).addClass('used');
		else
			$(this).removeClass('used');
	});

	$('#month').on("click", function(){
		$(this).css("color","white");
	});

	$('#cancelar').on("click", function(){
		$('input').removeClass('used');
	});	
});
