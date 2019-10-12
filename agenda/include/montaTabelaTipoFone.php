<?php
	/*  
		inclui os comandos PHP necessários para criar a conexão com o banco de dados
	*/
	include "include/conexao.php";

	/*
		Coloca na resosta HTML os comandos fixos da tabela que será exibida
	*/
	echo '<table id="listagem" class="table table-striped table-bordered table-hover">
			<thead>
				<th style="display: none;">Codigo</th>
				<th>Tipo de Telefone</th>						
				<th>Alterar</th>
				<th>Excluir</th>
			</thead>
			<tbody>';

	/*
		cria o comando SQL de consulta dos dados nas tabelas telefone e fonetipo
	*/
	$sql = "SELECT * from fonetipo order by nometipofone";
	/* 
		executa o comando SQL inserido na variável string $sql. Coloca o reusltado na variável $resultado. Após, coloca na variável $numeroLinhas 
		quantas linhas foram enviadas pelo MySQL. Se forem zero, não existem telefones cadastrados para esse usuário, e a tabela deve ser criada sem nehnuma <tr>.
	*/
	$resultado = mysqli_query($conexao,$sql);
	$numeroLinhas = mysqli_num_rows($resultado);

	if ( $numeroLinhas > 0) {
	
		/*
			A consulta acima retornou todos os registros de telefone com codend=$codend, e o comando de repetição "while" a seguir lê este  conjunto de dados linha a linha e escreve a tabela.
		*/
		while ( $linha = mysqli_fetch_array($resultado,MYSQLI_ASSOC)) {
	  		/*
				coloca em variáveis o conteúdo dos campos codigo e nome da linha atual
	  		*/
	  		$nometipofone = $linha["nometipofone"];
	  		$codtipofone  = $linha["codtipofone"];
	  		/*
				escreve na resposta HTML a linha de tabela referente ao registro da tabela sendo processada no momento
	  		*/
			echo '
				<tr>
				<td style="display: none;">' . $codtipofone .'</td>
				<td>'. $nometipofone . '</td>				
				<td align="center"><a href="#" border="0" class="btnEditar"><img src="imagens/edit.png"></a></td>
				<td align="center"><a href="#" border="0" class="btnExcTipoFone"><img src="imagens/delete.png"></a></td>
				</tr>';
		}
	}

	/*
		Coloca na resosta HTML os comandos finais da tabela que será exibida
	*/
	echo '</tbody></table>';
?>