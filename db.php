<?php
    require 'configs.php';
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    if (isset($_POST['action'])){
        if ($_POST['action'] == 'add'){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            $color = $_POST['color'];
            $qty = $_POST['quantity'];
            if (!$connect) {            // sita tikriausiai iskelt iskart po connect
                die('Could not connect: ' . mysql_error());
            } else {
                //echo "Success connecting to DB.";
                $sql = "INSERT INTO orders (name, email, message, quantity, color) 
                    VALUES ('$name', '$email', '$message', '$qty', '$color')";
                mysqli_query($connect, $sql);
                //header("Location: index.php");
            }
            //var_dump($_POST);
        }

        if ($_POST['action'] == 'sort'){
            $sort = $_POST['sort-by'];
            $how = $_POST['sort-how'];
            $sql = "SELECT * from orders order by $sort $how";
            $result = mysqli_query($connect, $sql);
            $ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
            echo json_encode($ans);
        }
    }

    function getOrders() {
        global $connect;
        $sql = "SELECT * FROM orders";
        $result = mysqli_query($connect, $sql);
        $ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $ans;
    }
?>