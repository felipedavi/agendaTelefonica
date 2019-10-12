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
		<link rel="stylesheet" type="text/css" href="css/modal.css">
		<link rel="stylesheet" type="text/css" href="css/navbar.css">
		<link rel="stylesheet" type="text/css" href="css/collapse.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		

	</head>
	<body>
		<div class="container">
			<?php
		   		include "include/imagem.php";
		   		include "include/navbar.php";
		   		/*
		   			Coloca os valores enviados pelo programa cadFone1.php em variáveis PHP.
		   		*/
		   		$codEnd = $_GET['codigo'];
		   		$nome   = $_GET['nome'];
		   		/*
		   			Esse trecho em javascript é necessário para colocar em variáveis globais do javascript os valores recebidos do programa cadFone1.php ($codEnd e $nome). Isso porque esses valores serão usados pelo programas cadFone2.php, incTelefone.php, altTelefone.php e excTelefone.php
		   		*/
		   		echo "<script type='text/javascript'>
		   			  var codEnd  = '$codEnd';
		   			  var nome  = '$nome';
				  	 </script>";
			?>
			<div class="row">
				<div class="col-xs-12">
					<h3 class="centraliza">Cadastramento de Telefones de <?php echo $nome; ?></h3>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-offset-3 col-sm-6">	
					<form class="form-horizontal">	
						<div class="form-group">
						    <label class="control-label col-sm-4" for="telefone">Telefone: </label>
						    <div class="col-sm-8">
						    	<input class="form-control" id="telefone" name="telefone" type="text" maxlength="11">
						    </div>
						</div>			
						<div class="form-group">
						    <label class="control-label col-sm-4" for="tipoFone">Tipo de telefone: </label>
						    <div class="col-sm-8">
						    	<?php
						    		/*
						    			monta a tag HTML <select> a partir da tabela tipofone
						    		*/
						    		include "include/montaSelectTipoFone.php";
						    	?>
						    </div>
						</div>
					</form>
					<br />
					<div class="text-center"> <!-- classe necessária para centralizar buttons do bootstrap -->
						<button id="btnNovo" class="btn btn-primary disabled">Inlcuir Novo Telefone</button>
						<button id="btnAtualiza" class="btn btn-primary disabled">Salva Telefone</button>
						<button id="btnVoltar" class="btn btn-primary">Voltar</button>
						<button id="btnCancelar" class="btn btn-danger">Cancelar</button>	
					</div>
					<br />
				</div>
			</div>
			<div class="row">
				<div class="col-xs-offset-1 col-xs-10">
					<div class="table-responsive" id="tabelaTelefone">
						<?php
							/*
								Inclui a rotina de carregamento da tabela com os telefones
							*/
							include "include/montaTabelaTelefone.php";
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
		</div>    <!-- fim da Div class="container" -->
		<?php
			/*
				Inclui as janelas modais usadas nesse programa.
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
	<script src="js/jquery.maskedinput.min.js" type="text/javascript"></script>

	<!-- script com os comandos de edição de tabela HTML  -->

	<script type="text/javascript" src="js/telefone.js"></script>