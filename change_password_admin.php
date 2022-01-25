<?php
include('session.php');
include('dbconnect.php');
$user_check = $_SESSION["userid"];
$ses_sql = "SELECT * FROM `user` WHERE id='$user_check' ";
$r = mysqli_query($conn, $ses_sql);
if (mysqli_num_rows($r) > 0) {
  $row = mysqli_fetch_array($r);

  $login_session = $row['user_type'];

  if ($login_session == "user") {
    header("location:login.php");
  }
}
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

</head>

<body>
  <form method="POST" action="change_password_admin.php">
    <input type="hidden" value=<?php echo $user_check; ?> name="id">
    <fieldset>
      <legend>Change Password</legend><br><br>
      <table id="t1">
        <tr>
          <td><label>Current Password:</label>
          </td>
          <td>
            <input type="password" name="old">
          </td>
        </tr>
        <tr>
          <td><label>New Password:</label>
          </td>
          <td>
            <input type="password" name="password">
          </td>
        </tr>
        <tr>
          <td><label> Retype New Password:</label>
          </td>
          <td>
            <input type="password" name="npassword">
          </td>
        </tr>
        <tr>
          <td><input type="submit" value=" Change " name="submit">
          </td>
          <td>
            <h4> <a href='welcome_user.php'>Home</a></h4>
          </td>
        </tr>
      </table>
    </fieldset>
  </form>

</body>

</html>
<?php
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $old = $_POST['old'];
  $new = $_POST['password'];
  $retype_new = $_POST['npassword'];
  if (empty($old)) {
    echo "current password field empty";
  } else if (empty($new)) {
    echo "new password field empty";
  } else if ($new != $retype_new) {
    echo "new password and retype new password don't match";
  } else {
    $sql = "SELECT * FROM `user` WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
      $stored_pass = $row['password'];
      if (password_verify($old, $stored_pass)) {
        //echo"old and current matches";
        $new = password_hash($new, PASSWORD_DEFAULT);
        $sql1 = "UPDATE `user` SET `password`='$new' WHERE id='$id'";
        $result1 = mysqli_query($conn, $sql1);
        echo "password changed";
      } else {
        echo "old and current doesn't match";
      }
    }
  }
}
?>