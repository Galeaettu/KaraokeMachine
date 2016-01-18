<?php
$errCheck = 0;
mysql_connect("fdb6.awardspace.net", "1954059_cirku", "chrisgalea1") or die (mysql_error ());
    mysql_select_db("1954059_cirku") or die(mysql_error());
if(isset($_POST['submit-button'])){
    // $songName = ($_POST["idSongName"]);
    // $songUrl = ($_POST["idSongUrl"]);
    // $lang = ($_POST["idLanguage"]);
    // $oldArtist = ($_POST["idOldArtist"]);

    $formErrors ="";

    if (empty($_POST["idSongName"])) {
        $songNameErr = "Title is required";
        $errCheck++;
        $formErrors .= "<p>Enter song title.</p>";
    } else {
        $songName = test_input($_POST["idSongName"]);
    }

    if (empty($_POST["idSongUrl"])) {
        $songUrlErr = "Song Url is required";
        $errCheck++;
        $formErrors .= "<p>Enter karaoke video url.</p>";
    } else {
        $songUrl = test_input($_POST["idSongUrl"]);
    }

    if (empty($_POST["radioArtist"])) {
        $radioErr = "Artist is required";
        $formErrors .= "<p>Choose between an existing or a new artist.</p>";
        $errCheck++;
    } else {
        $radio = test_input($_POST["radioArtist"]);
    }

    if (empty($_POST["idOldArtist"])&&($_POST["radioArtist"] == 1)) {
        $oldArtistErr = "* Artist is required";
        $formErrors .= "<p>Enter an artist.</p>";
        $errCheck++;
    } else {
        $oldArtist = test_input($_POST["idOldArtist"]);
    }

    if (empty($_POST["idNewArtist"])&&($_POST["radioArtist"] == 2)) {
        $newArtistErr = "* Artist is required";
        $formErrors .= "<p>Enter an artist</p>";
        $errCheck++;
    } else {
        $newArtist = test_input($_POST["idNewArtist"]);
    }

    if (!empty($_POST["idNewArtist"])&&($_POST["radioArtist"] == 2)) {
        $sqlArtistCheck = "SELECT Artist FROM Artist WHERE Artist = '$newArtist'";
        $sqlArtistCheckQ = mysql_query($sqlArtistCheck);
        $numRows = mysql_num_rows($sqlArtistCheckQ);
        if($numRows > 0){
            $formErrors .= "<p>1 If check enter ".$newArtist."</p>";
            $errCheck++;
        }else{
            $formErrors .= "<p>2 Else ".$newArtist."</p>";
        }
    }
   

    $sqlAddSong = sprintf("INSERT INTO `Song`(`Song_Id`, `Song_Name`, `Artist_Id`, `Language_id`, `Url`) 
        VALUES ('Song_Id','%s','%s','%s','%s')",($songName),mysql_real_escape_string($oldArtist),mysql_real_escape_string($lang),($songUrl));


    // $sqlAddSongQ = mysql_query($sqlAddSong);
    // if($sqlAddSongQ){
    //  echo "Added";
    // }else {
        // echo $songName;
        // echo $songUrl;
        // echo $lang;
        //echo $oldArtist;
       // echo $radio;
    // }
}
    
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>