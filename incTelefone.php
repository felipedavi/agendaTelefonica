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
	$codEnd      = trim($_POST['codEnd']);
	$nome        = trim($_POST['codEnd']);
	$fone        = $_POST['fone'];
	$codTipoFone = $_POST['codTipoFone'];

	/*
		Cria a conexao com o banco de dados
	*/

	include "include/conexao.php";

	/*
		cria o comando SQL para inclusão na tabela agenda
	*/
	$sql = "INSERT INTO telefone (codend, telefone, tipofone) VALUES ('$codEnd','$fone','$codTipoFone')";

	/*
		executa o comando SQL, enviando o comando para o MySQL. Coloca o resultado na variável $resultado
	*/
	$resultado = mysqli_query($conexao,$sql);

	/*
		testar para verificar se houve erro de inclusão
	*/

	if (!$resultado)
		echo "Erro:" . mysqli_error($conexao) . "-" . mysqli_errno($conexao);
	else
		/*
			Inclui código para montar tabela de Telefones
		*/
   		include "include/montaTabelaTelefone.php";
   ?>
</body>