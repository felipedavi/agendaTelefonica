<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Sistema de Agenda Telefônica</title>
		<link rel="shortcut icon" href="favicon.ico" />

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Referência CSS -->

		<link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/modal.css">
		<link rel="stylesheet" type="text/css" href="css/navbar.css">
		<link rel="stylesheet" type="text/css" href="css/collapse.css">

	</head>

	<body>
		<div class="container">
		   <?php
		   		include "include/imagem.php";
		   		include "include/navbar.php";
		   ?>
		   <div class="row">
		   		<div class="col-xs-offset-2 col-xs-8">
			   		<h2 class="centraliza">Exclusão de Endereços</h2>
					<div class="table-responsive">
						<?php
							/*
								Inclui código para montar tabela de consulta de Endereços
							*/
					   		include "include/montaTabelaEnd.php";
					   	?>
					</div>   <!-- fim da Div class="table-responsive" -->
				</div>    <!-- fim da Div class="col-xs-offset-1 col-xs-10" -->
			</div>    <!-- fim da Div class="row" -->

			<br />
			
			<?php
				/*
					Inclui barra de navegação inferior com texto de cppyright
				*/
		   		include "include/rodape.php";
		   	?>
		</div>   <!-- fim da Div class="container" -->

		<?php
			/*
				Inclui as janelas modais usadas nesse programa: uma para erro, outra para sucesso e
				uma para confirmar exclusão.
			*/
			include "include/modalErro.php";
			include "include/modalSucesso.php";
			include "include/modalExclusao.php";
		?>
	</body>
</html>

<!-- Referência JS -->

<script src="css/bootstrap/js/jquery-2.2.4.min.js"></script>
<script src="css/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
	/*
		variáveis globais codigo e nome. São usadas para guardar o codigo e o nome
		da linha da tabela clicada. Após a confirmação da exclusão, são enviadas 
		para o programa que fará a exclusão (excluir2.php) pela function
		$("#btnExcluir").click(function(evento).
	*/
	var codigo = null;
	var nome = null;
	/*
		variável global usada para guardar a linha clicada na tabela. Caso a exclusão seja 
		confirmada pelo usuário, esse linha será escondida na tabela usando o método jQuery
		.hide()
	*/
	var linhaTab = null;

	inputAtivo = null;
	
	$(document).ready(function(){

		$("tbody tr").click(function(){
			/*  
				coloca nas variáveis globais os campos da linha da tabela que foi clicada (codigo e nome)
			*/
			codigo = jQuery(this).children("td:first").text();			
			nome = jQuery(this).children("td:last").text();
			/*
				Coloca na variável global linhaTab a <tr> clicada pelo usuário. Em caso de confirmação
				de exclusão, essa linha será removida da tabela usando o evento .remove() do jQuery.
			*/
			linhaTab = this;

			/* 
				Confirma a exclusão através de janela pop up
			*/
			$("#modalExcTexto").html( "Deseja realmente excluir definitivamente o endereço e os telefones de <b>"+nome+"</b>?");
			$("#modalExcTitulo").text("ATENÇÃO: Exclusão Definitiva de Endereço e Telefones");
			$("#janelaModalExclusao").modal();
		})

		$("#btnExcluir").click(function(evento){
			/*
				Essa função só é executada se o usuário clicar no botão "Excluir", exibido
				pela função $("tr").click(function()). Esse botão aparece na janela pop up
				de confirmação de exclusão

				Cancela o comportamento padrão do comando (clique de botão)
			*/
			evento.preventDefault();

			/* 
				função ajax executa assincronamente o programa excluir2.php
			*/
			$.ajax({
				type: "POST",
				data: {codigo:codigo,
					   nome:nome
					},
				url: "excEnd2.php",
				success: function( resposta ) {
					/*
						Se existir a palavra "Erro" na resposta recebida, executar jaela
						modal de erro. Senão, executar janela modal de sucesso.
					*/
					if (resposta.indexOf("Erro") != -1 ) {
						$("#modalErroTitulo").html('Erro de Exclusão');
						$("#modalErro").html( resposta );
						$("#janelaModalErro").modal();
					}
					else {
						$("#modalTextoTitulo").text("Exclusão bem sucedida");
						$("#modalTexto").html( resposta );
						$("#janelaModal").modal();
						/*
							remove da tabela a linha deletada no banco de dados
						*/
						$(linhaTab).remove();
					}
				}
			});	
		})			

	})
</script>
