<?php
	/*
		Esse programa monta a tag de formulário <select> necessária para selecionar tipo de telefone. Essa tag tem que ser montada a partir da tabela de banco de dados fonetipo.
	*/
	include "include/conexao.php";

	echo '<select class="form-control" id="tipoFone" name="tipoFone">
		  <option value=""></option>';

	/*
		cria o comando SQL de consulta dos dados nas tabelas telefone e fonetipo
	*/
	$sql = "SELECT * from fonetipo order by nometipofone";
	/* 
		executa o comando SQL inserido na variável string $sql. Coloca o reusltado na variável $resultado.
	*/
	$resultado = mysqli_query($conexao,$sql);

	while ( $linha = mysqli_fetch_array($resultado,MYSQLI_ASSOC)) {
  		/*
			coloca em variáveis o conteúdo dos campos codigo e nome da linha atual
  		*/
  		$codtipofone  = $linha["codtipofone"];
  		$nometipofone = $linha["nometipofone"];
  		/*
			escreve em cada tag <option> os valores de cada registro de fonetipo
  		*/
		echo '<option value="'. $codtipofone . '">' . $nometipofone . '</option>';
	}
	echo '</select>';
?>