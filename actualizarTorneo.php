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
			if (isset($_COOKIE['usuario'])) 
			    echo "<h2>" . "Nombre del Usuario: " . $_COOKIE['usuario'] . "</h2>";
			?>
			<h3><span>Formación de Guerrilla</span></h3> <br></br>
		
		</div>
		
	</div>
	
		<?php
				$link = mysqli_connect("localhost", "root", "");
				mysqli_select_db($link, "battlefight");
				$result = mysqli_query($link, "select * from torneo where codigo = '".$_GET["id"]."'");
				mysqli_data_seek ($result, 0);
				$extraido= mysqli_fetch_array($result);
		?>
		
	<div id="supportingText">
		<div id="explanation">
					<form name = "Informacion" method = "POST" action = >
				
					Digite codigo numerico:
					<input readonly name = "nombre" type = "text" required placeholder = "Codigo" value = "<?php echo $extraido['codigo']?>"/> <br/><br/>
					
					<?php
					date_default_timezone_set('America/Costa_Rica');
					?>
				
					Fecha de Torneo:
					<input name = "fecha" type = "text" value = "<?php echo $extraido['fecha']?>"/> <br/><br/>
					
					Monto del torneo:
					<input name = "monto" type = "text" value = "<?php echo $extraido['monto']?>" readonly /> <br/><br/>
					
					<tr>		
						<td>Categoria: </td>
						<?php 
							if(($extraido['categoria']) == 'Begginner'){
								echo "<td> <input type='radio' name='categoria' value='Beginner' checked>Novato";
								echo"<input type='radio' name='categoria' value='Middle'>Intermedio";
								echo"<input type='radio' name='categoria' value='Expert'>Avanzado</td>";
							}elseif (($extraido['categoria']) == 'Beginner'){
								echo "<td><input type='radio' name='categoria' value='Beginner'>Novato";
								echo"<input type='radio' name='categoria' value='Middle' checked>Intermedio";
								echo"<input type='radio' name='categoria' value='Expert'>Avanzado</td>";
							}else{
								echo "<td> <input type='radio' name='categoria' value='Beginner'>Novato";
								echo"<input type='radio' name='categoria' value='Middle'>Intermedio";
								echo"<input type='radio' name='categoria' value='Expert' checked>Avanzado</td>";
							}
						?>
					</tr>
					 <br/><br/>
			
					<input name = "aceptar" value = "Actualizar" type = "submit"/>

					<input name = "cancelar" value = "Cancelar" type = "reset"/>
					</form>
		</div>

		<div id="footer">
			Copyright © 2006 Your Company Name
		</div>
	</div>
	<?php
		mysqli_close($link);
	?>
	
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
  if (isset($_POST['aceptar'])){
		
	$link = mysqli_connect("localhost", "root", "");

	mysqli_select_db($link, "battlefight");

	$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes	
			
	$query = "UPDATE torneo SET fecha='$_REQUEST[fecha]',monto='$_REQUEST[monto]',categoria='$_REQUEST[categoria]' WHERE codigo='$_REQUEST[id]';";

	if (mysqli_query($link, $query)) {
        mysqli_close($link);
	    echo '<script language="javascript">';
	    echo 'alert("El torneo se actualizo correctamente");';
	    echo 'window.location.href=("index.php")';
	    echo '</script>';
    }

   else{
       mysqli_close($link);
	   echo '<script language="javascript">';
	   echo 'alert("El torneo no se pudo actualizar correctamente");';
	   echo '</script>';		
    }
 }

?>

	</body>
	
</html>