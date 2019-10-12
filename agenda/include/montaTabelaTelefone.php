<?php
	/*  Esse include é usado apenas no programa cadFone2.php
	
		inclui os comandos PHP necessários para criar a conexão com o banco de dados
	*/
	include "include/conexao.php";

	/*
		Coloca na resosta HTML os comandos fixos da tabela que será exibida
	*/
	echo '<table id="listagem" class="table table-striped table-bordered table-hover">
			<thead>
				<th>Telefone</th>
				<th>Tipo</th>						
				<th>Alterar</th>
				<th>Excluir</th>
				<th style="display: none;"></th>						
				<th style="display: none;"></th>						
				<th style="display: none;"></th>						
				<th style="display: none;"></th>
			</thead>
			<tbody>';

	/*
		cria o comando SQL de consulta dos dados nas tabelas telefone e fonetipo
	*/
	$sql = "SELECT telefone.telefone,fonetipo.nometipofone,fonetipo.codtipofone,telefone.codfone
			FROM agenda
			INNER JOIN telefone ON agenda.codigo=telefone.codend
			INNER JOIN fonetipo on telefone.tipofone=fonetipo.codtipofone
			WHERE agenda.codigo=$codEnd";
	/* 
		executa o comando SQL inserido na variável string $sql. Coloca o reusltado na variável $resultado. Após, coloca na variável $numeroLinhas quantas linhas foram enviadas pelo MySQL. Se forem zero, não existem telefones cadastrados para esse usuário, e a tabela deve ser criada sem nehnuma <tr>.
	*/
	$resultado = mysqli_query($conexao,$sql);
	$numeroLinhas = mysqli_num_rows($resultado);

	if ( $numeroLinhas > 0) {
		/*
			A consulta acima retornou todos os registros de telefone com codend=$codend, e o comando de repetição "while" a seguir lê este conjunto de dados linha a linha e escreve a tabela.
		*/
		while ( $linha = mysqli_fetch_array($resultado,MYSQLI_ASSOC)) {
	  		/*
				Coloca em variáveis o conteúdo dos campos codigo e nome da linha atual
	  		*/
	  		$telefone     = $linha["telefone"];
	  		$nometipofone = $linha["nometipofone"];
	  		$codtipofone  = $linha["codtipofone"];
	  		$codfone      = $linha["codfone"];
	  		/*
				Escreve na resposta HTML a linha de tabela referente ao registro da tabela sendo processada no momento
	  		*/
			echo '
				<tr>
				<td>'. $telefone . '</td>
				<td>'. $nometipofone . '</td>
				<td align="center"><a href="#" border="0" class="btnEditar"><img src="imagens/edit.png"></a></td>
				<td align="center"><a href="#" border="0" class="btnExcFone"><img src="imagens/delete.png"></a></td>
				<td style="display: none;">' . $codEnd .'</td>
				<td style="display: none;">' . $codfone .'</td>
				<td style="display: none;">' . $nome .'</td>
				<td style="display: none;">' . $codtipofone .'</td>
				</tr>';
		}
	}

	/*
		Coloca na resosta HTML os comandos finais da tabela que será exibida
	*/
	echo '</tbody></table>';
?>