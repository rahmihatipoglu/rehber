<?php
$servername = "localhost";
$username   = "root";
$password   = "root";
$dbname     = "vue_dersleri";

try {
  $DB = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
  // set the PDO error mode to exception
  $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  die();
}

function DD($var)
{
  echo "<pre>";
  print_r($var);
  echo "</pre>";
}

function DDD($var)
{
  echo "<pre>";
  print_r($var);
  echo "</pre>";
  die();
}

