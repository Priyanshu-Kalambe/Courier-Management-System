<?php

include('dbconnection.php');
session_start();
$gd = $_SESSION['gid'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Pswd</title>
    <style>
        body {
            /* background-image: url('images/Reset.jpg');
            background-repeat: no-repeat;
            background-size: cover; */
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <form action="reset.php" method="POST">
        <table border="0px solid" style="margin-left: auto; margin-right:auto; margin-top:70px; font-weight:bold;border-spacing: 50px 30px;">
            <th colspan="3" style="text-align: center;font-size:35px; width: 300px; height: 70px;font-weight:bold;">Set your new password</th>
            <tr>
                <td colspan="2" style="font-size: 20px;font-weight:bold">New Password:</td>
                <td><input type="password" name="pass" placeholder="Password" style="font-size: 20px;font-weight:bold" required /></td>
            </tr>

            <tr>
                <td colspan="3" align="center">
                    <input type="submit" name="submit" value="Update" style="height: 50px;
                        width: 200px;
                        border: none;
                        border-radius: 25px;
                        background-image: linear-gradient(to right, #00d9b5, #0971ae, #7252d0);
                        background-size: 200%;
                        font-size: 1rem;
                        font-weight: 700;
                        color: #fff;
                        letter-spacing: 2px;
                        font-family: 'Poppins', sans-serif;
                        text-transform: uppercase;
                        transition: .5s;
                        background-position: right;" />
                </td>
            </tr>
        </table>

    </form>
</body>

</html>

<?php

if (isset($_POST['submit'])) {

    $password = $_POST['pass'];

    $qryd = "UPDATE `login` SET `password` = '$password' WHERE `u_id` = '$gd'";
    $run = mysqli_query($dbcon, $qryd);

    if ($run == true) {
        ?> <script>
            alert('Password Updated Successfully :)');
            window.open('logout.php', '_self');
            </script>
        <?php
    }
}
?>