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
		<link rel="stylesheet" type="text/css" href="css/navbar.css">
		<link rel="stylesheet" type="text/css" href="css/collapse.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		
	</head>
	<body>
		<div class="container">
		  	<?php
		  		/*
					Esses include inserem a imagem superior da página index.php e a barra de navegação superior geral,
					com o menu do sistema
		  		*/
				include "include/imgIndex.php";
	   			include "include/navbar.php";
	   		?>

			<div class="inicial">
				<h1>Bem-vindo ao Sistema de Agenda Telefônica!</h1>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum..
				</p>
			</div>

			<?php
				/*
					Esse include insere o rodapé com o copyright do sistema.
		  		*/
	   			include "include/rodape.php";
	   		?>
		</div> <!-- fim div container -->
	</body>
</html>

<!-- Referência JS -->

<script src="css/bootstrap/js/jquery-2.2.4.min.js"></script>
<script src="css/bootstrap/js/bootstrap.min.js"></script>