<?php
require 'configs.php';

function getOrders() {
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);
    $sql = "SELECT * FROM orders";
    $result = mysqli_query($connect, $sql);
    $ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $ans;
}

?>