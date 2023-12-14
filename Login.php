<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Cuenta de Ingreso
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5">

					<div class="wrap-input100 validate-input" data-validate = "Ingresa Usuario">
						<input class="input100" type="text" name="usuario" placeholder="Usuario">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingresa contraseña">
						<input class="input100" type="password" name="clave" placeholder="Clave">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div>
						<input name= "aceptar" value="Ingresar" type="submit"/> <br/> <br/>
						<input value="Cancelar" name="cancelar" type="reset"/>
						
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	
	<?php
	  date_default_timezone_set('America/Costa_Rica');
	  
        if(isset($_REQUEST['aceptar'])) {
		$date=date('d/m/Y g:i a');
		
		$link = mysqli_connect("localhost", "root", "");
        
		mysqli_select_db($link, "battlefight");
		
		$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes
		
		$query = "SELECT * FROM `usuarios` WHERE usuario= '".$_REQUEST['usuario']."' AND clave= '".$_REQUEST['clave']."'";

		if($rs = mysqli_query($link, $query)){
           mysqli_data_seek ($rs, 0);			
		   $extraido= mysqli_fetch_array($rs);
		   setcookie("usuario",$extraido['nombre'],time()+60*60*24*365,"/");
		   
		   if ($extraido['estado'] == "Activo"){
				if($extraido['usuario']  && $extraido['clave']){
					$fp = fopen("Auditoria.txt", "a");  // Para escritura
					fputs($fp,PHP_EOL . "Ingreso al sistema " . PHP_EOL); 
					fputs($fp,"Nombre: " . $_REQUEST['usuario'] . PHP_EOL); 
					fputs($fp,"Fecha y hora de Ingreso: " . $date . PHP_EOL); 
					fclose($fp);
					mysqli_free_result($rs);  //libera el $result	
					mysqli_close($link);
					echo '<script language="javascript">';
					echo 'alert("Entrando al Sistema");';
					echo 'window.location.href=("index.php")';
					echo '</script>';
				}
		    }
				else{
				   mysqli_free_result($rs);  //libera el $result	
				   mysqli_close($link);
				   echo '<script language="javascript">';
				   echo 'alert("Usuario no encontrado o Estado Inactivo");';
				   echo 'window.location.href=("Login.php")';
				   echo '</script>';		
				} 
			}		
		}
	?>

</body>
</html>