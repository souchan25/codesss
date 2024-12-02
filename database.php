<?php

    $url = "locahost";
    $username = "root";
    $password = "";
    $dbname =  "userDb";

    $conn = new mysqli($url, $username, $password, $dbname);

    if($conn->connect_error){
        echo "Connection Failed: " .$conn->connect_error;
    }

    $conn->close();

?>