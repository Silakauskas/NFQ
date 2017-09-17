<?php
    //require 'configs.php';
    //$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);
    //$connect = pg_connect("$DB_HOST $PORT $DB $DB_USER $DB_PASS")
    //$dsn = "pgsql:host=$DB_HOST;port=5432;dbname=$DB;user=$DB_USER;password=$DB_PASS";
    //$connect = new PDO($dsn);
    $url = parse_url(getenv('mysql://b88a9d55cdd2e3:6387c4fd@eu-cdbr-west-01.cleardb.com/heroku_03dd432fbc620f7?reconnect=true'));
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"], 1);

    $connect = mysqli_connect($server, $username, $password, $db);

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
                $sql = "INSERT INTO orders (name, email, message, quantity, color) 
                    VALUES ('$name', '$email', '$message', '$qty', '$color')";
                mysqli_query($connect, $sql);
                //pg_query($connect, $sql);
                //$connect->query($sql);
            }
            //var_dump($_POST);
        }

        if ($_POST['action'] == 'sort'){
            $sort = $_POST['sort-by'];
            $how = $_POST['sort-how'];
            $sql = "SELECT * from orders order by $sort $how";
            $result = mysqli_query($connect, $sql);
            //$result = pg_query($connect, $sql);
            //$result = $connect->query($sql);
            $ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
            //$ans = $result->fetchAll();
            echo json_encode($ans);
        }
    }

    function getOrders() {
        global $connect;
        $sql = "SELECT * FROM orders";
        $result = mysqli_query($connect, $sql);
        //$result = pg_query($connect, $sql);
        //$result = $connect->query($sql);
        $ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
        //$ans = pg_fetch_all($result);
        //$ans = $result->fetchAll();
        return $ans;
    }
?>