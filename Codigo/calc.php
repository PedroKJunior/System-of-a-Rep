<!DOCTYPE html>
<html>
<head>
	<title>System of a Rep</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/form.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/tabela.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/menu.js"></script>
	<script src="js/validacao.js"></script>
	<script src="js/btn"></script>
	<style type="text/css">
		.slider{
			left:320px;
		}
	</style>

	<?php

		if(isset($_GET['aux'])){ $aux = $_GET['aux'];} else {$aux = 1;}
		
		$setado = false;

		if(isset($_POST['mesCalc'])){

			$mes = $_POST['mesCalc'];

			$total = 0;

			$mysqli =  mysqli_connect('localhost', 'root', '', 'systemofarep') or die("Não foi possivel conectar ao servidor MySQL");


			$sqlMes = ("SELECT * FROM `despesas` where `mes` LIKE '%".$mes."%'");
			$queryMes = mysqli_query($mysqli, $sqlMes);


			while($dadoMes = mysqli_fetch_array($queryMes)){
				$total = $dadoMes['total'];
				$id = $dadoMes['id'];
			}

			$row = $queryMes->num_rows;


			if($row>0){
				$setado = true; 
			}

			$sqlMoradores = ("SELECT * FROM `moradores`");
			$queryMoradores = mysqli_query($mysqli, $sqlMoradores);


			$moradores = $queryMoradores->num_rows;

			$sqlAluguel = ("SELECT * FROM `residencia` where `id` LIKE 1");
			$queryAluguel = mysqli_query($mysqli, $sqlAluguel);


			while($dadoAluguel = mysqli_fetch_array($queryAluguel)){
				$caixinha = $dadoAluguel['caixinha'];
				$aluguel = $dadoAluguel['aluguel'];
			}


			$valor = $total+$caixinha+$aluguel;
			$divisão = $valor/$moradores;

		}
	?>
</head>
<body>
	<div class="row">
		<div class="col-md-12">
		
		<!-- ------- MENU ------ -->
			<nav class="col-md-12">
				<ul class="menu">
					<li id="cad">Cadastrar</li>
					<li id="list">Listas/Históricos</li>
					<li id="calc">Cálculo</li>
					<li id="sair">Sair</li>
					<li class="slider"></li>
				</ul>
			</nav>

		<!-- ------- FORM ------ -->
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="body">
				<form action="calc.php?aux=0" method="post">

					<div class="field col-md-4 col-md-offset-4">
						<input type="month" required name="mesCalc" class="field-input" id="mesCalc"/>
						<label for="mesCalc" class="field-label">Mês</label>
						<span class="bar"></span>	
					</div>

					<?php
						if($setado){
							echo '
								<div class="field col-md-4 col-md-offset-4">
									<table>
										<thead>
											<tr>
												<th>Total</th>
												<th>Divisão</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td> R$ <a href="inf_mensalidade.php?id='.$id.'">'.$valor.' </td>
												<td> R$ '.$divisão.' </td>
											</tr>
										</tbody>
									</table>
								</div>';
						} else if( $aux == 0) {
							?>
								<div class="field col-md-8 col-md-offset-2">
									<div class="err" id="erro">
										Não há despesas cadastradas para o mês selecionado!
									</div>
								</div>
					<?php			
						}
					?>
					<input type="submit" class="botao" id="calc" value="Calcular">
				</form>
			</div>
		</div>
	</div>
</body>
</html>