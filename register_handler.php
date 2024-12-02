<?php

    require "database.php"

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $username = trim($_POST['username']);
        $fullname = trim($_POST['fullname']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


        $sql = "INSERT INTO users (username, fullname, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $fullname, $password);

        if($stmt->execute(['username' => $username, 'fullname' => $fullname, 'password' =>$password])){
            header("Location: .login.php");
            exit();
        }else{
            echo "Connection Failed";
        }
    }

?>