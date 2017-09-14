<?php
require 'configs.php';

function getOrders() {
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);
    $sql = "SELECT * FROM orders";
    $result = @mysqli_query($connect, $sql);
    echo "<table>";
    while ($row = mysqli_fetch_array($result)){
        echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['message']."</td><td>";
    }
    echo "</table>";
}

?>