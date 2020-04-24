<?php

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

$query = "SELECT ID FROM msstate ORDER BY ID DESC LIMIT 0, 1;";
$result = $conn->query($query);

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    $next = $row["ID"] + 1;
}

$query = 'INSERT INTO msstate(ID,LibraryName,City,Country,Website,ManuscriptName,Author,BirthDate,DeathDate,Notes,OorC) VALUES(' . $next . ',"' . $lib . '","' . $city . '","' . $country . '","' . $web . '","' . $manu . '","' . $author . '","' . $birth . '","' . $death . '","' . $notes . '","' . $OorC . '");';
if($conn->query($query) === TRUE){
    echo("Success");
}else{
    echo $query;
    echo("Fail");
}

?>