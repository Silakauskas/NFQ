<?php
    require 'configs.php';
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    if (isset($_POST['adding'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $text = $_POST['message'];
        if (!$connect) {
            die('Could not connect: ' . mysql_error());
        } else {
            echo "Success connecting to DB.";
            $sql = "INSERT INTO orders (name, email, message) VALUES ('$name', '$email', '$text')";
            mysqli_query($connect, $sql);
            header("Location: index.php");
        }
        var_dump($_POST);
    }

    function getOrders() {
        global $connect;
        $sql = "SELECT * FROM orders";
        $result = mysqli_query($connect, $sql);
        $ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $ans;
    }


?>