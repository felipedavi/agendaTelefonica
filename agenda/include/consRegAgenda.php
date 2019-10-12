<?php
/*
	Include utilizado pelos programas altEnd2.php, conEnd2.php
	
	cria o comando SQL de consulta na tabela agenda. Esse
	comando lê apenas o registro com a chave primária contida
	na variável $codigo
*/

$sql = "SELECT * from agenda WHERE codigo=" . $codigo;

/* 
   	executa o comando SQL inserido na variável string $sql. Coloca o 
   	resultado na variável $resultado
*/

$resultado = mysqli_query($conexao,$sql);

/*
	Coloca os campos do registro lido nas variáveis PHP. O teste abaixo é usado para verificar se houve erro, que é tratado no else.
*/

if ( $linha = mysqli_fetch_array($resultado,MYSQLI_ASSOC)) {
	/*
		Coloca em variáveis PHP o conteúdo dos campos codigo e nome da linha atual
	*/
	$codigo      = $linha["codigo"];
	$nome        = $linha["nome"];
	$endereco    = $linha["endereco"];
	$complemento = $linha["complemento"];
	$bairro      = $linha["bairro"];
	$cidade      = $linha["cidade"];
	$cep         = $linha["cep"];
	/*
		coloca ponto e traço em $cep
	*/
	$cep = $cep[0] . $cep[1] . "." . $cep[2] . $cep[3] . $cep[4] . "-" . $cep[5] . $cep[6] . $cep[7];
}
else
     echo "<h2>Erro na consulta</h2>";	  	     
?>