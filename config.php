<?php

session_start();
$locAPP="/fittrack/";


$conn = new PDO(
	"mysql:host=localhost;dbname=fitnesstracker",
	"admin",
	"admin",
	array(
		PDO::ATTR_EMULATE_PREPARES=> false,
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET utf8",
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
	)
);