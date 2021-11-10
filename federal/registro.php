<?php
$db_host="35.168.217.214";
$db_user="root";
$db_password="e5TBlg5FBOTbfWEP";
$db_name="Registro";
$db_table_name="jugador";
   $db_connection = mysql_connect($db_host, $db_user, $db_password);

if (!$db_connection) {
	die('No se ha podido conectar a la base de datos');
}
$subs_name = utf8_decode($_POST['nombre']);
$subs_last = utf8_decode($_POST['apellido']);
$subs_email = utf8_decode($_POST['email']);

$subs_matricula = utf8_decode($_POST['matricula']);
$subs_hcp = utf8_decode($_POST['handicap']);
$subs_nac = utf8_decode($_POST['nacimiento']);
$subs_club = utf8_decode($_POST['club']);

$subs_sexo = utf8_decode($_POST['caballero']);
$subs_transporte = utf8_decode($_POST['transporte']);
$subs_alojamiento = utf8_decode($_POST['alojamiento']);
$subs_menor = utf8_decode($_POST['menor']);



$resultado=mysql_query("SELECT * FROM ".$db_table_name." WHERE Email = '".$subs_email."'", $db_connection);

if (mysql_num_rows($resultado)>0)
{

header('Location: Fail.html');

} else {
	
	$insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`Nombre` , `Apellido` , `Email` , `Matricula` , `Handicap` , `Nacimiento` , `Club`, `Sexo`, `Transporte`, `Alojamiento`, `Menor`) VALUES ("' . $subs_name . '", "' . $subs_last . '", "' . $subs_email . '", "' . $subs_matricula . '", "' . $subs_hcp . '", "' . $subs_nac . '", "' . $subs_club . '", "' . $subs_sexo . '", "' . $subs_transporte. '", "' . $subs_alojamiento. '", "' . $subs_menor. '")';

mysql_select_db($db_name, $db_connection);
$retry_value = mysql_query($insert_value, $db_connection);

if (!$retry_value) {
   die('Error: ' . mysql_error());
}
	
header('Location: Success.html');

}

mysql_close($db_connection);

		
?>