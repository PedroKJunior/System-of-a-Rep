<!DOCTYPE html>
<html>
<head>
	<title>System of a Rep</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/inf.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/menu.js"></script>
	<script src="js/validacao.js"></script>
	<style type="text/css">
		.slider{
			left:320px;
		}
	</style>
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
		<div class="col-md-4 col-md-offset-4">
			<div class="body">

				<?php

					$id = $_GET['id'];

					$mysqli =  mysqli_connect('localhost', 'root', '', 'systemofarep') or die("Não foi possivel conectar ao servidor MySQL");

				?>
				<table>
					<tbody>
						<tr>
							<td class="index">Despesas:</td>
							<td>
								<?php
									
			 						$sql_d = ("SELECT * FROM `despesas` WHERE `id` LIKE '".$id."'");
			 						$query_d= mysqli_query($mysqli, $sql_d);

			 						while ($dados_d = mysqli_fetch_array($query_d)) {
										echo 'R$ '.$dados_d['total'];
										$total = $dados_d['total'];
								   	}

								?>
							</td>
						</tr>
						<tr>
							<td class="index">Aluguel:</td>
							<td>
								<?php
									
			 						$sql_a = ("SELECT * FROM `residencia` WHERE `id` LIKE 1");
			 						$query_a= mysqli_query($mysqli, $sql_a);

			 						while ($dados_a = mysqli_fetch_array($query_a)) {
										echo 'R$ '.$dados_a['aluguel'];
								   		$aluguel = $dados_a['aluguel'];
								?>
							</td>
						</tr>
						<tr>
							<td class="index">Caixinha:</td>
							<td>
								<?php
										echo 'R$ '.$dados_a['caixinha'];
										$caixinha = $dados_a['caixinha'];
									}
								?>
							</td>
						</tr>
						<tr>
							<td class="index">Total</td>
							<td>
								<?php

									$valor = $total+$caixinha+$aluguel;
									echo 'R$ '.$valor;
								?>
							</td>
						</tr>
						<tr>
							<td class="index">Moradores:</td>
							<td>
								<?php
									
			 						$sql_m = ("SELECT * FROM `moradores`");
			 						$query_m = mysqli_query($mysqli, $sql_m);

			 						while ($dados_m = mysqli_fetch_array($query_m)) {
								   		$moradores = $query_m->num_rows;
								   		echo $moradores;
								   	}
								?>
							</td>
						</tr>
						<tr>
							<td class="index">Divisão:</td>
							<td>
								<?php
									echo 'R$ '.($total+$caixinha+$aluguel)/$moradores;
								?>
							</td>
						</tr>
					</tbody>
				</table>
				<a href="historico.php"><div class="botao">Voltar</div></a>
			</div>
		</div>
	</div>
</body>
</html>