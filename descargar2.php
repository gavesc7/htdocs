<?php
include 'seguridad.php';
include 'conexion.php';

//Version Windows
$ruta='C:"'.'xampp"'.'htdocs"'.'.hidden"';
$ruta2=addslashes($ruta);
$ruta3=str_replace('"', '', $ruta2);

if (isset($_POST['id_descargar'])) {
	$id_descargar=$_POST['id_descargar'];
	$id_descargar2=str_replace('/', '', $id_descargar);
	if (ftp_get($conn, $ruta3.$id_descargar2, $id_descargar, FTP_BINARY)) {
		$fichero=$ruta3.$id_descargar2;
		if (file_exists($fichero)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="'.basename($fichero).'"');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($fichero));
			if (readfile($fichero)) {
				exec('del "'.$fichero.'" /Q /F');
			}
			else {
				exec('del "'.$fichero.'" /Q /F');
				header ('location: http://localhost/descargar.php');
			}
		}
	}
	header ('location: http://localhost/descargar.php?descarga="correcta"');
}


//version linux
/*$ruta='/var/www/html/.hidden';

if (isset($_POST['id_descargar'])) {
	$id_descargar=$_POST['id_descargar'];
	if (ftp_get($conn, $ruta.$id_descargar, $id_descargar, FTP_BINARY)) {
		$fichero=$ruta.$id_descargar;
		if (file_exists($fichero)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="'.basename($fichero).'"');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($fichero));
			if (readfile($fichero)) {
				exec('rm "'.$fichero.'"');
			}
			else {
				exec('rm "'.$fichero.'"');
				header ('location: http://localhost/descargar.php');
			}
		}
	}
	header ('location: http://localhost/descargar.php?descarga="correcta"');
}*/
?>