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
				
					<h3>Torneos Inscritos</h3> <br/><br/>
					</div>
			</div>

			<div id="supportingText">
				<div id="explanation">

				<?php
					if (!empty($_REQUEST["id"])){
						$link = mysqli_connect("localhost", "root", "");
						mysqli_select_db($link, "battlefight");
						mysqli_query($link, "delete from usuarios where cedula = '".$_REQUEST["id"]."'");
						mysqli_close($link);
						echo '<script language="javascript">';
						echo 'alert("Los datos del usuario se eliminaron correctamente");';
						echo 'window.location.href=("mostrarUsuarios.php")';
						echo '</script>';
					}
				?>
			
				<?php
					date_default_timezone_set('America/Costa_Rica');
					
					$link = mysqli_connect("localhost", "root", "");

					mysqli_select_db($link, "battlefight");

					$tildes = $link->query("SET NAMES 'utf8'");

					$result = mysqli_query($link, "SELECT * FROM `usuarios`");
						
					if(mysqli_num_rows($result)>0){

						$tabla = '<table border=1>
						<tr>
						<th>Nombre</th>
						<th>Cedula</th>
						<th>Genero</th>
						<th>Fecha</th>
						<th>Estado</th>
						<th>Usuario</th>
						<th>Actualizar</th>
						<th>Eliminar</th>
						</tr>';

						for ($i=0; $i<$result->num_rows; $i++){
							
							mysqli_data_seek ($result, $i);
				
							$extraido= mysqli_fetch_array($result);

							$tabla .= '<tr>
							<td>'.$extraido["nombre"].'</td>
							<td>'.$extraido["cedula"].'</td>
							<td>'.$extraido["genero"].'</td>
							<td>'.$extraido["fecha"].'</td>
							<td>'.$extraido["estado"].'</td>
							<td>'.$extraido["usuario"].'</td>
							<td>'.'<A href="actualizarUsuarios.php?id='.$extraido['cedula'].'">Actualizar</A>'.'</td>
							<td>'.'<A href="mostrarUsuarios.php?id='.$extraido['cedula'].'">Eliminar</A>'.'</td>
							</tr>';
						}
					
						echo $tabla;
					}

					mysqli_free_result($result);

					mysqli_close($link);
				?>
		
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
		  
		  		<div id="footer">

		</div>
		
		</div>
		
	</body>
</html>