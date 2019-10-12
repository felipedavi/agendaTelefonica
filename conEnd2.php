<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Consulta Completa</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php

			/* recebe o valor do campo codigo pelo método GET, e coloca na variável $codigo */
			$codigo = $_POST['codigo'];

			/*
			   inclui os comandos PHP necessários para criar a conexão com o banco de dados agenda
			*/

			include "include/conexao.php";

			/*
				Consulta o registro de Agenda com chave primária contida na	variável $codigo, e coloca os dados em variáveis PHP
			*/
			include "include/ConsRegAgenda.php";

			/*
				escreve na resposta HTML os campos do registro consultado
			*/
			echo "<p>Código: $codigo </p>
				  <p>Nome: $nome </p>
				  <p>Endereço: $endereco </p>
				  <p>Complemento: $complemento </p>
				  <p>Bairro: $bairro </p>
				  <p>Cidade: $cidade </p>
				  <p>CEP: $cep </p>";
		?>
	</body>
</html>