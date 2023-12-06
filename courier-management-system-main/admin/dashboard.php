<!-- admin dashbord page with options for admin -->

<?php
session_start();
if(isset($_SESSION['uid'])){
    echo "";
}else{
    header('location: ../login.php');
}

?>

<?php
include('head.php');
?>

<style>
    body {
        /* background-image: url('../images/5.png'); */
        background-size: cover;
        font-family: 'Poppins', sans-serif;
        }
</style>

<div class="admintitle">
    <div>
    <h5 ><a href="../index.php" style="float: left; margin-left:20px; color:#000000; text-decoration: none; font-size: 1rem;">Login As User</a></h5>
    <h5 ><a href="logout.php" style="float: right; margin-right:20px; color:#000000; text-decoration: none; font-size: 1rem;">Log Out</a></h5>
    </div>
    <h1 align='center' >Welcome To Admin Dashboard</h1>
</div>
<div align="center" style="margin-top:240px;">
<form style="position: center; font-weight:bold;font-size:1.5rem">
    
    <!-- <a href="insertdata.php">Insert Data</a><br><br> -->

    <!-- <a href="updatedata.php">Update Data</a><br><br> -->

    <a href="deletedata.php">Manage Data</a><br><br>

    <a href="deleteusers.php">Manage Users</a><br><br>
</form>

</div>
</body>
</html>