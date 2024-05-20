<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
//echo "in login php";
// Include config file
require_once "../config/config.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){
  $id = $_GET['id'];

  $_SESSION["user_id"] = "";
  echo "<script>";
  echo "window.location = ' ../org/index.php?id=".$id."';"; // redirect with javascript, after page loads
  echo "</script>";
}
  ?>

