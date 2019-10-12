/*
   biblioteca de usuário usada para validar os campos do formulário quando ele for enviado (evento submit)
*/

function validarDados(formulario){
/* Esta função recebe como parâmetro TODO o formulário. Ela é acionada pelo método submit
   da tag <form>
   
   A função testa os campos na ordem em que aparecem na tela. Para cada campo, em caso de 
   erro, os seguintes passos devem ser executados:
   1- Exibir mensagem de erro
   2- Colocar o cursor no campo com erro
   3- Cancelar o envio do formulário

   ATENÇÃO: Essa biblioteca só funciona associada ao plug-in jQuery MaskedInput, ao
            plug-in cpf-validate.1.0 e ao plugin .janelaPopUp incluído no arquivo popup.js

   TABELA DE CARACTERES ESPECIAIS EM UTF-8 PARA JAVASCRIPT

   á: \u00e1 à: \u00e0 â: \u00e2 ã: \u00e3 Á: \u00c1 À: \u00c0 Â: \u00c2 Ã: \u00c3
   é: \u00e9 è: \u00e8 ê: \u00ea É: \u00c9 È: \u00c8 Ê: \u00ca
   í: \u00ed ì: \u00ec Í: \u00cd Ì: \u00cc
   ó: \u00f3 ò: \u00f2 ô: \u00f4 õ: \u00f5 Ó: \u00d3 Ò: \u00d2 Ô: \u00d4 Õ: \u00d5
   ú: \u00fa ù: \u00f9 Ú: \u00da Ù: \u00d9
   ç? \u00e7 Ç: \u00c7 dois pontos (:) \u0027 &: \u0026
*/

   if ( $("#nome").val().trim().length == 0 ){

      //  mensagem de erro 
      $("#modalErroTitulo").text("Erro de Digita\u00e7\u00e3o");
      $("#modalErro").text("O campo nome n\u00e3o pode ficar em branco!");
      $("#janelaModalErro").modal();
      
      // guardar na variável global inputAtivo o id do campo
      // que está ativo (onde o cursor está)
      inputAtivo = "#nome";

      // cancela o envio do formulario
      return false;
   }

   if ( $("#endereco").val().trim().length == 0 ){
      //  mensagem de erro 
      $("#modalErroTitulo").text("Erro de Digita\u00e7\u00e3o");
      $("#modalErro").text("O campo endere\u00e7o n\u00e3o pode ficar em branco!");
      $("#janelaModalErro").modal();
      
      // guardar na variável global inputAtivo o id do campo
      // que está ativo (onde o cursor está)
      inputAtivo = "#endereco";

      // cancela o envio do formulario
      return false;
   }

   if ( $("#complemento").val().trim().length == 0 ){
      $("#modalErroTitulo").text("Erro de Digita\u00e7\u00e3o");
      $("#modalErro").text("O campo complemento n\u00e3o pode ficar em branco!");
      $("#janelaModalErro").modal();
      
      // guardar na variável global inputAtivo o id do campo que está ativo (onde o cursor está)
      inputAtivo = "#complemento";

      // cancela o envio do formulario
      return false;
   }

   if ( $("#bairro").val().trim().length == 0 ){
      $("#modalErroTitulo").text("Erro de Digita\u00e7\u00e3o");
      $("#modalErro").text("O campo bairro n\u00e3o pode ficar em branco!");
      $("#janelaModalErro").modal();
      
      // guardar na variável global inputAtivo o id do campo que está ativo (onde o cursor está)
      inputAtivo = "#bairro";

      // cancela o envio do formulario
      return false;
   }
 
   if ( $("#cidade").val().trim().length == 0 ){
      $("#modalErroTitulo").text("Erro de Digita\u00e7\u00e3o");
      $("#modalErro").text("O campo cidade n\u00e3o pode ficar em branco!");
      $("#janelaModalErro").modal();
      
      // guardar na variável global inputAtivo o id do campo que está ativo (onde o cursor está)
      inputAtivo = "#cidade";

      // cancela o envio do formulario
      return false;
   }

   if ( $("#cep").val().trim().length == 0 ){
      $("#modalErroTitulo").text("Erro de Digita\u00e7\u00e3o");
      $("#modalErro").text("O campo CEP n\u00e3o pode ficar em branco!");
      $("#janelaModalErro").modal();
      
      // guardar na variável global inputAtivo o id do campo que está ativo (onde o cursor está)
      inputAtivo = "#cep";

      // cancela o envio do formulario
      return false;
   }

   /* Se nenhum erro ocorreu, retorna verdadeiro */
   return true;
}

