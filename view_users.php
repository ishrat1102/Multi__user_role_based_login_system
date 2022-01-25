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

        table {
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <div id="box">
        <table border="1">
            <tr>
                <td align="center" colspan="4"> Profile

                </td>
            </tr>
            <tr>
                <td align="left"> ID

                </td>

                <td align="left"> NAME

                </td>

                <td align="left"> EMAIL

                </td>

                <td align="left"> USER TYPE

                </td>
            </tr>
            <?php
            $sql = "SELECT * FROM `user` ";
            $result = mysqli_query($conn, $sql);
            $total = mysqli_num_rows($result);
            if ($total != 0) {
                while (($fetch = mysqli_fetch_assoc($result))) { ?>

                    <tr>
                        <td align="left">
                            <?php echo $fetch['id']; ?>
                        </td>


                        <td align="left">
                            <?php echo $fetch['name']; ?>
                        </td>

                        <td align="left">
                            <?php echo $fetch['email']; ?>
                        </td>

                        <td align="left">
                            <?php echo $fetch['user_type']; ?>
                        </td>
                    </tr>

            <?php }
            } else {
                //  echo"total has  no records";
            }
            ?>
            <tr>
                <td align="right" colspan="4">
                    <span>
                        <h3><u> <a href='welcome_admin.php'>Go Home</a></u></h3>
                    </span>


                </td>
            </tr>
        </table>
    </div>
</body>

</html>