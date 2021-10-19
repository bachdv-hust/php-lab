<?php

$server = "localhost:3308";
$user = "root";
$pass = "123";
$db = "lab9";

// connect to mysql

$connect = mysqli_connect($server, $user, $pass) or die("Sorry, can't connect to the mysql.");

// select the db

mysqli_select_db($connect, $db) or die("Sorry, can't select the database.");