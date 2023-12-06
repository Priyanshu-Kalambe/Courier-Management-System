<?php
session_start();
if(isset($_SESSION['uid'])){
    echo "";
    }else{
    header('location: ../login.php');
    }

?>
<?php include('header.php');
    include('../dbconnection.php');
    $idd = $_GET['sidd'];

    $qryy= "SELECT * FROM `courier` WHERE `c_id`='$idd'";
    $run= mysqli_query($dbcon,$qryy);
    $data=mysqli_fetch_assoc($run);
    $stdate = $data['date'];
    $tddate= date('Y-m-d');

    if($stdate==$tddate){
        ?>
        <h1 style="margin: 100px; text-align:center">Status >> On The Way...</h1>
        <br/>
        <div align='center'>
        <button onclick="window.location.href='trackMenu.php'" style="height: 50px;
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
                        background-position: right;">Go Back</button>
        </div>
         <?php 
    }
    else{
        ?>
        <h1 style="margin: 100px; text-align:center">Status >> Items Delivered..<br /><p>HAVE A NICE DAY</p></h1>
        <br/>
        <div align='center'>
        <button onclick="window.location.href='trackMenu.php'" style="height: 50px;
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
                        background-position: right;">Go Back</button>
        </div>
        <?php
    }
?>


