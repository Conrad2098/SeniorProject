<?php

$id = $_REQUEST['q'];

$conn = new mysqli("localhost", "root", "", "seniorProject");
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM msuUser WHERE ID = '$id';";
$result = $conn->query($query);

if(!$result){
    echo("Fail");
}else if(mysqli_num_rows($result) > 1){
    echo("Fail");
}else{
    $query = "DELETE FROM msuUser WHERE ID = '$id';";
    $conn->query($query);
}
?>