<?php

$id = $_REQUEST['id'];
$lib = $_REQUEST['q'];
$city = $_REQUEST['r'];
$country = $_REQUEST['s'];
$web = $_REQUEST['t'];
$manu = $_REQUEST['u'];
$author = $_REQUEST['v'];
$birth = $_REQUEST['w'];
$death = $_REQUEST['x'];
$notes = $_REQUEST['y'];
$OorC = $_REQUEST['z'];

$conn = new mysqli("localhost", "root", "", "seniorProject");
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM msstate WHERE ID = $id LIMIT 1;";
$result = $conn->query($query);

$query = 'UPDATE msstate SET LibraryName = "' . $lib . '", City = "' . $city . '", Country = "' . $country . '", Website = "' . $web . '", ManuscriptName = "' . $manu . '", Author = "' . $author . '", BirthDate = "' . $birth . '", DeathDate = "' . $death . '", Notes = "' . $notes . '", OorC = "' . $OorC . '" WHERE ID = ' . $id . ';';
if($conn->query($query) === TRUE){
    echo("Success");
}else{
    echo $query;
    echo("Fail");
}

?>