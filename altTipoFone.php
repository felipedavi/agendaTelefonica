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
	$nomeTipoFone = $_POST['nomeTipoFone'];
	$codTipoFone  = $_POST['codTipoFone'];

	/*
		inclui o programa conexao.php aqui
	*/

	include "include/conexao.php";

	/*
		cria o comando SQL para inclusão na tabela agenda
	*/
	$sql = "update fonetipo set nometipofone='$nomeTipoFone' where codtipofone='$codTipoFone'";

	/*
		executa o comando SQL, enviando o comando para o MySQL. Coloca o resultado na variável $resultado
	*/
	$resultado = mysqli_query($conexao,$sql);

	/*
		testar para verificar se houve erro de inclusão
	*/

	if (!$resultado)
		if (mysqli_errno($conexao)==1062)
			echo "Erro - O tipo de telefone informado já foi cadastrado!";
		else
			echo "Erro:" . mysqli_error($conexao) . "-" . mysqli_errno($conexao);
	else
		/*
			Inclui código para montar tabela de consulta de Tipos de Telefone
		*/
   		include "include/montaTabelaTipoFone.php";

   ?>
</body>