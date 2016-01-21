<?php
$errCheck = 0;
$errCheck1 = 0;

$servername = "fdb6.awardspace.net";
$username = "1954059_cirku";
$password = "chrisgalea1";
$dbname = "1954059_cirku";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

mysql_connect("fdb6.awardspace.net", "1954059_cirku", "chrisgalea1") or die (mysql_error ());
    mysql_select_db("1954059_cirku") or die(mysql_error());
if(isset($_POST['submit-button'])){

    $formErrors ="";

    if (empty($_POST["idSongName"])) {
        $songNameErr = "Title is required";
        $errCheck++;
        $formErrors .= "<p>Enter song title.</p>";
    } else {
        $songName = test_input($_POST["idSongName"]);
        if (!preg_match("/^([a-zA-Z0-9\']+\s?)*$/",$songName)) {
            $formErrors .= "<p>Enter valid song title. Only letters and numbers are allowed.</p>";
            $songNameErr = "Invalid Title";
            $errCheck++;
        }else{
            $errCheck1++;
        }
    }

    if (empty($_POST["idSongUrl"])) {
        $songUrlErr = "Song Url is required";
        $errCheck++;
        $formErrors .= "<p>Enter karaoke video url.</p>";
    } else {
        $songUrl = test_input($_POST["idSongUrl"]);
        $sqlSongUrlCheck = "SELECT Url FROM Song WHERE Url = '$songUrl'";
        $sqlSongUrlCheckQ = mysql_query($sqlSongUrlCheck);
        $numRows1 = mysql_num_rows($sqlSongUrlCheckQ);
        if($numRows1 > 0){
            $formErrors .= "<p>Url/Song already exists.</p>"; //Exists
            $songUrlErr = "* Url exists";
            $errCheck++;
        }else{
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$songUrl)) {
                $formErrors .= "<p>Enter a valid URL.</p>";
                $songUrlErr = "Invalid URL";
                $errCheck++;
            }else{
                $errCheck1++;
            }
        }
        
    }

    if (empty($_POST["radioArtist"])) {
        $radioErr = "Type is required";
        $formErrors .= "<p>Choose between an existing or a new artist.</p>";
        $errCheck++;
    } else {
        $radio = test_input($_POST["radioArtist"]);
        $errCheck1++;
    }

    if (empty($_POST["idLanguage"])) {
        $formErrors .= "<p>Choose language.</p>";
        $errCheck++;
    } else {
        $lang = test_input($_POST["idLanguage"]);
        $errCheck1++;
    }

    if (empty($_POST["idOldArtist"])&&($_POST["radioArtist"] == 1)) {
        $oldArtistErr = "* Artist is required";
        $formErrors .= "<p>Enter an artist.</p>";
        $errCheck++;
    } else if(($_POST["idOldArtist"] != "")&&($_POST["radioArtist"] == 1)) {
        $oldArtist = test_input($_POST["idOldArtist"]);
        $errCheck1++;

        if(!empty($_POST["idSongName"])) {
            // $sqlSongArtistCheck =sprintf("SELECT COUNT(*) Song_Name FROM Song WHERE (Song_Name = '%s') AND (Artist_Id = '%s')",($songName), mysql_real_escape_string($oldArtist));
            $sqlSongArtistCheckQ = mysqli_query($conn, "SELECT COUNT(*) Song_Name FROM Song WHERE (Song_Name = '".mysql_real_escape_string($songName)."') AND (Artist_Id = '".mysql_real_escape_string($oldArtist)."')") or die(mysqli_error($conn));
            $numRows2 = mysqli_fetch_row($sqlSongArtistCheckQ);
            $numRows3 = $numRows2[0];
            if($numRows3 >= 1){
                $formErrors .= "<p>The same song with the same artist already exists.</p>"; //Exists
                $songNameErr = "* Song exists";
                $errCheck++;
            }else{
                $songNameErr = "";
            }
        }
    } 

    if (empty($_POST["idNewArtist"])&&($_POST["radioArtist"] == 2)) {
        $newArtistErr = "* Artist is required";
        $formErrors .= "<p>Enter an artist</p>";
        $errCheck++;
    } else {
        $newArtist = test_input($_POST["idNewArtist"]);
        if (!preg_match("/^([a-zA-Z]+\s?)*$/",$newArtist)) {
            $formErrors .= "<p>Enter a valid artist name. Only letters are allowed.</p>";
            $newArtistErr = "* Invalid Artist";
            $errCheck++;
        }
    }

    if (!empty($_POST["idNewArtist"])&&($_POST["radioArtist"] == 2)) {
        $ExistingArtist = 0;
        $sqlArtistCheck = "SELECT Artist_Id FROM Artist WHERE Artist = '$newArtist'";
        $sqlArtistCheckQ = mysql_query($sqlArtistCheck);
        $numRows = mysql_num_rows($sqlArtistCheckQ);
        if($numRows > 0){
            $formErrors .= "<p>Artist already exists. Check the existing dropdown list.</p>"; //Exists
            $newArtistErr = "* Artist exists";
            while($rowExisting = mysql_fetch_array($sqlArtistCheckQ)) {
                $ExistingArtist = $rowExisting['Artist_Id'];
            }        
            $errCheck++;
        }else{
            $errCheck1++;
            $formErrors .= "<p>Artist does not exist</p>"; //Does not exist
        }
    }
}

