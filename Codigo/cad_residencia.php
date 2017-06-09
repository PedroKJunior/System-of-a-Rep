<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/form.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/menu.css">
<meta charset="utf-8">

<script type="text/javascript">
	setTimeout(function(){
		window.location = 'residencia.html'
	}, 2000);
</script>

<?php

include('conexao.php');

if(isset($_POST['id'])){  $_res = $_POST['id']; }
$aluguel = $_POST['aluguel'];
$caixinha = $_POST['caixinha'];

$banco = mysqli_select_db($conexao, 'systemofarep'); //conectando com a tabela do banco de dados
	
	if(isset($_POST['cadastrar'])){
		$query =" INSERT INTO systemofarep.residencia VALUES(NULL, '$aluguel', '$caixinha')";
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
		$query  = mysql_query("UPDATE res SET  aluguel='$aluguel', caixinha='$caixinha' WHERE res.id=".$res);
	
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