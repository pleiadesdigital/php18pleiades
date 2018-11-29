<?php
// Credentials
$dbhost = 'localhost';
$dbuser = 'webmaster';
$dbpass = 'n1col3';
$dbname = 'php18pm';


// 1. Create database connection
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  // test if connection succeeded
  if (mysqli_connect_errno()) {
    $msg = "Database connection failed: ";
    $msg .= mysqli_connect_error();
    $msg .= " (" . mysqli_connect_errno() . ")";
    exit($msg);
  }

// 2. Perform database query
$query = "SELECT * FROM subjects";
$result_set = mysqli_query($connection, $query);
  // test if query succeeded
  if (!$result_set) {
    exit("Database query failed");
  }



// 3. Use returned data
while ($subject = mysqli_fetch_assoc($result_set)) {
  echo $subject['menu_name'] . '<br>';
}

// 4. Release returned data
mysqli_free_result($result_set);
// 5. Close database connection
mysqli_close($connection);




