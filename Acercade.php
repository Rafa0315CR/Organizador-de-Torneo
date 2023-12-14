
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<title>Your Company Name</title>
<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
</head>
<body>

<div id="container">
	<div id="intro">
		<div id="pageHeader">
			<h1><span>BattleFlip Torneo</span></h1>
		</div>
		<div id="preamble">
			<h3><span>Acerca De...</span></h3>
			<p class="p1"><span> <br/><br/>Código de curso: BIS10 Programacion 4<br/> <br/> Desarrollador: Rafael Gonzalez <br/><br/>Universidad: La Universidad Latina de Costa Rica<br/><br/> Profesora: Adriana Rubio</span></p>
			<a href="Index.php">ACEPTAR</a>

		</div>
		
	</div>

	<div id="supportingText">
		<div id="explanation">
	</div>

		<div id="participation">
		</div>

		<div id="benefits">
		</div>

		<div id="footer">
			Copyright © 2023 BattleFlip
		</div>

	</div>

	
	<div id="linkList">
		<div id="linkList2">
			<div id="lselect">
				<ul>
					<li><a href="index.php">Inicio</a></li>
					<li><a href="Equipos.php">Equipo</a></li>
					<li><a href="Torneos.php">Torneo</a></li>
					<li><a href="Auditoria.php">Auditoria</a></li>
					<li><a href="AgregarUsuarios.php">Registrar Usuario</a></li>
					<li><a href="Login.php">Salir</a></li>
					<li><a href="Acercade.php">Acerca De</a></li>
				</ul>
			</div>

		</div>
  </div>

</div>

</body>
</html>

	<?php
		if(!empty($_REQUEST['aceptar'])){
			echo "hola";
			header("Location: index.php");
		}
	?>