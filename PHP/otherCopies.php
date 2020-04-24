<?php

error_reporting(E_ERROR);

$record = $_REQUEST['q'];

$conn = new mysqli("localhost", "root", "", "seniorProject");

$query = "SELECT * FROM msstate WHERE ID = '" . $record . "';";
$result = $conn->query($query);
if(!$result){
    echo "<h2 style='text-align:center;'>No Results Matching Search<h2>";
}

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$name = $row['ManuscriptName'];

$query = "SELECT * FROM msstate WHERE ManuscriptName = '" . $name . "' EXCEPT SELECT * FROM msstate WHERE ID = '" . $record . "';";
$results = $conn->query($query);

if(mysqli_num_rows($results) != 0){
    $x = 1;
    while($rows = mysqli_fetch_array($results, MYSQLI_ASSOC)){
        echo "
            <p onclick='showDetails(" . $rows['ID'] . ")' id='" . $x . "'>" . $rows['ID'] . ". " . $rows['LibraryName'] . ", " . $rows['City'] . ", " . $rows['Country'] . "</p>
        ";
        $x = $x + 1;
    }
}

?>