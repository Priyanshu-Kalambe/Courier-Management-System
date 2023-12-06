<!-- for 'courier' navbar, courier placing page -->
<?php
session_start();
if (isset($_SESSION['uid'])) {
    echo "";
} else {
    header('location: ../index.php');
}

?>
<?php
include('header.php');
$email = $_SESSION['emm'];
$uid = $_SESSION['uid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nova+Square&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
    <style>
        body {
            /* background-image: url('../images/1920_1080.jpg'); */
            background-repeat: no-repeat;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <form action="courierMenu.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div style="overflow-x:auto;">
            <table style="margin: auto; border-spacing: 5px 15px;">
                <th colspan="4" style="text-align: center; background-color:#c7f9cc; width: 140px; height: 50px;
                border-radius: 5px; font-size: 1.5rem;
                margin-top: 10px;">Fill The Details Of Sender & Receiver</th>
                <tr>
                    <td colspan="4" style="text-align: center;">
                        <hr>
                    </td>
                </tr>
                <tr style="text-align: center;">
                    <th colspan="2">SENDER</th>
                    <th colspan="2">RECEIVER</th>
                </tr>
                <tr>
                    <td colspan="4">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <th colspan="2"></th>
                    <th colspan="2"></th>
                </tr>
                <tr style="text-align: center; ">
                    <td>Name:</td>
                    <td><input type="text" name="sname" placeholder="Sender name" required></td>
                    <!-- <td>Name :</td> -->
                    <th></th>
                    <td><input type="text" name="rname" placeholder="Receiver name" required></td>
                </tr>
                <tr>
                    <td colspan="4">
                        <hr>
                    </td>
                </tr>
                <tr style="text-align: center;">
                    <td>Email:</td>
                    <td><input type="text" name="semail" value="<?php echo $email; ?>" readonly></td>

                    <td></td>
                    <td><input type="text" name="remail" placeholder="Receiver mail" required></td>
                </tr>
                <tr>
                    <td colspan="4">
                        <hr>
                    </td>
                </tr>
                <tr style="text-align: center;">
                    <td>Phone No:</td>
                    <td><input type="tel" name="sphone" placeholder="Sender number" pattern="[1-9]{1}[0-9]{9}" required></td>

                    <td></td>
                    <td><input type="tel" name="rphone" placeholder="Receiver number" pattern="[1-9]{1}[0-9]{9}" required></td>
                </tr>
                <tr>
                    <td colspan="4">
                        <hr>
                    </td>
                </tr>
                <tr style="text-align: center;">
                    <td>Address:</td>
                    <td><input type="textfield" name="saddress" placeholder="Sender address" required></td>

                    <td></td>
                    <td><input type="textfield" name="raddress" placeholder="Receiver address" required></td>
                </tr>
                <tr style="text-align: center;">
                    <td colspan="4">
                        <hr>
                    </td>
                </tr>
                <tr style="text-align: center;">
                    <td>Weight:</td>
                    <td><input type="number" name="wgt" placeholder="Weight (kg)" required></td>
                    <tr></tr>
                    <td style="text-align: center;">Payment Id:</td>
                    <td style="text-align: center;"><input type="number" name="billno" placeholder="Payment id" required></td>
                </tr>
                <tr style="text-align: center;">
                    <!-- <td>Date:</td><td><input type="date" name="date"></td> -->
                    <!-- <td>Date:</td>
                    <td><input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" readonly /></td> -->
                    <tr></tr>
                    <td style="text-align: center;">Items Image:</td>
                    <td style="text-align: center;"><input type="file" name="simg" ></td>
                </tr>
                <tr style="margin-top: 10px;">
                    <td colspan="4" align="center"><input type="submit" name="submit" value="Place Order" style="height: 50px;
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
                        background-position: right;"></td>
                </tr>
            </table>
        </div>
    </form>
</body>

</html>

<?php

if (isset($_POST['submit'])) { //if we'll not give this,it'will submit from with zero values.

    include('../dbconnection.php');

    $sname = $_POST['sname'];
    $rname = $_POST['rname'];
    $semail = $_POST['semail'];
    $remail = $_POST['remail'];
    $sphone = $_POST['sphone'];
    $rphone = $_POST['rphone'];
    $sadd = $_POST['saddress'];
    $radd = $_POST['raddress'];
    $wgt = $_POST['wgt'];
    $billn = $_POST['billno'];
    $originalDate = $_POST['date'];
    $newDate = date("Y-m-d", strtotime($originalDate));
    $imagenam = $_FILES['simg']['name'];
    $tempnam = $_FILES['simg']['tmp_name'];

    move_uploaded_file($tempnam, "../dbimages/$imagenam");

    $qry = "INSERT INTO `courier` (`sname`, `rname`, `semail`, `remail`, `sphone`, `rphone`, `saddress`, `raddress`, `weight`, `billno`, `image`,`date`,`u_id`) VALUES ('$sname', '$rname', '$semail', '$remail', '$sphone', '$rphone', '$sadd', '$radd', '$wgt', '$billn', '$imagenam', '$newDate','$uid');";
    $run = mysqli_query($dbcon, $qry);

    // $trackqry= "INSERT INTO `track` (`u_id`, `c_id`) VALUES ('$uid', 'LAST_INSERT_ID()')";
    //$runtrack = mysqli_query($dbcon, $trackqry);

    if ($run == true) {

    ?> <script>
            alert('Order Placed Successfully :)');
            window.open('courierMenu.php', '_self');
        </script>
    <?php
    }
}

?>