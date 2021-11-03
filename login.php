<?php 
session_start();
require "dbh.inc.php";

if(isset($_POST['signup-btn'])){
    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordReapeat = $_POST['pwd-repeat'];
    if(empty($password) || empty($email) || empty($passwordReapeat)){
        header("Location:");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-z0-9]*$/", $username)){
        header("location:");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location:");
        exit();
    }elseif (!preg_match("/^[a-zA-z0-9]*$/", $username)){
        header("Location:");
        exit();
    }elseif ($password != $passwordReapeat){
        header("Location:");
        exit();
    }else{
        $sql = "INSERT INTO users (names,emailUsers, pwdUsers) VALUES(?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location:.../singup.php?error=sqlerror");
            exit();
        } else{
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $heahed);
            mysqli_stmt_execute($stmt);
            header("Location.../login.php");
            exit();
        }
    }
    }
    

?>