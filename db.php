<?php
    require 'configs.php';
    //$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);
    //$connect = pg_connect("$DB_HOST $PORT $DB $DB_USER $DB_PASS")
    $dsn = "pgsql:host=$DB_HOST;port=5432;dbname=$DB;user=$DB_USER;password=$DB_PASS";
    $connect = new PDO($dsn);

    if (isset($_POST['action'])){
        if ($_POST['action'] == 'add'){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            $color = $_POST['color'];
            $qty = $_POST['quantity'];
            if (!$connect) {            // sita tikriausiai iskelt iskart po connect
                //die('Could not connect: ' . mysql_error());
                die("Could not connect to databse.");
            } else {
                echo "<script type='text/javascript'>alert('Prisijungta');</script>";
                $sql = "INSERT INTO orders (name, email, message, quantity, color) 
                    VALUES ('$name', '$email', '$message', '$qty', '$color')";
                //mysqli_query($connect, $sql);
                //pg_query($connect, $sql);
                $connect->query($sql);
            }
            //var_dump($_POST);
        }

        if ($_POST['action'] == 'sort'){
            $sort = $_POST['sort-by'];
            $how = $_POST['sort-how'];
            $sql = "SELECT * from orders order by $sort $how";
            //$result = mysqli_query($connect, $sql);
            //$result = pg_query($connect, $sql);
            $result = $connect->query($sql);
            //$ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
            $ans = $result->fetchAll();
            echo json_encode($ans);
        }
    }

    function getOrders() {
        global $connect;
        $sql = "SELECT * FROM orders";
        //$result = mysqli_query($connect, $sql);
        //$result = pg_query($connect, $sql);
        $result = $connect->query($sql);
        //$ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
        //$ans = pg_fetch_all($result);
        $ans = $result->fetchAll();
        return $ans;
    }
?>