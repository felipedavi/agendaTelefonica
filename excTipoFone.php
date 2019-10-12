<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Exclusão</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
			/* recebe o valor dos campos pelo método POST */
			$codTipoFone = $_POST['codTipoFone'];

			/*
			   inclui os comandos PHP necessários para criar a conexão com o banco de dados agenda
			*/

			include "include/conexao.php";

			/*
				cria o comando SQL para eclusão de registro na tabela agenda
			*/
			$sql = "delete from fonetipo where codtipofone='$codTipoFone'";

			/*
				executa o comando SQL, enviando o comando para o MySQL. Coloca o resultado na variável $resultado
			*/
			$resultado = mysqli_query($conexao,$sql);

			/*
				testar para verificar se houve erro de inclusão
			*/

			if (!$resultado)
				if (mysqli_errno($conexao)==1451)
					echo "Erro - esse tipo de telefone não pode ser excluído, pois já está associado a um telefone";
				else
					echo "Erro:" . mysqli_error($conexao) . "-" . mysqli_errno($conexao);
			else
				include "include/montaTabelaTipoFone.php";
		?>
	</body>
</html>