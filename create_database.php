<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

// Checking connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  //echo"connected";
}
$sql = "CREATE DATABASE lab8";
if (mysqli_query($conn, $sql)) {
  echo "<script>
					alert ('Database Created successfully !')</script>";
} else {
  echo "Error: " . $sql . "
                        " . mysqli_error($conn);
}
mysqli_close($conn);
?>