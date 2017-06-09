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
		<div class="col-md-4 col-md-offset-4">
			<div class="body">

				<?php

					$id = $_GET['id'];

			 		$mysqli =  mysqli_connect('localhost', 'root', '', 'systemofarep') or die("Não foi possivel conectar ao servidor MySQL");

			 		$sql = ("SELECT * FROM `despesas` WHERE `id` LIKE '".$id."'");
			 		$query = mysqli_query($mysqli, $sql);

			 		while ($dados = mysqli_fetch_array($query)) {
				?>
				<table>
					<tbody>
						<tr>
							<td class="index">Ano - Mês:</td>
							<td>
								<?php
									echo $dados['mes'];
								?>
							</td>
						</tr>
						<tr>
							<td class="index">Energia:</td>
							<td>
								<?php
									echo 'R$ '.$dados['energia'];
								?>
							</td>
						</tr>
						<tr>
							<td class="index">Água:</td>
							<td>
								<?php
									echo 'R$ '.$dados['agua'];
								?>
							</td>
						</tr>
						<tr>
							<td class="index">Internet e TV:</td>
							<td>
								<?php
									echo 'R$ '.$dados['intertv'];
								?>
							</td>
						</tr>
						<tr>
							<td class="index">Alimentação:</td>
							<td>
								<?php
									echo 'R$ '.$dados['alimentacao'];
								?>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				<a href="historico.php"><div class="botao">Voltar</div></a>
			</div>
		</div>
	</div>
</body>
</html>