<?php

/*
	Valores necessários para criar conexão com servidor MySQL 
*/
$servidor = "localhost";
$usuario  = "root";
$senha    = "";
$banco    = "ti205";

 
 // cria a conexão com o banco de dados MySQL

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);


// seleciona o bano de dados liccomp

// $select = mysqli_select_db($conexao,$banco);

/*
	Os comandos a seguir são necessários para cadastrar caracteres acentuados e cedilha no banco de dados
*/

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
?>