<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/form.css">
<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<meta charset="utf-8">

<script type="text/javascript">
	setTimeout(function(){
		window.location = 'despesas.html'
	}, 2000);
</script>

<?php

include('conexao.php');

if(isset($_POST['id'])){  $_despesa = $_POST['id']; }
$mes = $_POST['mes'];
$energia = $_POST['energia'];
$agua = $_POST['agua'];
$net = $_POST['net'];
$alimentacao = $_POST['alimentacao'];
$total = $_POST['total'];

$banco = mysqli_select_db($conexao, 'systemofarep'); //conectando com a tabela do banco de dados
	
	if(isset($_POST['cadastrar'])){
		$query =" INSERT INTO systemofarep.despesas VALUES(NULL, '$mes', '$energia', '$agua', '$net','$alimentacao', '$total')";
		mysqli_query($conexao, $query);

		echo '
			<div class="row">
				<div class="col-md-4 col-md-offset-4 end">
					CADASTRO EFETUADO COM SUCESSO!!!
					<span class="redirect">
						Você será redirecionado em 3s.
					</span>
				</div>
			</div>';
	}

	if(isset($_POST['atualizar'])){
		$query  = mysql_query("UPDATE systemofarep.despesas SET  mes='$mes', energia='$energia', agua='$agua', net='$net', alimentacao='$alimentacao', tatal='$total' WHERE despesa.id=".$_despesa);
	
		echo '
			<div class="row">
				<div class="col-md-4 col-md-offset-4 end">CADASTRO EDITADO COM SUCESSO!!!
					<span class="redirect">
						Você será redirecionado em 3s.
					</span>
				</div>
			</div>';
	}				
?> 