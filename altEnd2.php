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
				<div class="col-sm-offset-1 col-sm-10">

			   		<?php
			   			/* recebe o valor do campo codigo pelo método GET e coloca na variável $codigo */
			   			$codigo = $_GET['codigo'];

						/*
			   				inclui os comandos PHP necessários para criar a conexão com o banco de dados agenda
						*/

						include "include/conexao.php";

						/*
							Consulta o registro de Agenda com chave primária contida na	variável $codigo, e
							coloca os dados em variáveis PHP
						*/
						include "include/ConsRegAgenda.php";
					?>

					<h2 class="centraliza">Alteração de Endereço</h2>	
					<form class="form-horizontal" id="formAjax">
						<div class="form-group">
						    <label class="control-label col-sm-2" for="nome">Nome: </label>
						    <div class="col-sm-10">
						    	<input class="form-control" id="nome" name="nome" type="text" maxlength="80">
						    </div>
						</div>
						  
						<div class="form-group">
							<label class="control-label col-sm-2" for="endereco">Endereço: </label>
							<div class="col-sm-10">
						    	<input class="form-control" id="endereco" name="endereco" type="text" maxlength="80">
							</div>
						</div>

						<div class="form-group">
						    <label class="control-label col-sm-2" for="complemento">Complemento: </label>
						   	<div class="col-sm-10">
						    	<input class="form-control" id="complemento" name="complemento" type="text" maxlegth="60">
						    </div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="bairro">Bairro: </label>
							<div class="col-sm-10">
						    	<input class="form-control" id="bairro" name="bairro" type="text" maxlength="40">
						    </div>
						</div>
								
						<div class="form-group">
						    <label class="control-label col-sm-2" for="cidade">Cidade: </label>
						    <div class="col-sm-10">
						    	<input class="form-control" id="cidade" name="cidade" type="text" maxlength="14">
						   	</div>
						</div>

						<div class="form-group">
						    <label class="control-label col-sm-2" for="cep">CEP: </label>
						    <div class="col-sm-10">
						    	<input class="form-control" id="cep" name="cep" type="text" maxlength="10">
						    </div>
						</div>
						<!-- 
							Esse input não será visível no formulário (type="hidden"). Serve para enviar
							ao programa alterar3.php a chave primária do registro que está sendo alterado
						-->
						<input type="hidden" name="codigo" id="codigo"></input>

						<div class="form-group">        
						    <div class="centraliza">
						      <button type="submit" class="btn btn-primary">Alterar</button>
						      <button id="btnVoltar" class="btn btn-primary">Voltar</button>
						    </div>
						</div>			
					</form>

					<?php
					
					/* coloca os valores lidos do banco de dados nos campos do formulário */
						echo "<script type='text/javascript'>

								$('#nome').val('" . $nome . "');
								$('#endereco').val('" . $endereco . "');
								$('#complemento').val('" . $complemento . "');
								$('#bairro').val('" . $bairro . "');
								$('#cidade').val('" . $cidade . "');
								$('#cep').val('" . $cep . "');
								$('#codigo').val('" . $codigo ."');

							  </script>";
					?>
				</div> <!-- Fim da div "col-sm-offset-1 col-sm-10 -->
			</div> <!-- Fim da div class="row" -->

			<br />
			<?php
				/*
					Inclui barra de navegação inferior com texto de cppyright
				*/
		   		include "include/rodape.php";
		   	?>

		</div> <!-- Fim da div class="container" -->

		<?php
			/*
				Inclui as duas janelas modais usadas nesse programa: uma para erro e a outra para 
				sucesso.
			*/
			include "include/modalErro.php";
			include "include/modalSucesso.php";
		?>
	</body>
</html>

<!-- Referência JS -->

<script src="css/bootstrap/js/jquery-2.2.4.min.js"></script>
<script src="css/bootstrap/js/bootstrap.min.js"></script>
<script src="js/jquery.maskedinput.min.js" type="text/javascript"></script>
<script src="js/form.js" type="text/javascript"></script>

<script type="text/javascript">
	/* 
		variável global usada para guardar o campo de formulário com foco.  
	*/
	var inputAtivo = null;

	$(document).ready(function(){

		/* Coloca o cursor no input com id="nome" */
		$("#nome").focus();

		$("#cep").mask("99.999-999")
	
		$("#btnVoltar").click(function(){
			/*
				Volta para o primeiro programa de alteração
			*/
			location.href = "altEnd1.php";
		})

		/*
			Quando a janela modal com id="janelaModalErro" for fechada, o evento hidden.bs.modal é
			disparado, e o cursor vai para o campo onde o erro ocorreu. O nome desse campo é colocado
			na variável global javascript inputAtivo na função valdarDados().
		*/
		$("#janelaModalErro").on('hidden.bs.modal', function () {
			$(inputAtivo).focus();
		})

		/*
			Quando a janela modal com id="janelaModal" for fechada, o evento hidden.bs.modal é
			disparado, e essa função é executada.
		*/
		$("#janelaModal").on('hidden.bs.modal', function () {
			// coloca o cursor no input com id="nome"
			$("#nome").focus();
		})

		/*
			Exibe os dados enviados em uma Div
		*/
		$('#formAjax').submit(function(evento){
			evento.preventDefault();
			/*
				Se não ocorreram erros de validação, envia dados do formulário para o programa incluir2.php
			*/
			if (validarDados(this)) {
				/* 
					método .serialize() cria a string com os dados do formulário, 
					e passamos essa variavel para a função ajax.
				*/
				var dados = jQuery( this ).serialize();
				$.ajax({
					type: "POST",
					url: "altEnd3.php",
					data: dados,
					success: function( resposta ) {
						/*
							Se existir a palavra "Erro" na resposta recebida, colocar
							"Erro de Cadastramento" no título da janela de erro. Se não existir,
							colocar "Alteração bem sucedida" no título da janela de sucesso.
						*/
						if (resposta.indexOf("Erro") != -1 ) {
							$("#modalErroTitulo").html('Erro de Cadastramento');
							$("#modalErro").html( resposta );
							$("#janelaModalErro").modal();
						}
						else {
							$("#modalTextoTitulo").text("Alteração bem sucedida");
							$("#modalTexto").html( resposta );
							$("#janelaModal").modal();
						}
					}
				});			
			}		
		});
	});
</script>