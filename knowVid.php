<?php 
mysql_connect("fdb6.awardspace.net", "1954059_cirku", "chrisgalea1") or die (mysql_error ());
    mysql_select_db("1954059_cirku") or die(mysql_error());


$addressId = $_GET["id"];
// $addressId=$_REQUEST["id"];

if(isset($_POST['btnChris'])){
	$sqlChris = sprintf("INSERT INTO `PersonSong`(`Person_Id`, `Song_Id`) VALUES (1,%s)",mysql_real_escape_string($addressId));
	$sqlChrisQ = mysql_query($sqlChris);
	if($sqlChrisQ){
	}else {
	}

}

if(isset($_POST['btnBen'])){
	$sqlChris = sprintf("INSERT INTO `PersonSong`(`Person_Id`, `Song_Id`) VALUES (4,%s)",mysql_real_escape_string($addressId));
	$sqlChrisQ = mysql_query($sqlChris);
	if($sqlChrisQ){
	}else {
	}
}

if(isset($_POST['btnMyriah'])){
	$sqlChris = sprintf("INSERT INTO `PersonSong`(`Person_Id`, `Song_Id`) VALUES (2,%s)",mysql_real_escape_string($addressId));
	$sqlChrisQ = mysql_query($sqlChris);
	if($sqlChrisQ){
	}else {
	}
}

if(isset($_POST['btnRoxanne'])){
	$sqlChris = sprintf("INSERT INTO `PersonSong`(`Person_Id`, `Song_Id`) VALUES (3,%s)",mysql_real_escape_string($addressId));
	$sqlChrisQ = mysql_query($sqlChris);
	if($sqlChrisQ){
	}else {
	}
}

if(isset($_POST['btnGilbert'])){
	$sqlChris = sprintf("INSERT INTO `PersonSong`(`Person_Id`, `Song_Id`) VALUES (5,%s)",mysql_real_escape_string($addressId));
	$sqlChrisQ = mysql_query($sqlChris);
	if($sqlChrisQ){
	}else {
	}
}

$sqlPersonSong = mysql_query("SELECT Person.Name AS PersonName, PersonSong.Person_Id AS PersonID, PersonSong.Song_Id AS SongID, Person.Facebook_Id AS FacebookID FROM PersonSong INNER JOIN Person ON PersonSong.Person_Id=Person.Person_Id WHERE PersonSong.Song_Id ='".$addressId."'"); 


$numRows = 1;
while($rowLanguageName = mysql_fetch_array($sqlPersonSong)) {
	echo"
<a class='navbar-brand ' href='#'>
	<img class='circleImage img-circle' alt='Brand' src='http://graph.facebook.com/".$rowLanguageName['FacebookID']."/picture?type=square&width=200&height=200' 
	data-toggle='tooltip' data-placement='top' title='".$rowLanguageName['PersonName']."'>
</a>";


$numRows++;
} ;
$numRows = 5-$numRows;
for ($i=0;$i<=$numRows;$i++){
	echo
	"<a class='navbar-brand ' href='#''>
		<img class='circleImage' alt='Brand' src='images/circle.png'>
	</a>";
}


?>