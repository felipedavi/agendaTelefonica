<html lang="pt-br">
<head>
	<title>Incluir Registros</title>
	<meta charset="utf-8">
</head>
<body>
	<?php

	/*
		cria variáveis PHP com o conteúdo dos campos do formulário
	*/
	$nome        = $_POST['nome'];
	$endereco    = $_POST['endereco'];
	$complemento = $_POST['complemento'];
	$bairro      = $_POST['bairro'];
	$cidade      = $_POST['cidade'];
	$cep         = $_POST['cep'];

	/*
		retira ponto e traço do cep
	*/
	$cep=preg_replace('/[\.-]/','',$cep);

	/*
		Cria a conexao com o banco de dados
	*/

	include "include/conexao.php";

	/*
		cria o comando SQL para inclusão na tabela agenda
	*/
	$sql = "insert into agenda (nome,endereco,complemento,bairro,cidade,cep)
			values ('$nome','$endereco','$complemento','$bairro','$cidade','$cep')";

	/*
		executa o comando SQL, enviando o comando para o MySQL.
		Coloc o resultado na variável $resultado
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
		echo "Inclusão de $nome realizada com sucesso";
   ?>
</body>