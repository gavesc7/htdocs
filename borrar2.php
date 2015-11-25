<?php
echo '<!DOCTYPE html>
<html>
  <head>
    <title>Eliminar ficheros</title>
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/ico" href="img/favicon.ico" /> 
    <script type="text/javascript" src="jscript/utiles.js"> </script>
  </head>

  <body>';
 
     include 'seguridad.php';
     include 'conexion.php';
    //Enlaces para acceder a diferentes opciones
     include 'menu_sup.php';

// si se ha indicado algun fichero y se ha pulsado a enviar, recoge cada elemento indicado para borrar del array y por cada valor, se introduce en la variable  $borrar
echo "<table width='80%' border='0' align='center' cellspacing='0' cellpadding='0' class='fondotabla'><tr class='fondotabla' >";
if (isset($_POST['Borrar']) && isset($_POST['id_borrar'])){
	foreach ($_POST['id_borrar'] as $borrar)  {
$borrar=str_replace("./","",$borrar);
    //Obtiene tamaño de archivo y lo pasa a KB, de esta forma diferenciamos carpetas de ficheros y ejecutar el comando que elimina carpetas o ficheros en funcion de esto

  $tamano=number_format(((ftp_size($conn,$borrar))/1024),2)." Kb";
     if($tamano!="-0.00 Kb") {
       
   
		          if (ftp_delete($conn, $borrar)==true) { 
      						
                           echo "<tr class='fondotabla' ><td align='center'><font color='green'>El fichero <strong><font color='black'>".$borrar." </font></strong> se ha eliminado correctamente</font></td></tr>";
              }  
               else {      echo "<tr class='fondotabla'><td align='center's ><font color='red'>El fichero <strong><font color='black'>".$borrar." </font></strong>  no se ha eliminado correctamente</font></td></tr>";
              }

      }

                                 
                                    
      if($tamano=="-0.00 Kb") {
      

               if (ftp_rmdir($conn, $borrar)==true) { 
              
               echo "<tr class='fondotabla'><td  align='center' ><font color='green'>El directorio <strong><font color='black'>".$borrar." </font></strong> se ha eliminado correctamente</font></td></tr>";
               }  
               else {      echo "<tr class='fondotabla'><td align='center' ><font color='red'>El directorio <strong><font color='black'>".$borrar." </font></strong>  no se ha eliminado correctamente o no esta vacio</font></td></tr>";
               }
                                   
    
        }               
  }                                                       
}
else{ //Si no esta marcado ningun fichero, se renvia a la pagina principal de borrar indicandole un mensaje
        header ("Location: borrar.php?noborrar=si "); }

?>
    </table>
    <p align="center">
      <!--Enlaces a diferentes opciones--> 
      <button class="link" onclick="window.location.href='/home.php'">Volver a Inicio</button>
      <button class="link" onclick="window.location.href='/borrar.php'">Volver a Borrar</button>
    </p>
  </body>
</html>