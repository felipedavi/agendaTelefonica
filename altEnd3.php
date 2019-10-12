<html lang="pt-br">
	<head>
		<title>Alterar Registros</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		/*
			cria variáveis PHP com o conteúdo dos campos do formulário de alteração
		*/
		$nome        = $_POST['nome'];
		$endereco    = $_POST['endereco'];
		$complemento = $_POST['complemento'];
		$bairro      = $_POST['bairro'];
		$cidade      = $_POST['cidade'];
		$cep         = $_POST['cep'];
		$codigo      = $_POST['codigo'];

		/*
			retira ponto e traço do cep
		*/
		$cep = str_replace(".", "", $cep);
		$cep = str_replace("-", "", $cep);

		/*
			inclui o programa conexao.php aqui
		*/

		include "include/conexao.php";

		/*
			cria o comando SQL para inclusão na tabela agenda
		*/
		$sql = "update agenda set nome='$nome',endereco='$endereco',complemento='$complemento',bairro='$bairro',cidade='$cidade',cep='$cep'	where codigo='$codigo'";

		/*
			executa o comando SQL, enviando o comando para o MySQL.
			Coloc o resultado na variável $resultado
		*/
		$resultado = mysqli_query($conexao,$sql);

		/*
			testar para verificar se houve erro de inclusão
		*/

		if (!$resultado)
			echo "Erro:" . mysqli_error($conexao);
		else
			echo "Alteração de " .  $nome . " realizada com sucesso!";
	   ?>
	</body>
</html>