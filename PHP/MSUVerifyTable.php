<?php

$conn = new mysqli("localhost", "root", "", "seniorProject");

$query = "SELECT * FROM msuUser WHERE Authorized = 0;";
$result = $conn->query($query);
if(!$result){
    echo "<br><br><h2 style='text-align:center;'>No account Requests<h2>";
}else{
    if(mysqli_num_rows($result) != 0){
        echo "<table id='verifyTable' style='width: 100%; text-align: center; margin-left: auto; margin-right: auto'>
        <tr style='font-size: 26px'>
            <style>th: {max-width: 250px;}</style>
    
            <th style='width: 10%; text-align: center;'>ID</th>
            <th style='width: 35%; text-align: center;'>Email</th>
            <th style='width: 35%; text-align: center;'>Institution</th>
            <th style='width: 20%; text-align: center;'>Verify?</th>
        </tr>";

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            echo "<tr style='height: 75px;'>
            <td style='width: 10%;' id='id'>" . $row['ID'] . "</td>
            <td style='width: 35%;'>" . $row['Email'] . "</td>
            <td style='width: 35%;'>" . $row['Institution'] . "</td>
            <td style='width: 20%;'><button onclick='verifyUser()'>User</button><button onclick='verifyAdmin()'>Admin</button><br><button onclick='rejectUser()'>Reject</button></td>
        </tr>";
        }
    }else{
        echo "<br><br><h2 style='text-align:center;'>No account Requests<h2>";
    }
}


?>