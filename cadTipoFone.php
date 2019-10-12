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
					<h2 class="centraliza">Cadastramento de Tipos de Telefone</h2>

					<form class="form-horizontal">	
						<div class="form-group">
						    <label class="control-label col-sm-3" for="nometipofone">Tipo de Telefone: </label>
						    <div class="col-sm-9">
						    	<input class="form-control" id="nometipofone" name="nometipofone" type="text" maxlength="20">
						    </div>
						</div>			
					</form>
					<br />
					<div class="text-center"> <!-- classe necessária para centralizar buttons do bootstrap -->
						<button id="btnNovo" class="btn btn-primary disabled">Inlcuir Novo Tipo de Telefone</button>
						<button id="btnAtualiza" class="btn btn-primary disabled">Atualiza Tipo de Telefone</button>
						<button id="btnCancelar" class="btn btn-danger">Cancelar</button>	
					</div>
					<br />
					<div id="tabelaTipoFone" class="table-responsive">
						<?php
							/*
								Inclui código para montar tabela de consulta de Endereços
							*/
					   		include "include/montaTabelaTipoFone.php";
					   	?>	
					</div>   <!-- fim da Div class="table-responsive" -->
				</div>    <!-- fim da Div class="col-xs-12" -->
			</div>    <!-- fim da Div class="row" -->
			<br />
			<?php
				/*
					Inclui barra de navegação inferior com texto de cppyright
				*/
		   		include "include/rodape.php";
		   	?>
		</div>   <!-- fim da Div class="container" -->
		<?php
			/*
				Inclui a janela modal usadas nesse programa
			*/
			include "include/modalSucesso.php";
			include "include/modalErro.php";
			include "include/modalExclusao.php";
		?>
	</body>
</html>

<!-- Referência JS -->
		
<script src="css/bootstrap/js/jquery-2.2.4.min.js"></script>
<script src="css/bootstrap/js/bootstrap.min.js"></script>

<!-- Biblioteca com as funções javascript usadas nessa página -->
<script src="js/tipoFone.js" type="text/javascript"></script>