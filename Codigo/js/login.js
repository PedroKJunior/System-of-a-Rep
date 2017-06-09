$(document).ready(function(){

	$('#btnLogin').click(function(e){

		id = $("#username").val();
		password = $("#password").val();

		if(password == '123456' && id == 'morador'){
			

			$("#login").addClass('alert-success');
			$("#login").css('padding','5px');
			$("#login").css('text-align',' center');
			$("#login").css('font-weight',' bold');
			$("#login").html('Sucesso!!!');

			setTimeout(function(){
				window.location = 'cadastrar.html';
			}, 1000);
				
		}else{
			$("#login").addClass('alert-danger');			
			$("#login").css('padding','5px');
			$("#login").css('text-align',' center');
			$("#login").css('font-weight',' bold');
			$("#login").html('Usuário ou/e Senha incorretos');
		}
	});

	$("#password").focus(function(){

		$("#login").removeClass('alert-success');
		$("#login").removeClass('alert-danger');
	});
});