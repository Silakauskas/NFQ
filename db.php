<?php
    require 'configs.php';
    $connect = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);

    if (isset($_POST['action'])){
        if ($_POST['action'] == 'add'){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            $color = $_POST['color'];
            $qty = $_POST['quantity'];
            $params = array($name, $email, $message, $qty, $color);
            if (!$connect) {
                die('Could not connect: ' . mysql_error());
            } else {
                $statement = $connect->prepare("INSERT INTO orders(name, email, message, quantity, color) 
                    VALUES (?, ?, ?, ?, ?)");
                $statement->execute($params);
            }
            //var_dump($_POST);
        }

        if ($_POST['action'] == 'sort'){
            $sort = $_POST['sort-by'];
            $how = $_POST['sort-how'];
            $params = array($sort, $how);
            $statement = $connect->prepare("SELECT * from orders order by $sort $how");
            $statement->execute();
            $ans = $statement->fetchAll();
            //$result = mysqli_query($connect, $sql);
            //$ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
            echo json_encode($ans);
        }
    }

    function getOrders() {
        global $connect;
        $statement = $connect->prepare("SELECT * FROM orders");
        $statement->execute();
        $ans = $statement->fetchAll();
        return $ans;
    }
?>