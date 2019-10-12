<html lang="pt-br">
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
	<?php

	/*
		cria variáveis PHP com o conteúdo dos campos do formulário
	*/
	$nomeTipoFone = $_POST['nomeTipoFone'];

	/*
		Cria a conexao com o banco de dados
	*/

	include "include/conexao.php";

	/*
		cria o comando SQL para inclusão na tabela agenda
	*/
	$sql = "insert into fonetipo (nometipofone) values ('$nomeTipoFone')";

	/*
		executa o comando SQL, enviando o comando para o MySQL. Coloca o resultado na variável $resultado
	*/
	$resultado = mysqli_query($conexao,$sql);

	/*
		testar para verificar se houve erro de inclusão
	*/

	if (!$resultado)
		if (mysqli_errno($conexao)==1062)
			echo "Erro - O nome informado já foi cadastrado!";
		else
			echo "Erro:" . mysqli_error($conexao) . "-" . mysqli_errno($conexao);
	else
		/*
			Inclui código para montar tabela de consulta de Tipos de Telefone
		*/
   		include "include/montaTabelaTipoFone.php";
   ?>
</body>