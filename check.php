<?php
include("dbConnector.php");
$connector = new DbConnector();

$idNewArtist = trim(strtolower($_POST['idNewArtist']));
//$idNewArtist = mysql_escape_string($idNewArtist);

//$query = "SELECT username FROM usernameCheck WHERE username = '$username' LIMIT 1";
$query = "SELECT Artist FROM Artist WHERE Artist LIKE '$idNewArtist%' LIMIT 1";
$result = $connector->query($query);
$num = mysql_num_rows($result);

echo $num;
mysql_close();
