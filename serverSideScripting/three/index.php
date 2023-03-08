<?php 
    
    $hostname = "localhost";
    $username = "root";
    $password = "letodluhar";
    $dbName = "realtor";
    $port = 3306;
    $conn = new mysqli($hostname,$username,$password,$dbName,$port);

    if(mysqli_connect_error()){
        echo "error connection with the database";
        exit;
    }


    //a.AVG
    $avgSqlStatement = "SELECT AVG(no_of_bedrooms) as averageBeds from home";
    $result = $conn->query($avgSqlStatement);
    print_r($result->fetch_assoc());
    echo "<br>";

    //b.count
    $countSqlStatement = "SELECT COUNT(id) as totalHomes from home";
    $result= $conn->query($countSqlStatement);
    print_r($result->fetch_assoc());
     echo "<br>";

    //c.sum
    $sumSqlStatement = "SELECT SUM(number_of_bathrooms) as totalBathroomsInCity from home";
    $result = $conn->query($sumSqlStatement);
    print_r($result->fetch_assoc());
     echo "<br>";


    //d.min
    $minSqlStatement =  "SELECT MIN(price) as cheapestHomePrice from home";
    $result = $conn->query($minSqlStatement);
    print_r($result->fetch_assoc());
     echo "<br>";

    //e.max
    $maxSqlStatement = "SELECT max(price) as luxuriousHomePrice from home";
    $result = $conn->query($maxSqlStatement);
    print_r($result->fetch_assoc());
     echo "<br>";


    




?>