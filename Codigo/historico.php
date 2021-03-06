<!DOCTYPE html>
<html>
<head>
	<title>System of a Rep</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/form.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/tabela.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/menu.js"></script>
	<script src="js/validacao.js"></script>
	<style type="text/css">
		.slider{
			left:160px;
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
		<div class="col-md-8 col-md-offset-2">
			<div class="body">

				<?php

			 		$mysqli =  mysqli_connect('localhost', 'root', '', 'systemofarep') or die("Não foi possivel conectar ao servidor MySQL");

			 		$sql = ("SELECT * FROM `despesas`");
			 		$query = mysqli_query($mysqli, $sql);


			 		$val = mysqli_query($mysqli, "SELECT * FROM `residencia` WHERE `id` LIKE 1");
				?>
				
				<table>
					<thead>
						<tr>
							<th>Mês</th>
							<th>Despesas</th>
						</tr>
					</thead>
					<tbody>
						
					<?php
						while ($dados = mysqli_fetch_array($query)) {
					?>
						<tr>
							<td>
								<?php
									echo "<a href='inf_despesa.php?id=".$dados['id']."'>".$dados['mes']."</a>";
								?>
							</td>
							<td>
								<?php
									echo $dados['total'];
								?>
							</td>
						</tr>
						<?php } ?>
						<tr>
							<td style="background-color: #00BCD4; font-weight: bold; color: white;">
								Aluguel:
							</td>
							<td style="background-color: #2a2a2a;"">
								<?php
									while($valor = mysqli_fetch_array($val)){
										echo $valor['aluguel'];
									}
								?>		
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>