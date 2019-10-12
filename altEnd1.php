
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Sistema de Agenda Telefônica</title>
		<link rel="shortcut icon" href="favicon.ico" />

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Referência CSS -->

		<link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/modal.css">
		<link rel="stylesheet" type="text/css" href="css/navbar.css">
		<link rel="stylesheet" type="text/css" href="css/collapse.css">


	</head>

	<body>
		<div class="container">
		   <?php
		   		include "include/imagem.php";
		   		include "include/navbar.php";
		   ?>
		   <div class="row">
		   		<div class="col-xs-offset-2 col-xs-8">
			   		<h2 class="centraliza">Alteração de Endereços</h2>
					<div class="table-responsive">
						<?php
							/*
								Inclui código para montar tabela de consulta de Endereços
							*/
					   		include "include/montaTabelaEnd.php";
					   	?>
					</div>   <!-- fim da Div class="table-responsive" -->
				</div>    <!-- fim da Div class="col-xs-offset-1 col-xs-10" -->
			</div>    <!-- fim da Div class="row" -->
			<br />
			<?php
				/*
					Inclui barra de navegação inferior com texto de cppyright
				*/
		   		include "include/rodape.php";
		   	?>
		</div>   <!-- fim da Div class="container" -->
	</body>
</html>

<!-- Referência JS -->

<script src="css/bootstrap/js/jquery-2.2.4.min.js"></script>
<script src="css/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){

		$("tbody tr").click(function(){
			/* 
				pega o valor da primeira td da linha que foi clicada e
				passa para o programa alterar2.php pelo método GET
			*/
			var codigo = jQuery(this).children("td:first").text();
			url= "altEnd2.php?codigo=" + codigo;
			location.href = url;
		})

	})
</script>
