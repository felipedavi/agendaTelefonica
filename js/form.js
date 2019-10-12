/*
   biblioteca de usu�rio usada para validar os campos do formul�rio quando ele for enviado (evento submit)
*/

function validarDados(formulario){
/* Esta fun��o recebe como par�metro TODO o formul�rio. Ela � acionada pelo m�todo submit
   da tag <form>
   
   A fun��o testa os campos na ordem em que aparecem na tela. Para cada campo, em caso de 
   erro, os seguintes passos devem ser executados:
   1- Exibir mensagem de erro
   2- Colocar o cursor no campo com erro
   3- Cancelar o envio do formul�rio

   ATEN��O: Essa biblioteca s� funciona associada ao plug-in jQuery MaskedInput, ao
            plug-in cpf-validate.1.0 e ao plugin .janelaPopUp inclu�do no arquivo popup.js

   TABELA DE CARACTERES ESPECIAIS EM UTF-8 PARA JAVASCRIPT

   �: \u00e1 �: \u00e0 �: \u00e2 �: \u00e3 �: \u00c1 �: \u00c0 �: \u00c2 �: \u00c3
   �: \u00e9 �: \u00e8 �: \u00ea �: \u00c9 �: \u00c8 �: \u00ca
   �: \u00ed �: \u00ec �: \u00cd �: \u00cc
   �: \u00f3 �: \u00f2 �: \u00f4 �: \u00f5 �: \u00d3 �: \u00d2 �: \u00d4 �: \u00d5
   �: \u00fa �: \u00f9 �: \u00da �: \u00d9
   �? \u00e7 �: \u00c7 dois pontos (:) \u0027 &: \u0026
*/

   if ( $("#nome").val().trim().length == 0 ){

      //  mensagem de erro 
      $("#modalErroTitulo").text("Erro de Digita\u00e7\u00e3o");
      $("#modalErro").text("O campo nome n\u00e3o pode ficar em branco!");
      $("#janelaModalErro").modal();
      
      // guardar na vari�vel global inputAtivo o id do campo
      // que est� ativo (onde o cursor est�)
      inputAtivo = "#nome";

      // cancela o envio do formulario
      return false;
   }

   if ( $("#endereco").val().trim().length == 0 ){
      //  mensagem de erro 
      $("#modalErroTitulo").text("Erro de Digita\u00e7\u00e3o");
      $("#modalErro").text("O campo endere\u00e7o n\u00e3o pode ficar em branco!");
      $("#janelaModalErro").modal();
      
      // guardar na vari�vel global inputAtivo o id do campo
      // que est� ativo (onde o cursor est�)
      inputAtivo = "#endereco";

      // cancela o envio do formulario
      return false;
   }

   if ( $("#complemento").val().trim().length == 0 ){
      $("#modalErroTitulo").text("Erro de Digita\u00e7\u00e3o");
      $("#modalErro").text("O campo complemento n\u00e3o pode ficar em branco!");
      $("#janelaModalErro").modal();
      
      // guardar na vari�vel global inputAtivo o id do campo que est� ativo (onde o cursor est�)
      inputAtivo = "#complemento";

      // cancela o envio do formulario
      return false;
   }

   if ( $("#bairro").val().trim().length == 0 ){
      $("#modalErroTitulo").text("Erro de Digita\u00e7\u00e3o");
      $("#modalErro").text("O campo bairro n\u00e3o pode ficar em branco!");
      $("#janelaModalErro").modal();
      
      // guardar na vari�vel global inputAtivo o id do campo que est� ativo (onde o cursor est�)
      inputAtivo = "#bairro";

      // cancela o envio do formulario
      return false;
   }
 
   if ( $("#cidade").val().trim().length == 0 ){
      $("#modalErroTitulo").text("Erro de Digita\u00e7\u00e3o");
      $("#modalErro").text("O campo cidade n\u00e3o pode ficar em branco!");
      $("#janelaModalErro").modal();
      
      // guardar na vari�vel global inputAtivo o id do campo que est� ativo (onde o cursor est�)
      inputAtivo = "#cidade";

      // cancela o envio do formulario
      return false;
   }

   if ( $("#cep").val().trim().length == 0 ){
      $("#modalErroTitulo").text("Erro de Digita\u00e7\u00e3o");
      $("#modalErro").text("O campo CEP n\u00e3o pode ficar em branco!");
      $("#janelaModalErro").modal();
      
      // guardar na vari�vel global inputAtivo o id do campo que est� ativo (onde o cursor est�)
      inputAtivo = "#cep";

      // cancela o envio do formulario
      return false;
   }

   /* Se nenhum erro ocorreu, retorna verdadeiro */
   return true;
}

