<?php
error_reporting(0);
set_time_limit(0);
echo '<!DOCTYPE html>
<html>
	<head>
		<title align="center">FTP-WEB</title>
		<link rel="icon" type="image/ico" href="img/favicon.ico" />
		<link href="css/estilo_index.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!--Formulario de acceso al servidor FTP-->
		
		
			
			<div id="form">
			<h1 align="center"> FTP-WEB</h1>';
			if ( isset($_GET["errorconexion"])){// Si la dirección FTP es errónea o no hay acceso al servidor, aparece este mensaje
			  		if ($_GET["errorconexion"]=="si") echo "<h2 align='center'><font color='red'>No se ha podido realizar la conexi&oacute,n a dicha direcci&oacute;n</font></h2>";}
					//Si el usuario o contraseña de dicho servidor son erróneas, aparece este mensaje 
					if ( isset($_GET["errorusuario"])){
		 			if ($_GET["errorusuario"]=="si") echo "<h2 align='center' ><font color='red'>Introduzca usuario o contrase&ntilde;a correcta</font></h2>";}
					echo '
			
			<form action="acceso.php" method="POST" >
					<p align="center" class="indique"> <b> ACCESO AL CLIENTE FTP</b></p><br/>
					
					<p align="left" class="color">			
						 Nombre/direcci&oacute;n del servidor FTP:
						<input type="text" class="barra" name="servidor" size="15" maxlength="50" required title="Introduzca el nombre o direcci&oacute;n del servidor">
					</p>				
					<p align="left" class="color">
						Puerto:			
						<input type="number" class="barra" name="puerto" size="15" maxlength="50" required title="Introduzca el número de puerto de conexi&oacute;n al servidor FTP" Value="21">
					</p>
					<p align="left" class="color"> 
						Usuario:
						<input type="Text" class="barra" name="usuario" size="15" maxlength="50" required title="Introduzca un nombre de usuario">
					</p>
					<p align="left" class="color">Contrase&ntilde;a:
						<input type="password" class="barra" name="contrasena" size="15" maxlength="50">
					</p>
					<p align="center" class="color">
						Conexion SSL
					</p>
					<p align="center" class="color">
						<input align="center" type="checkbox" name="SSL" value="1"/>
					</p>
					<p align="center" class="color">		
						<input type="Submit" value="" class="botonlogin">
					</p>

		</form>
		</div>
	</body>
</html>';
?>