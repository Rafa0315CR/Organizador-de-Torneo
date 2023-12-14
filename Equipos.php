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
			<h1>BATTLEFIGHT Equipo</h1>
		</div>
		<div id="preamble">
			<h3><span>Formación de Guerrilla</span></h3> <br></br>
			
		</div>
	</div>

	<div id="supportingText">
		<div id="explanation">
			<form name="login" method="POST" action="">
		
			Nombre del Equipo:
			<input name="equipo" type="text" value="" required placeholder= "EQUIPO"/> <br></br>
		
			Ingrese los Jugadores <br></br>
			Jugador 1:
			<input name="j1" type="text" value="" required placeholder= "ALIAS"/> <br></br>
			
			Jugador 2:
			<input name="j2" type="text" value="" required placeholder= "ALIAS"/> <br></br>
			
			Jugador 3:
			<input name="j3" type="text" value="" required placeholder= "ALIAS"/> <br></br>
			
			Jugador 4:
			<input name="j4" type="text" value="" required placeholder= "ALIAS"/> <br></br>
			
			Digite su puntuaje:
			<input name = "puntuaje" type = "number" required placeholder = "" value = ""/> <br/><br/>
			
			Catergoria del Equipo: <br/>
			<select name = "categoria">
			<option value = "BEGINNER">BEGINNER
			<option value = "MIDLLE">MIDLLE
			<option value = "EXPERT">EXPERT
			<select/> <br/><br/>
			
			<input name = "aceptar" value = "Ingresar" type = "submit"/>

			<input name = "cancelar" value = "Cancelar" type = "reset"/>
						
		</form>
		   <a href="mostrarEquipo.php">Ver equipos registrados</a>
		</div>

		<div id="footer">
			Copyright © 20023
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

		<?php
			date_default_timezone_set('America/Costa_Rica');
			
			if(!empty($_REQUEST['aceptar'])){
				
				$link = mysqli_connect("localhost", "root", "");

				mysqli_select_db($link, "BattleFight");

				$tildes = $link->query("SET NAMES 'utf8'"); 
			
				$query = "INSERT INTO equipos 
				VALUES ('$_REQUEST[equipo]', '$_REQUEST[j1]', '$_REQUEST[j2]', '$_REQUEST[j3]', '$_REQUEST[j4]', '$_REQUEST[puntuaje]', '$_REQUEST[categoria]')";

				if (mysqli_query($link, $query)) {
					echo '<script language="javascript">';
					echo 'alert("Se agrego correctamente");';
					echo '</script>';
				}
				else{
					echo '<script language="javascript">';
					echo 'alert("No se pudo agregar correctamente");';
					echo '</script>';		
				}
				
			//Generando codigo de equipo

			$letra = substr($_REQUEST['equipo'],0,1);
		
			date_default_timezone_set('America/Costa_Rica');
		
			$codigo = $letra . 4 . rand(1,100) .  $fecha=date("y");
			
			echo " Este es el codigo para el torneo: $codigo";
				
			mysqli_close($link);
		}
		
	?>

	

</body>
</html>
