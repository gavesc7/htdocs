<?php
include 'seguridad.php';
include 'conexion.php';

if (isset($_POST['id_descargar'])) {
	$id_descargar=$_POST['id_descargar'];
	ob_start();
	$fichero=ftp_get($conn, 'php://output', $id_descargar, FTP_BINARY)
	ftp_close($conn);
	if ($datos=ob_get_contents()) {
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename($id_descargar).'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($datos));
		readfile($datos);
		ob_clean();
		header ('location: ./descargar.php?descarga="correcta"');
	}
	else {
		exec('rm "'.$fichero.'"');
		header ('location: ./descargar.php');
	}
}
?>