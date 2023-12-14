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
						<?php 
				
					if (isset($_COOKIE['usuario'])) {
				
						echo "<h2>" . "Nombre del Usuario: " . $_COOKIE['usuario'] . "</h2>";
					}
				?>
			<h3><span>Formación de Guerrilla</span></h3> <br></br>
			
		</div>
	</div>
	
		<?php
			date_default_timezone_set('America/Costa_Rica');
			$fecha=date("d/m/Y");
				$link = mysqli_connect("localhost", "root", "");
				mysqli_select_db($link, "battlefight");
				$result = mysqli_query($link, "select * from usuarios where cedula = '".$_GET["id"]."'");
				mysqli_data_seek ($result, 0);
				$extraido= mysqli_fetch_array($result);
		?>
		
	<div id="supportingText">
		<div id="explanation">
				<form name = "IngresoUsuarios" method = "POST" action = "">
				
				Digite su nombre:
				<input name = "nombre" type = "text" required placeholder = "Nombre" value = "<?php echo $extraido['nombre']?>"/> <br/><br/>
			
				Digite su cedula:
				<input name = "cedula" type = "number" required placeholder = "Cedula" value = "<?php echo $extraido['cedula']?>"/> <br/><br/>
			
			<tr>
				<td>Genero:</td>
				<?php 
					if(($extraido['genero']) == 'Hombre'){
						echo "<td> <input type='radio' name='genero' value='Hombre' checked>Hombre";
						echo"<input type='radio' name='genero' value='Mujer'>Mujer</td>";
					}else{
						echo "<td> <input type='radio' name='genero' value='Hombre'>Hombre";
						echo"<input type='radio' name='genero' value='Mujer' checked>Mujer</td>";
					}
				?>
			</tr>
				<br/><br/>
			<tr>
				<td>Estado:</td>
				<?php 
					if(($extraido['estado']) == 'Activo'){
						echo "<td> <input type='radio' name='estado' value='Activo' checked>Activo";
						echo"<input type='radio' name='estado' value='inactivo'>Inactivo</td>";
					}else{
						echo "<td> <input type='radio' name='estado' value='activo'>Activo";
						echo"<input type='radio' name='estado' value='inactivo' checked>Inactivo</td>";
					}
				?>
			</tr>
				<br/><br/>
				Fecha de Ingreso: 
				<input name = "fecha" type = "date" required value = "<?php echo $extraido['fecha']?>"/> <br/><br/>
				
				Digite su Usuario:
				<input name = "usuario" type = "text" required placeholder = "Nombre" value = "<?php echo $extraido['usuario']?>"/> <br/><br/>
				
				Digite su Contraseña:
				<input name = "contraseña" type = "text" required placeholder = "Nombre" value = "<?php echo $extraido['clave']?>"/> <br/><br/>
				
				Dígitos verificadores:<img src="LibGD2.php">
				<br>
				Ingrese valor:
				<input type="text" name="numero">
				<br>
				
				<input name = "aceptar" value = "Ingresar" type = "submit"/>

				<input name = "cancelar" value = "Cancelar" type = "reset"/>
			</form>
		</div>

		<div id="footer">
			Copyright © 2006 Your Company Name
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

	if(!empty($_REQUEST['aceptar']) && $_SESSION['numeroaleatorio']==$_REQUEST['numero']){
			  
		
				$link = mysqli_connect("localhost", "root", "");

				mysqli_select_db($link, "battlefight");

				$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes	
					
				$query = "UPDATE usuarios SET genero='$_REQUEST[genero]', fecha='$_REQUEST[fecha]', estado='$_REQUEST[estado]', usuario='$_REQUEST[usuario]', clave='$_REQUEST[contrasena]' WHERE cedula='$_REQUEST[id]';";

				if (mysqli_query($link, $query)) {
					mysqli_close($link);
					echo '<script language="javascript">';
					echo 'alert("El usuario se actualizo correctamente");';
					echo 'window.location.href=("mostrarUsuarios.php")';
					echo '</script>';
				}

			   else{
				   mysqli_close($link);
				   echo '<script language="javascript">';
				   echo 'alert("El usuario no se pudo actualizar correctamente");';
				   echo '</script>';		
				}	
	}
?>

	</body>
</html>