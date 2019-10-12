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
					<h2 class="centraliza">Consulta de Tipos de Telefone</h2>

					<div class="table-responsive">
						<?php
							/*  
								inclui os comandos PHP necessários para criar a conexão com o banco de dados
							*/
							include "include/conexao.php";

							/*
								Coloca na resposta HTML os comandos fixos da tabela que será exibida
							*/
							echo '<table id="listagem" class="table table-striped table-bordered table-hover">
									<thead>
										<th>Codigo</th>
										<th>Tipo de Telefone</th>						
									</thead>
									<tbody>';

							/*
								cria o comando SQL de consulta dos dados nas tabelas telefone e fonetipo
							*/
							$sql = "SELECT * from fonetipo order by nometipofone";
							/* 
								executa o comando SQL inserido na variável string $sql. Coloca o reusltado na variável $resultado. Após, coloca na variável $numeroLinhas 
								quantas linhas foram enviadas pelo MySQL. Se forem zero, não existem telefones cadastrados para esse usuário, e a tabela deve ser criada sem nehnuma <tr>.
							*/
							$resultado = mysqli_query($conexao,$sql);
							$numeroLinhas = mysqli_num_rows($resultado);
							if ( $numeroLinhas > 0) {
								/*
									A consulta acima retornou todos os registros de telefone com codend=$codend, e o comando de repetição "while" a seguir lê este  conjunto de dados linha a linha e escreve a tabela.
								*/
								while ( $linha = mysqli_fetch_array($resultado,MYSQLI_ASSOC)) {
							  		/*
										coloca em variáveis o conteúdo dos campos codigo e nome da linha atual
							  		*/
							  		$nometipofone = $linha["nometipofone"];
							  		$codtipofone  = $linha["codtipofone"];
							  		/*
										escreve na resposta HTML a linha de tabela referente ao registro da tabela sendo processada no momento
							  		*/
									echo '<tr>
										  <td>' . $codtipofone .'</td>
										  <td>'. $nometipofone . '</td>				
										  </tr>';
								}
							}
							/*
								Coloca na resosta HTML os comandos finais da tabela que será exibida
							*/
							echo '</tbody></table>';
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
			include "include/modalInfo.php";
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
