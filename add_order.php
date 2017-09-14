
<?php
require 'configs.php';

if (isset($_POST)){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $text = $_POST['message'];
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);
    if (!$connect) {
        die('Could not connect: ' . mysql_error());
    } else {
        echo "Success connecting to DB.";
        $sql = "INSERT INTO orders (name, email, message) VALUES ('$name', '$email', '$text')";
        @mysqli_query($connect, $sql);
        header("Location: index.php");
    }
        var_dump($_POST);
}
?>