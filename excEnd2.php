<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Exclusão</title>
		<meta charset="utf-8">
	</head>
<body>
		<?php
			/* recebe o valor dos campos pelo método POST */
			$codigo = $_POST['codigo'];
			$nome   = $_POST['nome'];

			/*
			   inclui os comandos PHP necessários para criar a conexão com o banco de dados agenda
			*/

			include "include/conexao.php";

			/*
				cria o comando SQL para eclusão de registro na tabela agenda
			*/
			$sql = "delete from agenda where codigo='$codigo'";

			/*
				executa o comando SQL, enviando o comando para o MySQL. Coloca o resultado na variável $resultado
			*/
			$resultado = mysqli_query($conexao,$sql);

			/*
				testar para verificar se houve erro de inclusão
			*/

			if (!$resultado)
				echo "Erro:" . mysqli_error($conexao);
			else
				echo "Exclusão de $nome realizada com sucesso";
		?>
	</body>
</html>