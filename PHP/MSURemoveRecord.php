<?php

$record = $_REQUEST['q'];

$conn = new mysqli("localhost", "root", "", "seniorProject");
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM msstate WHERE ID = '$record ';";
$result = $conn->query($query);

if(!$result){
    echo("Failed. Please try again later.");
}else{
    $query = "DELETE FROM msstate WHERE ID = '$record';";
    if($result = $conn->query($query) === TRUE){
        echo("Record Deleted. Redirecting to the Browse page.");
    }else{
        echo("Failed. Please try again later.");
    }
    
}

?>