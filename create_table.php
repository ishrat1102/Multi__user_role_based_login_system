<?php
include('dbconnect.php')
?>
<?php
$sql = "CREATE TABLE `user` (
  `table_id` int(11)PRIMARY KEY NOT NULL,
  `id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
  
  
)DEFAULT CHARSET=utf8mb4";


if (mysqli_query($conn, $sql)) {
  echo "<script>
					alert ('Table Created successfully !')</script>";
} else {
  echo "Error: " . $sql . "
                        " . mysqli_error($conn);
}

mysqli_close($conn);

?>