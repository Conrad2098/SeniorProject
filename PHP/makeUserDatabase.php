<?php

$conn = new mysqli("localhost", "root", "");
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$using = "USE seniorProject";
$conn->query($using);

$drop = "DROP TABLE IF EXISTS msuUser";
if ($conn->query($drop) === TRUE) {
    echo "MSU Table Dropped. ";
} else {
    echo "Error Dropping Table: " . $conn->error;
}

$drop = "DROP TABLE IF EXISTS WUser";
if ($conn->query($drop) === TRUE) {
    echo "W Table Dropped. ";
} else {
    echo "Error Dropping Table: " . $conn->error;
}


$table = "CREATE TABLE msuUser(
    ID int NOT NULL PRIMARY KEY,
    Username varchar(128) UNIQUE,
    Pass varchar(128),
    Email varchar(128),
    Institution varchar(256),
    isAdmin BOOLEAN,
    Authorized BOOLEAN
    )";
if ($conn->query($table) === TRUE) {
    echo "MSU Table Created. ";
} else {
    echo "Error Creating Table: " . $conn->error;
}

$table = "CREATE TABLE WUser(
    ID int NOT NULL PRIMARY KEY,
    Username varchar(128) UNIQUE,
    Pass varchar(128),
    Email varchar(128),
    Institution varchar(256),
    isAdmin BOOLEAN,
    Authorized BOOLEAN
    )";
if ($conn->query($table) === TRUE) {
    echo "W Table Created. ";
} else {
    echo "Error Creating Table: " . $conn->error;
}

$MSUadminPass = password_hash("MSUAdminPass", PASSWORD_DEFAULT);
$MSUuserPass = password_hash("MSUUserPass", PASSWORD_DEFAULT);
$WadminPass = password_hash("WAdminPass", PASSWORD_DEFAULT);
$WuserPass = password_hash("WUserPass", PASSWORD_DEFAULT);

$insert = "INSERT INTO msuUser(ID, Username, Pass, Email, Institution, isAdmin, Authorized) VALUES('1', 'Admin', '" . $MSUadminPass . "', 'admin@admin.com', 'MSState', 1, 1)";
$conn->query($insert);
$insert = "INSERT INTO msuUser(ID, Username, Pass, Email, Institution, isAdmin, Authorized) VALUES('2', 'User', '" . $MSUuserPass . "', 'user@user.com', 'MSState', 0, 1)";
$conn->query($insert);

$insert = "INSERT INTO WUser(ID, Username, Pass, Email, Institution, isAdmin, Authorized) VALUES('1', 'Admin', '" . $WadminPass . "', 'admin@admin.com', 'TheW', 1, 1)";
$conn->query($insert);
$insert = "INSERT INTO WUser(ID, Username, Pass, Email, Institution, isAdmin, Authorized) VALUES('2', 'User', '" . $WuserPass . "', 'user@user.com', 'TheW', 0, 1)";
$conn->query($insert);
?>