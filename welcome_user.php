<?php
include('session.php');
include('dbconnect.php');
$user_check = $_SESSION["userid"];
$ses_sql = "SELECT * FROM `user` WHERE id='$user_check' ";
$r = mysqli_query($conn, $ses_sql);
if (mysqli_num_rows($r) > 0) {
    $row = mysqli_fetch_array($r);

    $login_session = $row['user_type'];
    $login_session1 = $row['name'];
    if ($login_session == "admin") {
        header("location:login.php");
    }
}
?>
<html>

<head>
    <style>
        #box {

            background-color: white;
            margin: auto;
            width: 500px;
            height: 650px;
            padding: 50px;
            color: black;
            font-size: 20px;
            border-width: thin;
            border-style: solid;
        }
    </style>
</head>

<body>
    <div id="box">
        <h1 align="center">Welcome <?php echo $login_session1; ?>!</h1><br>
        <span>
            <h3><u> <a href='profile_user.php'>Profile</a></u></h3>
        </span><br>
        <span>
            <h3><u> <a href='change_password.php'>Change Password</a></u></h3>
        </span><br>
        <span>
            <h3><u> <a href='logout.php'>Logout</a></u></h3>
        </span>
    </div>
</body>

</html>