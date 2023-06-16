<?php
session_start();
if (isset($_SESSION['erorrs'])) {
    foreach ($_SESSION['erorrs'] as $value) {
        echo  "$value <br>";
    }
}
unset($_SESSION['erorrs']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="handle-form.php" method="post">
        <input type="text" name="name" id="" placeholder="name">
        <br>
        <input type="text" name="email" id="" placeholder="email">
        <br>
        <button type="submit" name="submit">Add</button>
        <br>
    </form>
</body>

</html>