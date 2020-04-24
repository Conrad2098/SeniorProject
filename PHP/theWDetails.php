<?php

$record = $_REQUEST['q'];

$conn = new mysqli("localhost", "root", "", "seniorProject");

$query = 'SELECT * FROM theW WHERE CollectionTitle = "' . $record . '" LIMIT 1;';
$result = $conn->query($query);
if(!$result){
    echo "<h2 style='text-align:center;'>No Results Matching Search<h2>";
}

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

if($row['InstCollNum'] == NULL){
    $icn = 'None';
}else{
    $icn = $row['InstCollNum'];
}
if($row['InclusiveDates'] == NULL){
    $incDates = 'None';
}else{
    $incDates = $row['InclusiveDates'];
}
if($row['Extent'] == NULL){
    $ext = 'None';
}else{
    $ext = $row['Extent'];
}
if($row['SubjectHeadings'] == NULL){
    $SubHead = 'None';
}else{
    $SubHead = $row['SubjectHeadings'];
}
if($row['Link'] == NULL){
    $link = 'None';
}else{
    $link = "<a id='link' href='" . $row['Link'] . "'>" . $row['Link'] . "</a>";
}
if($row['Notes'] == NULL){
    $notes = 'None';
}else{
    $notes = $row['Notes'];
}

echo "
<h4>Collection Title: </h4><p id='coll'>" . $row['CollectionTitle'] . "</p>
<h4>Institution: </h4><p id='inst'>" . $row['Institution'] . "</p>
<h4>Institution Collection Number: </h4><p id='instcollnum'>" . $icn . "</p>
<h4>Inclusive Dates: </h4><p id='incdates'>" . $incDates . "</p>
<h4>Extent: </h4><p id='extent'>" . $ext . "</p>
<h4>Subject Headings: </h4><p id='subHead'>" . $SubHead . "</p>
<h4>Description: </h4><p id='desc'>" . $row['Descriptions'] . "</p>
<h4>Link: </h4><p>" . $link . "</p>
<h4>Notes: </h4><p id='notes'>" . $notes . "</p>
<div id='id' style='visibility: hidden'>" . $row['ID'] . "</div>
";

?>