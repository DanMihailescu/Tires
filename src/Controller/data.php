<?php
    //Creates connection to the database

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "data";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    
    //Searches for the vehicles with a certain brand
    $curr_brand = $_POST("brand");
    $result = mysqli_query($conn, "SELECT * FROM VehicleModelYear WHERE brand = &curr_brand");

    $data=array();
    while($row=mysqli_fetch_assoc($results)){
        $data[] = $row; 
    }
    
    echo json_encode($data);
?>