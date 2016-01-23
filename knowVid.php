<?php 
mysql_connect("fdb6.awardspace.net", "1954059_cirku", "chrisgalea1") or die (mysql_error ());
    mysql_select_db("1954059_cirku") or die(mysql_error());


$addressId = $_GET["id"];
// $addressId=$_REQUEST["id"];

if(isset($_POST['person1_x'], $_POST['person1_y'])){
	$sqlChris = sprintf("INSERT INTO `PersonSong`(`Person_Id`, `Song_Id`) VALUES (1,%s)",mysql_real_escape_string($addressId));
	$sqlChrisQ = mysql_query($sqlChris);
	if($sqlChrisQ){
	}else {
		$sqlChrisD = sprintf("DELETE FROM `PersonSong` WHERE `Person_Id` = 1 AND `Song_Id` = %s",mysql_real_escape_string($addressId));
		$sqlChrisD1 = mysql_query($sqlChrisD);
	}

}

if(isset($_POST['person4_x'], $_POST['person4_y'])){
	$sqlChris = sprintf("INSERT INTO `PersonSong`(`Person_Id`, `Song_Id`) VALUES (4,%s)",mysql_real_escape_string($addressId));
	$sqlChrisQ = mysql_query($sqlChris);
	if($sqlChrisQ){
	}else {
		$sqlChrisD = sprintf("DELETE FROM `PersonSong` WHERE `Person_Id` = 4 AND `Song_Id` = %s",mysql_real_escape_string($addressId));
		$sqlChrisD1 = mysql_query($sqlChrisD);
	}
}

if(isset($_POST['person2_x'], $_POST['person2_y'])){
	$sqlChris = sprintf("INSERT INTO `PersonSong`(`Person_Id`, `Song_Id`) VALUES (2,%s)",mysql_real_escape_string($addressId));
	$sqlChrisQ = mysql_query($sqlChris);
	if($sqlChrisQ){
	}else {
		$sqlChrisD = sprintf("DELETE FROM `PersonSong` WHERE `Person_Id` = 2 AND `Song_Id` = %s",mysql_real_escape_string($addressId));
		$sqlChrisD1 = mysql_query($sqlChrisD);
	}
}

if(isset($_POST['person3_x'], $_POST['person3_y'])){
	$sqlChris = sprintf("INSERT INTO `PersonSong`(`Person_Id`, `Song_Id`) VALUES (3,%s)",mysql_real_escape_string($addressId));
	$sqlChrisQ = mysql_query($sqlChris);
	if($sqlChrisQ){
	}else {
		$sqlChrisD = sprintf("DELETE FROM `PersonSong` WHERE `Person_Id` = 3 AND `Song_Id` = %s",mysql_real_escape_string($addressId));
		$sqlChrisD1 = mysql_query($sqlChrisD);
		if($sqlChrisD1)
		{
		}else{
			echo mysql_error();
		}
	}
}

if(isset($_POST['person5_x'], $_POST['person5_y'])){
	$sqlChris = sprintf("INSERT INTO `PersonSong`(`Person_Id`, `Song_Id`) VALUES (5,%s)",mysql_real_escape_string($addressId));
	$sqlChrisQ = mysql_query($sqlChris);
	if($sqlChrisQ){
	}else {
		$sqlChrisD = sprintf("DELETE FROM `PersonSong` WHERE `Person_Id` = 5 AND `Song_Id` = %s",mysql_real_escape_string($addressId));
		$sqlChrisD1 = mysql_query($sqlChrisD);
	}
}

$sqlPersonSong = mysql_query("SELECT
								  Person.Person_Id AS PersonID,
								  Person.Name AS PersonName,
								  PersonSong.Song_Id AS SongID,
								  Person.Facebook_Id AS FacebookID
								FROM
								  Person
								LEFT JOIN
								  PersonSong ON Person.Person_Id = PersonSong.Person_Id AND PersonSong.Song_Id = ".$addressId."");


$numRows = 1;
while($rowLanguageName = mysql_fetch_array($sqlPersonSong)) {
	$facebookImage = "http://graph.facebook.com/".$rowLanguageName['FacebookID']."/picture?type=square&width=200&height=200";

	if(!is_null($rowLanguageName['SongID'])){
		$dontKnowCSS = "";
	}else{
		$dontKnowCSS = "dontKnow";
	}

//Image Circle Buttons

	echo"
<div class='navbar-brand '>
	<input name='person".$rowLanguageName['PersonID']."' id='person".$rowLanguageName['PersonID']."' type='image' value='submit' class='".$dontKnowCSS." circleImage img-circle' alt='Brand' src='".$facebookImage."' 
	data-toggle='tooltip' data-placement='top' title='".$rowLanguageName['PersonName']."'/>
</div>";



$numRows++;
} ;
$numRows = 5-$numRows;
for ($i=0;$i<=$numRows;$i++){


//Image Circle Buttons

	echo
	"<a class='navbar-brand ' href='#''>
		<img class='circleImage' alt='Brand' src='images/circle.png'>
	</a>";
}


?>