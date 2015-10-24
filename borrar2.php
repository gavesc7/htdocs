

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Eliminar ficheros</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/estilo.css"
      rel="stylesheet" type="text/css">
      <link rel="icon" type="image/ico" href="img/favicon.ico" />
</head>

<body bgcolor="#EFE4B0">
<?php include 'seguridad.php';
include 'conexion.php'; ?>
<!--Logotipo-->
  <p align="center"><a href="home.php"> <img src="img/logo.png" title="Volver a Inicio" width="400" height="100" alt="Volver a Inicio"> </a></p>
  <!--Usuario actual y cierre de sesion-->
<?php echo' 
    <table width="15%" border="1" align="right" cellspacing="0" cellpadding="0">
      <tr>
        <td><div align="center">
          USUARIO ACTUAL: <b>'.$_SESSION["usuario"].'</b></br></br>
          <a href="cerrar.php" class="button"/>Cerrar Sesion</a></br>
        </td>
      </tr>
    </table>';?>
  </br></br>  </br></br>  </br></br>
<!--Enlaces para acceder a diferentes opciones-->

  <table width="30%" border="0" align="center" cellspacing="0" cellpadding="0">
    <tr>
      <td><div align="center">
           <a href="subida.php" class="button"/>Subir Fichero</a></div>
      </td>
      <td><div align="center">
          <a href="borrar.php" class="button"/><span class="add">Borrar</span></a></div>
      </td>
      <td><div align="center">
         <a href="renombrar.php" class="button"/>Renombrar </a></div>
      </td>
      <td><div align="center">
          <a href="crear.php" class="button"/>Crear Directorio</a></div>
      </td>
      <td><div align="center">
        <a href="descargar.php" class="button"/>Descargar</a></div>
      </td>
    </tr>
  </table>
  <hr />
<?php
// si se ha indicado algun fichero y se ha pulsado a enviar, recoge cada elemento indicado para borrar del array y por cada valor, se introduce en la variable  $borrar

if (isset($_POST['Borrar']) && isset($_POST['id_borrar'])){
	foreach ($_POST['id_borrar'] as $borrar)  {

    
  $tamano=number_format(((ftp_size($conn,$borrar))/1024),2)." Kb";#Obtiene tamaño de archivo y lo pasa a KB, de esta forma diferenciamos carpetas de ficheros y ejecutar el comando que elimina carpetas o ficheros en funcion de esto
      if($tamano!="-0.00 Kb") {
       
   
		          if (ftp_delete($conn, $borrar)==true) { 
      
                           echo "<h2 align='center'><font color='green'>El fichero <strong><font color='black'>".$borrar." </font></strong> se ha eliminado correctamente</font></h2>";}  
               else {      echo "<h2 align='center'><font color='red'>El fichero <strong><font color='black'>".$borrar." </font></strong>  no se ha eliminado correctamente</font></h2>";}

                              }

                                 
                                    
      if($tamano=="-0.00 Kb") {
      

               if (ftp_rmdir($conn, $borrar)==true) { 
               echo "<h2 align='center'><font color='green'>El directorio <strong><font color='black'>".$borrar." </font></strong> se ha eliminado correctamente</font></h2>";}  
               else {      echo "<h2 align='center'><font color='red'>El directorio <strong><font color='black'>".$borrar." </font></strong>  no se ha eliminado correctamente o no esta vacio</font></h2>";}
                                   
    
                               }               
        }                                                       
}else{ #si no esta marcado ningun fichero, se renvia a la pagina principal de borrar indicandole un mensaje
        header ("Location: borrar.php?noborrar=si "); }
       

        

            
?> 

</body>
</html>