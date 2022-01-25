<?php
include('dbconnect.php')

?>
<html>

<head>
  <style>
    fieldset {
      width: 50%;
    }

    legend {
      width: 100px;
      padding-left: 15px;
      padding-right: 15px;
      padding-top: 10px;
      padding-bottom: 10px;
      color: black;
    }

    td,
    th {
      padding-top: 10px;
      padding-bottom: 10px;
    }
  </style>
  <title>FORM</title>
</head>

<?php
$err = $err1 = $err2 = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pattern1 = "/(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,20}/";
  if (!preg_match($pattern1, $_REQUEST["password"])) {
    $err = "invalid";
  }
  $pattern = "/([0-9][0-9]\-[0-9]{5}\-[0-9])/";
  if (!preg_match($pattern, $_REQUEST["id"])) {
    $err1 = "invalid";
  }
  $pattern2 = "/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}/";
  if (!preg_match($pattern2, $_REQUEST["email"])) {
    $err2 = "invalid";
  }
}
?>

<body>

  <form method="POST" action="">

    <fieldset>
      <legend>Registration Form</legend><br><br>
      <table id="t1">
        <tr>
          <td><label>Id:</label>
          </td>
          <td>
            <input style="width:250px" type="text" name="id" title="example xx-xxxxx-x" pattern="([0-9][0-9]\-[0-9]{5}\-[0-9])" required>
            <span> <?php echo $err1; ?></span>
          </td>
        </tr>
        <tr>
          <td><label>Password:</label>
          </td>
          <td>
            <input style="width:250px" type="password" name="password" title="Atleast 1uppercase,1lowercase,1digit, and no special characters(8-20max)" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,20}" required>
            <span> <?php echo $err; ?></span>
          </td>
        </tr>
        <tr>
          <td><label>Confirm Password:</label>
          </td>
          <td>
            <input style="width:250px" type="password" name="cpassword" tittle="your password doesnot match" required>

          </td>
        </tr>
        <tr>
          <td><label for="name">NAME:</label></td>
          <td>
            <input style="width:250px" type="text" name="name" required>

          </td>
        </tr>
        <tr>
          <td><label for="email">EMAIL:</label>
          </td>
          <td>
            <input style="width:250px" type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}" required>
            <span> <?php echo $err2; ?></span>
          </td>
        </tr>
        <tr>
          <td><label>User Type:</label>
          </td>
          <td>
            <select name="user_type">
              <option value="user">User</option>
              <option value="admin">Admin</option>

            </select>
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" name="submit" value="Register">
          </td>
          <td><span>
              <h4><u> <a href='login.php'>Login</a></u></h4>
            </span>
          </td>
        </tr>
      </table><br>
    </fieldset>
  </form>

</body>

</html>

<?php
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $username = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $user_type = $_POST['user_type'];
  if (!$err && !$err1 && !$err2) {
    if ($password == $cpassword) {
      $password = password_hash($password, PASSWORD_DEFAULT);
      $sql = " INSERT INTO `user`(`table_id`, `id`, `password`, `name`, `email`, `user_type`) VALUES ( null,'$id','$password','$username','$email','$user_type')";

      if (mysqli_query($conn, $sql)) {
        echo "successful";
      } else {
        echo "<script>
					alert ('Submission incomplete!!fillup all the fields ')</script>" . $sql . "
				" . mysqli_error($conn);
      }
    } else {
      echo "password not matches confirm password.";
    }
  } else {
    echo "error";
  }

  mysqli_close($conn);
}

?>