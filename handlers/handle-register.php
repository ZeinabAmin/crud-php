<?php
session_start();
require_once "../inc/dbConnection.php";

if (isset($_POST['submit'])) {
    $name = trim(htmlspecialchars($_POST['name']));
    $email = trim(htmlspecialchars($_POST['email']));
    $password = $_POST['password'];

    $errors = [];

    if (empty($name)) {
        $errors[] = "name is required";
    } elseif (!is_string($name)) {
        $errors[] = "name must be string";
    } elseif (strlen($name) > 255) {
        $errors[] = "max length <= 255 length ";
    }

    if (empty($email)) {
        $errors[] = "email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "email is not valid";
    } elseif (strlen($email) > 255) {
        $errors[] = "max length <= 255 length ";
    }

    if (empty($password)) {
        $errors[] = "password is required";
    } elseif (!is_string($password)) {
        $errors[] = "password must be string";
    }

    if (empty($errors)) {
        $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        // $isLogin = password_verify($password, $user['password']);

        //check email
        $query = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name','$email',
        '$passwordHash')";
        $result = mysqli_query($conn, $query);
        header("location:../login.php");
    } else {

        $_SESSION['errors'] = $errors;
        header("location:../register.php");
    }
}
