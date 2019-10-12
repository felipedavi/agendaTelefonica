<?php
/*
	cria o comando SQL de consulta na tabela telefone. Esse
	comando lê os registro com a chave estrangeira contida
	na variável $codigo
*/

$sql = "SELECT * from telefone WHERE codend=" . $codend;

/* 
   	executa o comando SQL inserido na variável string $sql. Coloca o 
   	resultado na variável $resultado
*/

$resultado = mysqli_query($conexao,$sql);

/*
	coloca os campos do registro lido nas variáveis PHP. O teste abaixo
	é usado para verificar se houve erro, que é tratado no else.
*/

if ( $linha = mysqli_fetch_array($resultado,MYSQLI_ASSOC)) {
	  /*
		coloca em variáveis PHP o conteúdo dos campos codigo e nome da 
		linha atual
	  */
	  $codfone  = $linha["codigo"];
	  $codend   = $linha["nome"];
	  $telefone = $linha["endereco"];
	  $tipofone = $linha["complemento"];
}
else
     echo "<h2>Erro na consulta de telefone</h2>";	  	     
?>