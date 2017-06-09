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

			 		$sql = ("SELECT * FROM `moradores`");
			 		$query = mysqli_query($mysqli, $sql);
				?>
				<table>
					<thead>
						<tr>
							<th>Morador</th>
							<th>Telefone</th>
						</tr>
					</thead>
					<tbody>
						
					<?php
						while ($dados = mysqli_fetch_array($query)) {
					?>
						<tr>
							<td>
								<?php
									echo "<a href='inf_morador.php?id=".$dados['id']."'>".$dados['nome']."</a>";
								?>
							</td>
							<td>
								<?php
									echo $dados['telefone'];
								?>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>