if($errCheck1 == 5){
//     if($_POST["radioArtist"] == 1){
//         $sqlAddSongOld = sprintf("INSERT INTO `Song`(`Song_Id`, `Song_Name`, `Artist_Id`, `Language_id`, `Url`) VALUES ('Song_Id','%s','%s','%s','%s')",($songName),mysql_real_escape_string($oldArtist),mysql_real_escape_string($lang),($songUrl));
//         $sqlAddSongOldQ = mysql_query($sqlAddSongOld);
//         if($sqlAddSongOldQ){
//             $songName = "";
//             $songUrl ="";
//             $newArtist = "";
//             $checkcheck = "DONE";
//         }else {
//             $errCheck++;
//             $checkcheck = "NOT DONE";
//         }
//     }

//     if($_POST["radioArtist"] == 2){
//         $sqlAddArtist = sprintf("INSERT INTO `Artist`(`Artist_Id`, `Artist`) VALUES (`Artist_Id`,%s)",($newArtist));
//         $sqlAddArtistQ = mysql_query($sqlAddArtist);
//         if($sqlAddArtistQ){
//             $sqlGetArtist = "SELECT `Artist_Id` FROM `Artist` WHERE Artist = '$newArtist'";
//             $sqlGetArtistQ = mysql_query($sqlGetArtist);

//             $artistRow = mysql_fetch_row($sqlGetArtistQ);
//             $newArtistId = $artistRow[0];
            
//             $sqlAddSongNew = sprintf("INSERT INTO `Song`(`Song_Id`, `Song_Name`, `Artist_Id`, `Language_id`, `Url`) VALUES ('Song_Id','%s','%s','%s','%s')",($songName),mysql_real_escape_string($newArtistId),mysql_real_escape_string($lang),($songUrl));
//             $sqlAddSongNewQ = mysql_query($sqlAddSongNew);
//             if($sqlAddSongNewQ){
//                 $songName = "";
//                 $songUrl ="";
//                 $newArtist = "";
//                 $checkcheck = "DONE";
//             }else {
//                 $errCheck++;
//                 $checkcheck = "NOT DONE";
//             }
//         }
//     }

    if($_POST["radioArtist"]==1){
        $sql = "INSERT INTO `Song`(`Song_Name`, `Artist_Id`, `Language_id`, `Url`) VALUES ('".mysql_real_escape_string($songName)."',
            '".mysql_real_escape_string($oldArtist)."','".mysql_real_escape_string($lang)."','".mysql_real_escape_string($songUrl)."')";

        if ($conn->query($sql) === TRUE) {
            // $checkcheck = "DONE";
        }else {
            $errCheck++;
            $formErrors .= "<p>Error inserting song.</p>";
            // $checkcheck = "NOT DONE";
        }
    }

    if($_POST["radioArtist"]==2){
        $sql1 = "INSERT INTO `Artist`(`Artist`) VALUES ('".mysql_real_escape_string($newArtist)."')";
        if ($conn->query($sql1) === TRUE) {
            $formErrors .= "<p>DONE</p>";
            // $checkcheck = "DONE";
        }else {
            $errCheck++;
            $formErrors .= "<p>Error entering artist.</p>";
        }

        $sqlGetArtist = "SELECT `Artist_Id` FROM `Artist` WHERE Artist = '".mysql_real_escape_string($newArtist)."'";
        $sqlGetArtistQ = mysql_query($sqlGetArtist);

        $artistRow = mysql_fetch_row($sqlGetArtistQ);
        $newArtistId = $artistRow[0];
        
        $sqlAddSongNew = "INSERT INTO `Song`(`Song_Name`, `Artist_Id`, `Language_id`, `Url`) VALUES ('".mysql_real_escape_string($songName)."',
        '".mysql_real_escape_string($newArtistId)."','".mysql_real_escape_string($lang)."','".mysql_real_escape_string($songUrl)."')";

        if ($conn->query($sqlAddSongNew) === TRUE) {
            // $checkcheck = "DONE";
        }else {
            $errCheck++;
            $formErrors .= "<p>Error inserting song.</p>";
            // $checkcheck = "NOT DONE";
        }
    }
}
    
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

}   

 // $sqlAddSong = sprintf("INSERT INTO `Song`(`Song_Id`, `Song_Name`, `Artist_Id`, `Language_id`, `Url`) 
    //     VALUES ('Song_Id','%s','%s','%s','%s')",($songName),mysql_real_escape_string($oldArtist),mysql_real_escape_string($lang),($songUrl));
    //$sqlAddSongQ = mysql_query($sqlAddSong);
    // if($sqlAddSongQ){
    //  echo "Added";
    // }else {
        // echo $songName;
        // echo $songUrl;
        // echo $lang;
        //echo $oldArtist;
       // echo $radio;
    // }
?>