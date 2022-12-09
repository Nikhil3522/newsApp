<?php
    $servername = "localhost";
    $username = "root";
    $password = "2580";
    $dbname = "news";

    
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(!$conn){
        echo "Connection failed!";
    }
?>