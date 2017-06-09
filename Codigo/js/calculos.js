$(document).ready(function(){

	$('#alimentacao').blur(function(){

		var energia =  $('#energia').val();
		var agua = $('#agua').val();	
		var net =  $('#net').val();
		var alimentacao = $('#alimentacao').val();

		var total = Number(energia) + Number(agua)+ Number(net)+ Number(alimentacao);

		$('#total').val(total);
	});	
});


