<?php
$user = $_POST['user'];

    if($stmt = $mysqli->prepare("SELECT Artist FROM Artist WHERE Artist = ?"))
    {
        $stmt->bind_param('s', $user);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id);
        $stmt->fetch();
        if($stmt->num_rows>0)
        {
            echo "1";
        }else{
            echo "0";   
        }
    }
?>