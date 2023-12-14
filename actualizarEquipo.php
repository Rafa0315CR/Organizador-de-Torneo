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
				<h1>BATTLEFIGHT Torneo</h1>
				
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
				$link = mysqli_connect("localhost", "root", "");
				mysqli_select_db($link, "battlefight");
				$result = mysqli_query($link, "select * from equipos where equipo = '".$_GET["id"]."'");
				mysqli_data_seek ($result, 0);
				$extraido= mysqli_fetch_array($result);
		?>
		
	<div id="supportingText">
		<div id="explanation">
			<form name="login" method="POST" action="">
		
			Nombre del Equipo:
			<input readonly name="equipo" type="text" value="<?php echo $extraido['equipo']?>" required placeholder= "EQUIPO"/> <br></br>
		
			Ingrese los Jugadores <br></br>
			Jugador 1:
			<input name="j1" type="text" value="<?php echo $extraido['jugador1']?>" required placeholder= "ALIAS"/> <br></br>
			
			Jugador 2:
			<input name="j2" type="text" value="<?php echo $extraido['jugador2']?>" required placeholder= "ALIAS"/> <br></br>
			
			Jugador 3:
			<input name="j3" type="text" value="<?php echo $extraido['jugador3']?>" required placeholder= "ALIAS"/> <br></br>
			
			Jugador 4:
			<input name="j4" type="text" value="<?php echo $extraido['Jugador4']?>" required placeholder= "ALIAS"/> <br></br>
			
			Digite su puntuaje:
			<input name = "puntuaje" type = "number" required placeholder = "" value = "<?php echo $extraido['puntuaje']?>"/> <br/><br/>
			
			Catergoria del Equipo: <br/>
			<select name = "categoria">
			<option value = "BEGINNER">BEGINNER
			<option value = "MIDLLE">MIDLLE
			<option value = "EXPERT">EXPERT
			<select/> <br/><br/>
			
			<input name = "actualizar" value = "Actualizar" type = "submit"/>

			<input name = "cancelar" value = "Cancelar" type = "reset"/>
						
		</form>
		
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
  if (isset($_POST['actualizar'])){
		
	$link = mysqli_connect("localhost", "root", "");

	mysqli_select_db($link, "battlefight");

	$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes	
			
	$query = "UPDATE equipos SET equipo='$_REQUEST[equipo]', jugador1='$_REQUEST[j1]', jugador2='$_REQUEST[j2]', jugador3='$_REQUEST[j3]', Jugador4='$_REQUEST[j4]', puntuaje='$_REQUEST[puntuaje]', categoria='$_REQUEST[categoria]' WHERE equipo='$_REQUEST[equipo]';";

	if (mysqli_query($link, $query)) {
        mysqli_close($link);
	    echo '<script language="javascript">';
	    echo 'alert("El equipo se actualizo correctamente");';
	    echo 'window.location.href=("index.php")';
	    echo '</script>';
    }

   else{
       mysqli_close($link);
	   echo '<script language="javascript">';
	   echo 'alert("El equipo no se pudo actualizar correctamente");';
	   echo '</script>';		
    }
 }

?>

	</body>
</html>