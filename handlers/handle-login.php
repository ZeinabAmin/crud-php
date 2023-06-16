<?php
session_start();
require_once "../inc/dbConnection.php";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // $password = "myPassword123"; // replace with the user's actual password
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // echo $password;

    $query = "SELECT * FROM `USERS` WHERE email='$email'";
    $runQuery = mysqli_query($conn, $query);
    if (mysqli_num_rows($runQuery) == 1) {
        $user = mysqli_fetch_assoc($runQuery);
        $userhashPassword = $user['password'];

        $isCorrect = password_verify($password, $userhashPassword); //true or false
        if ($isCorrect) {
            $_SESSION['email'] = $user['email'];
            header("location:../index.php");
        } else {
            $_SESSION['errors'] = ["password is not correct"];
            // $_SESSION['errors'][] = "Password not match";
            header("location:../login.php");
        }
    } else {
        $_SESSION['errors'] = ["Email not match"];
        // $_SESSION['errors'][] = "Email not match";
        header("location:../login.php");
    }
}
