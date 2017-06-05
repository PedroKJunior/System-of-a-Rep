$(document).ready(function(){
	// 1 - Capturando a ação de click da UL e executando a função
	$("ul li").click(function(e){
  	
	  	// 2 - ADD movimento ao slider 
		
		// Verificando se a tab estava pressionada
		  // * O metodo "index" me retorna um inteiro com base na posicação do elemento clicado
		var tabreference = $(this).index();
		
		// Efeito de deslizamento - 160px da largura do elemento x a posição do clique
		var sliding = 160 * tabreference;
		
		// A nova posição do slider será baseada no valor da var anterior
		$(".slider").css({
			left: sliding + "px"
		});
	  
	  	// 3 - Efeito Ripple button
	  	
	  	// Remove as ações anteriores do ripple
	  	$(".ripple").remove();
		
		// Configurações
		// o metodo offset envia coordenadas dos elementos, neste caso as posições do clique
		var posX = $(this).offset().left,
		    posY = $(this).offset().top,
		    buttonWidth = $(this).width(),
		    buttonHeight = $(this).height();
		
		// Add the element
		// o metodo prepend funciona como um "before" do CSS3
		$(this).prepend("<span class='ripple'></span>");
		
		// Fazendo o efeito ficar dinâmico
		if (buttonWidth >= buttonHeight) {
		    buttonHeight = buttonWidth;
		} else {
			buttonWidth = buttonHeight;
		}	
		
		// Capturar o centro do elemento
		var x = e.pageX - posX - buttonWidth / 2;
		var y = e.pageY - posY - buttonHeight / 2;
		
		// Add os novos atribuidos ao efeito ripple
		$(".ripple").css({
			width: buttonWidth,
			height: buttonHeight,
		  	top: y + 'px',
		  	left: x + 'px'
		}).addClass("rippleBtn");
	});
});
