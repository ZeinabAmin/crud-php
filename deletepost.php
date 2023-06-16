<?php
require_once "inc/dbConnection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "select img FROM `POSTS` WHERE ID=$id";
    $runQueryimg = mysqli_query($conn, $query);
    $img = mysqli_fetch_assoc($runQueryimg);
    // print_r($img);
    $imgName = $img['img'];
    unlink("upload/$imgName");

    $query = "DELETE FROM `POSTS` WHERE ID=$id";
    $runQuery = mysqli_query($conn, $query);

    // if($runquery)
    // {
    // header("location:index.php");
    // }else{
    //     echo "error ";
    // }


    header("location:index.php");
}















?>
