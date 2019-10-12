<html lang="pt-br">
<head>
	<title>Alterar Registros</title>
	<meta charset="utf-8">
</head>
<body>
	<?php

	/* 
		recebe o valor dos campos pelo método POST 
	*/
	$codFone     = $_POST['codFone'];
	$fone        = $_POST['fone'];
	$codEnd      = trim($_POST['codEnd']);
	$nome        = trim($_POST['nome']);
	$codTipoFone = $_POST['codTipoFone']; 
	/*
		inclui o programa conexao.php aqui
	*/

	include "include/conexao.php";

	/*
		cria o comando SQL para inclusão na tabela agenda
	*/
	$sql = "update telefone set codfone='$codFone',codend='$codEnd',telefone='$fone',tipofone='$codTipoFone' where codfone='$codFone'";

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