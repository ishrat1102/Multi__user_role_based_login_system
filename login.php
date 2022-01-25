<?php

include("dbconnect.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // username and password sent from form

  $userid = mysqli_real_escape_string($conn, $_POST['id']); //echo  $userid;
  $password = mysqli_real_escape_string($conn, $_POST['password']); //echo $password;


  $sql = "SELECT * FROM `user` WHERE id='$userid'  ";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $stored_pass = $row['password']; //echo $stored_pass;
    if ($row['user_type'] == "user") {
      if (!empty($_POST["remember"])) {

        setcookie("login_id", $userid, time() + (7 * 24 * 60 * 60), "/");
        setcookie("login_pass", $password, time() + (7 * 24 * 60 * 60), "/");
      } else {
        if (isset($_COOKIE["login_id"])) {
          setcookie("login_id", "", time() - (7 * 24 * 60 * 60), "/");
        }
        if (isset($_COOKIE["login_pass"])) {
          setcookie("login_pass", "", time() - (7 * 24 * 60 * 60), "/");
        }
        header("location:login.php");
      }
      if (password_verify($password, $stored_pass)) {
        //echo"user";
        $_SESSION["userid"] = $userid;
        header("location:welcome_user.php");
      }
    } else if ($row['user_type'] == "admin") {
      if (!empty($_POST["remember"])) {
        setcookie("login_id", $userid, time() + (7 * 24 * 60 * 60), "/");
        setcookie("login_pass", $password, time() + (7 * 24 * 60 * 60), "/");
      } else {
        if (isset($_COOKIE["login_id"])) {
          setcookie("login_id", "", time() - (7 * 24 * 60 * 60), "/");
        }
        if (isset($_COOKIE["login_pass"])) {
          setcookie("login_pass", "", time() - (7 * 24 * 60 * 60), "/");
        }
        header("location:login.php");
      }
      if (password_verify($password, $stored_pass)) {
        //echo"admin";
        $_SESSION["userid"] = $userid;
        header("location:welcome_admin.php");
      }
    } else {
      echo "Your Login ID or Password is invalid";
    }
  }
}
?>
<html>

<head>
  <title>Login Page</title>
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

</head>

<body>
  <form method="POST" action="login.php">
    <fieldset>
      <legend>Login Form</legend><br><br>
      <table id="t1">
        <tr>
          <td><label>User Id:</label></td>
          <td>
            <input type="text" name="id" value="<?php if (isset($_COOKIE["login_id"])) {
                                                  echo $_COOKIE["login_id"];
                                                } ?>">
          </td>
        </tr>
        <tr>
          <td><label>Password:</label>
          </td>
          <td>
            <input type="password" name="password" value="<?php if (isset($_COOKIE["login_pass"])) {
                                                            echo $_COOKIE["login_pass"];
                                                          } ?>">
          </td>
        </tr>
        <tr>
          <td>
            <input type="checkbox" name="remember" <?php if (isset($_COOKIE["login_id"])) { ?> checked<?php } ?>>Remember Me
          </td>
        </tr>
        <tr>
          <td><input type="submit" value=" Login " name="submit">
          </td>
          <td>
            <h4> <a href='registration.php'>Register Here</a></h4>
          </td>
        </tr>
      </table>
    </fieldset>
  </form>

</body>

</html>