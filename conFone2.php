<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Consulta Completa</title>
		<meta charset="utf-8">
	</head>
	<body>
		<div class="row">
		   		<div class="col-xs-offset-1 col-xs-10">
					<h3 class="text-center">Telefones de <?php echo $_POST['nome']; ?></h3>
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
							<tr>
								<th>Tipo</th>
								<th>Número</th>
							</tr>	
							<?php
								/* 
									recebe o valor do campo codend pelo método POST, e coloca na variável $codend 
								*/
								$codend = $_POST['codend'];
								/*
								   inclui os comandos PHP necessários para criar a conexão com o banco de dados
								*/
								include "include/conexao.php";
								/*
									Consulta SQL que faz o inner join entre as tabelas fonetipo e telefone, e depois
									restringe apenas aos registros com o codend informado. Esse comando de SQL 
									retorna os registros que são comuns às duas tabelas (interseção).
								*/
								$sql = "SELECT telefone.telefone, fonetipo.nometipofone 
										from telefone 
										inner join fonetipo on telefone.tipofone=fonetipo.codtipofone
										where telefone.codend=" . $codend;
								/* 
									executa o comando SQL inserido na variável string $sql. Coloca o 
									resultado na variável $resultado.
								*/
								$resultado = mysqli_query($conexao,$sql);
								$numeroLinhas = mysqli_num_rows($resultado);
								/*
									Se foi encontrado registro de telefone associado ao codend informado,
									executa a consulta. Senão, exibe mensagem informando que não existem telefones
									cadastrados.
								*/
								if ( $numeroLinhas > 0) {
									/*
										a consulta acima retorna um conjunto de registros, e o comando de repetição
										"while" a seguir lê este conjunto de dados linha a linha
									*/
									while ( $linha = mysqli_fetch_array($resultado,MYSQLI_ASSOC)) {
								  		/*
											coloca em variáveis o conteúdo dos campos da linha atual
								  		*/
								  		$telefone = $linha["telefone"];
								  		$nometipofone = $linha["nometipofone"];
								  		/*
											escreve na resposta HTML a linha de tabela referente ao registro
											da tabela sendo processada no momento
								  		*/
								  		echo "<tr>
								  			  <td> $nometipofone </td>
								  			  <td> $telefone </td>
								  			  </tr>";
									}
								}
								else
									echo "<tr>
										  <td colspan='2'>Nome selecionado não possui telefone cadastrado!</td>
										  </tr>";
					   	?>
					</table>
				</div>   <!-- fim da Div class="table-responsive" -->
			</div>    <!-- fim da Div class="col-xs-12" -->
		</div>    <!-- fim da Div class="row" -->
	</body>
</html>