
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
					<h3>Ingresa al Torneo</h3> <br/><br/>
					</div>
			</div>

			<div id="supportingText">
				<div id="explanation">
					<form name = "Informacion" method = "POST" action = "">
				
					Digite codigo numerico:
					<input name = "codigo" type = "text" required placeholder = "Codigo" value = ""/> <br/><br/>
					
					<?php
					date_default_timezone_set('America/Costa_Rica');
					?>
				
					Fecha de Torneo:
					<input name = "fecha" type = "text" value = "<?php echo date('y-m-d');?>" readonly/> <br/><br/>
					
					Monto del torneo: $
					<input name = "monto" type = "text" value = "1000" readonly/> <br/><br/>
					
					Digite la categoría:
							<select required name = "categoria">
							<option value = "Beginner">Beginner
							<option value = "Middle">Middle
							<option value = "Expert">Expert
							</select> <br/><br/>
			
					<input name = "aceptar" value = "Ingresar" type = "submit"/>

					<input name = "cancelar" value = "Cancelar" type = "reset"/>
					</form>
					<a href="mostrarTorneo.php">Ver torneo registrado</a>
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
			date_default_timezone_set('America/Costa_Rica');
			
			if(!empty($_REQUEST['aceptar'])){
				
				$link = mysqli_connect("localhost", "root", "");

				mysqli_select_db($link, "battlefight");

				$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes
			
				$query = "INSERT INTO torneo
				VALUES ('$_REQUEST[codigo]', '$_REQUEST[fecha]', '$_REQUEST[monto]', '$_REQUEST[categoria]')";

				mysqli_query($link, $query);
				
				mysqli_close($link);
				
				echo "<script language='JavaScript'>alert('SU INSCRIPCION SE GUARDO CORRECTAMENTE');</script>"; 
			}
		?>
	</body>
</html>
