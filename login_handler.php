<?php

    require "database.php";

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $sql = ("SELECT password FROM users WHERE username = ?");
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_Result();
        
        try{
            if($result->num_rows > 0){
                $rows = $result->fetch_asssoc();
                    if(password_verify($password, $rows['password'])){
                        
                        session_start();
                        $_SESSION['userId'] = $user['userId'];

                        header("Location: /codesss/index.php");
                        exit();
                    }else{
                        echo "Password Incorrect!";
                    }
            }else{
                echo "User dont Exist!";
            }
        }catch(Exception $err){
            echo "Error Occur: " .$err->getMessage;
        }
    }


    $conn->close();

?>