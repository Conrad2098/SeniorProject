<?php

$record = $_REQUEST['q'];

$conn = new mysqli("localhost", "root", "", "seniorProject");

$query = "SELECT * FROM msstate WHERE ID = '" . $record . "' LIMIT 1;";
$result = $conn->query($query);
if(!$result){
    echo "<h2 style='text-align:center;'>No Results Matching Search<h2>";
}

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

if($row['DeathDate'] == NULL){
    $DDate = 'Unknown';
}else{
    $DDate = $row['DeathDate'];
}
if($row['BirthDate'] == NULL){
    $BDate = 'Unknown';
}else{
    $BDate = $row['BirthDate'];
}
if($row['Website'] == NULL){
    $link = 'None';
}else{
    $link = "<a href='" . $row['Website'] . "'>" . $row['Website'] . "</a>";
}


echo "
<h4>ID: </h4><p>" . $row['ID'] . "</p>
<h4>Manuscript Name: </h4><p id='name'>" . $row['ManuscriptName'] . "</p>
<h4>Library Name: </h4><p id='lib'>" . $row['LibraryName'] . "</p>
<h4>Location: </h4><p id='loc'>" . $row['City'] . ", " . $row['Country'] . "</p>
<h4>Website: </h4><p id='link'>" . $link . "</p>
<h4>Author: </h4><p id='author'>" . $row['Author'] . "</p>
<h4>Birth and Death: </h4><p id='bAndD'>" . $BDate . "-" . $DDate . "</p>
<h4>Notes: </h4><p id='notes'>" . $row['Notes'] . "</p>
<h4>Original or Copy: </h4><p id='OorC'>" . $row['OorC'] . "</p><br><br>
";

?>