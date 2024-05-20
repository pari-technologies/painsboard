<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'painsboa_admin');
define('DB_PASSWORD', 'R$N=g?wfq4X6');
define('DB_DATABASE', 'painsboa_main');


// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_DATABASE', 'paritech_painsboard');

  $url_point = "http://localhost/skc/";
  // $url_point = "https://skc.pari.com.my/";

  /* Connect to MySQL and select the database. */
  $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

?>