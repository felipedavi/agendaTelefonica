<?php
  echo '<!-- barra de navegação superior com cantos retos e sem margens -->
<nav class="navbar navbar-default navbar-static-top sem-margem">  
    <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Início</a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navBar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="navBar">
        <ul class="nav navbar-nav">
            <li class="dropdown">
              	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
              		Cadastramento de Endereços<span class="caret"></span>
              	</a>
              	<ul class="dropdown-menu">
              	  <li><a href="incEnd1.php">Inclusão de Endereços</a></li>
                  <li><a href="altEnd1.php">Alteração de Endereços</a></li>
              	  <li><a href="excEnd1.php">Exclusão de Endereços</a></li>
              	</ul>
            </li>
            <li><a href="cadFone1.php">Cadastramento de Telefones</a></li>
            <li><a href="cadTipoFone.php">Cadastramento de Tipos de Telefones</a></li>
            <li class="dropdown">
              	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
              		Consultas<span class="caret"></span>
              	</a>
              	<ul class="dropdown-menu">
                  <li><a href="conEnd1.php">Consulta de Endereços</a></li>
                  <li><a href="conFone1.php">Consulta de Telefones</a></li>
                  <li><a href="conTipoFone.php">Consulta Tipos de Telefones</a></li>
              	</ul>
            </li>
        </ul>  
    </div>
</nav>';
?>