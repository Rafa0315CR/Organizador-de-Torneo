<?php
	session_start();
?>
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
			<h1>BattleFlip Torneo</h1>
		</div>
		<div id="preamble">
			<h3><span>Registrar Usuario</span></h3> <br></br>
			
		</div>
	</div>

	<div id="supportingText">
		<div id="explanation">
				<form name = "IngresoUsuarios" method = "POST" action = "">
			
				Digite su nombre:
				<input name = "nombre" type = "text" required placeholder = "Nombre" value = ""/> <br/><br/>
			
				Digite su cedula:
				<input name = "cedula" type = "number" required placeholder = "Cedula" value = ""/> <br/><br/>
			
				Digite su genero: <br/>
				<input name = "genero" type="radio" required value = "Hombre"/> Hombre <br/>
				<input name = "genero" type="radio" required value = "Mujer"/> Mujer <br/><br/>
				
				Digite su Estado: <br/>
				<input name = "estado" type="radio" required value = "Activo"/> ACTIVO <br/>
				<input name = "estado" type="radio" required value = "Inactivo"/> INACTIVO <br/><br/>
				
				Fecha de Ingreso: 
				<input name = "fecha" type = "date" required value = ""/> <br/><br/>
				
				Digite su Usuario:
				<input name = "usuario" type = "text" required placeholder = "Nombre" value = ""/> <br/><br/>
				
				Digite su Contraseña:
				<input name = "contraseña" type = "text" required placeholder = "Nombre" value = ""/> <br/><br/>
				
				Dígitos verificadores:<img src="LibGD2.php">
				<br>
				Ingrese valor:
				<input type="text" name="numero">
				<br>
				
				<input name = "aceptar" value = "Ingresar" type = "submit"/>

				<input name = "cancelar" value = "Cancelar" type = "reset"/>
			</form>
				<a href="mostrarUsuarios.php">Ver usuarios registrados</a>
		</div>

		<div id="footer">
			Copyright © 2023
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
			
			if(!empty($_REQUEST['aceptar']) && $_SESSION['numeroaleatorio']==$_REQUEST['numero']){
				
				$link = mysqli_connect("localhost","root","");

				mysqli_select_db($link, "battlefight");

				$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes
			
				$query = "INSERT INTO usuarios VALUES ('$_REQUEST[cedula]', '$_REQUEST[nombre]', '$_REQUEST[genero]', '$_REQUEST[estado]', '$_REQUEST[fecha]', '$_REQUEST[usuario]', '$_REQUEST[contraseña]')";

				if (mysqli_query($link, $query)) {
				mysqli_close($link);
				echo '<script language="javascript">';
				echo 'alert("El usuario se agrego correctamente");';
				echo '</script>';
				}
				else{
				echo '<script language="javascript">';
				echo 'alert("El usuario no se pudo agregar correctamente");';
				echo '</script>';		
				}
				
			}
			
		?>		
	

</body>
</html>
