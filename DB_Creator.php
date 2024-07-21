<?php
$dbName = 'CV_Manager';
$conn   = mysqli_connect('localhost', 'root', '');

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

if (!mysqli_select_db($conn, $dbName)) {
    $sql = 'CREATE DATABASE ' . $dbName;
    if (!mysqli_query($conn, $sql)) {
        die('Could not create database: ' . mysqli_error($conn));
    }
    mysqli_select_db($conn, $dbName);
} else {
    mysqli_select_db($conn, $dbName);
}

$sql = 'CREATE TABLE IF NOT EXISTS Universities (
ID_UNI INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
UNI_NAME VARCHAR(4000) NOT NULL)';

if (!mysqli_query($conn, $sql)) {
    die('Could not create table: ' . mysqli_error($conn));
}

$sql    = 'SELECT COUNT(*) AS count FROM Universities';
$result = mysqli_query($conn, $sql);
$row    = mysqli_fetch_assoc($result);

if ($row['count'] == 0) {
    $sql = 'INSERT INTO Universities (UNI_NAME) VALUES 
    ("Софийски университет"),
    ("Технически университет"),
    ("Университет за национално и световно стопанство"),
    ("Пловдивски университет"),
    ("Нов български университет")';

    if (!mysqli_query($conn, $sql)) {
        die('Could not insert into Universities: ' . mysqli_error($conn));
    }

    $sql = 'CREATE TABLE IF NOT EXISTS Technologies (
ID_TECH INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
TECH_NAME VARCHAR(4000) NOT NULL)';

    if (!mysqli_query($conn, $sql)) {
        die('Could not create table: ' . mysqli_error($conn));
    }

    $sql    = 'SELECT COUNT(*) AS count FROM Technologies';
    $result = mysqli_query($conn, $sql);
    $row    = mysqli_fetch_assoc($result);

    if ($row['count'] == 0) {
        $sql = 'INSERT INTO Technologies (TECH_NAME) VALUES 
    ("Python"),
    ("JavaScript"),
    ("Java"),
    ("C#"),
    ("Ruby"),
    ("PHP"),
    ("C++"),
    ("Swift"),
    ("Go"),
    ("Kotlin")';

        if (!mysqli_query($conn, $sql)) {
            die('Could not insert into Univercities: ' . mysqli_error($conn));
        }
    }

    $sql = 'CREATE TABLE IF NOT EXISTS Candidates (
ID_C INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
FULLNAME VARCHAR(4000) NOT NULL),
BDATE DATE NOT NULL,
UNIVESITY VARCHAR(4000) NOT NULL,
TECH VARCHAR(4000) NOT NULL);';
$result = mysqli_query($conn,$sql) or die('Could not create table Candidates: '.mysqli_error($conn));
}

mysqli_close($conn);
