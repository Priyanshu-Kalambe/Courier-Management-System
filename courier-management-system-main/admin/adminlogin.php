<!-- admin logIn page and login logic -->
<?php

session_start();
if (isset($_SESSION['uid'])) {

    header('location: dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="/css/style-copy.css"> -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <title>Admin login</title>
    <style>
        body{
    background-image: url("line-bg.jpg");
    font-family: 'Poppins', sans-serif;
}

.whole{
    height: 44rem;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container{
    /* border: 2px solid gray; */
    height: 500px;
    width: 430px;
    background-color: rgb(251, 251, 251);
    box-shadow: 2px 5px 10px rgb(189, 185, 185);
    display: flex;
    flex-direction: column;
    align-items: center;
    border-radius: 5px;
}

/** box1**/
.box1{
    /* border: 2px solid grey; */
    height: 9.5rem;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: center;
}

.box1 img{
    width: 40px;
    height: 40px;
    color: #cad0d9;
}

.box1 h2{
    font-family: 'Poppins', sans-serif;
    font-size: 2rem;
    margin-top: 15px;
    margin-bottom: 10px;
    color: #4c515b;
    letter-spacing: 2px;
}

/**box2**/
.box2{
    /* border: 2px solid black; */
    width: 100%;
    height: 30%;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    padding-bottom: 50px;
}

.box2 input{
    border-top: none;
    border-right: none;
    border-left: none;
    border-bottom: 1px solid #8DA8DC;
    margin-left: 40px;
    margin-right: 40px;
    margin-top: 30px;
    background-color: rgb(251, 251, 251);
    height: 50px;
    outline: none;
    color: #4c515b;
    font-family: 'Poppins', sans-serif;
    font-size: 1rem;
    font-weight: 600;
}

.box2 input:focus{
    border-bottom: 1px solid #4c5360;
    color: #4c5360;
}

.box2 input::placeholder{
    font-family: 'Poppins', sans-serif;
    padding: 3px;
    font-size: 1rem;
}

/**bbox3**/

.box3{
    /* border: 2px solid grey; */
    display: flex;
    width: 80%;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.remember{
    display: flex;
    align-items: center;
    justify-content: center;
    /* border: 2px solid grey; */
    font-size: 0.82rem;
    color: #4c5360;
    font-weight: 600;
}

.forgot-pass{
    display: flex;
    align-items: center;
}

.forgot-pass a{
    text-decoration: none;
    font-size: 0.80rem;
    color:#be1616;
    font-weight: 600;
}

.forgot-pass a:hover{
    color: #db0404;
}

/**box4**/
.box4{
    height: 90px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    /* border: 2px solid black; */
}

.box4 input{
    /* text-decoration: none; */
    height: 50px;
    width: 300px;
    border: none;
    border-radius: 25px;
    background-image: linear-gradient(to right, #00d9b5, #0971ae, #7252d0);
    background-size: 200%;
	font-size: 1.2rem;
    font-weight: 700;
	color: #fff;
    letter-spacing: 2px;
	font-family: 'Poppins', sans-serif;
	text-transform: uppercase;
    transition: .5s;
    background-position: right;
}

.box4 input:hover{
    background-position: left;
    cursor: pointer;
}

/**box5**/
.box5{
    /* border: 2px solid grey; */
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.85rem;
    font-family: 'Poppins', sans-serif;
    color:#4c5360;
    font-weight: 700;
}

.box5 a{
    text-decoration: none;
    font-weight: 700;
    color:#7252d0;
}
    </style>
</head>
<body>
    <div class="whole">
        <form action="adminlogin.php" method="POST" style="margin: auto;" autocomplete="off">
            <div class="container">
                <div class="box1 box">
                    <!-- <i class="fa-solid fa-user" style="color: #0f3371;"></i> -->
                    <img src="user-solid.svg" alt="img">
                    <!-- <i class="fa-solid fa-angle-down"></i> -->
                    <h2>WELCOME ADMIN</h2>

                </div>

                <div class="box2">
                    <input type="email" name="uname" required placeholder="Email id">
                    <input type="password" name="pass" required placeholder="Password">
                </div>

                <div class="box4">
                    <input type="submit" name="login" value="Login" style="cursor: pointer;">
                </div>

                <div class="box5">
                    <a href="../index.php">Back Home</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

<?php

include('../dbconnection.php');
if (isset($_POST['login'])) {
    $ademail = $_POST['uname'];
    $password = $_POST['pass'];
    $qry = "SELECT * FROM `adlogin` WHERE `email`='$ademail' AND `password`='$password'";
    $run = mysqli_query($dbcon, $qry);
    $row = mysqli_num_rows($run);
    if ($row < 1) {
        ?>
        <script>
            alert("Only admin can login..");
            window.open('adminlogin.php', '_self');
        </script><?php
    }
    else {
        $data = mysqli_fetch_assoc($run);
        $id = $data['a_id'];
        $_SESSION['uid'] = $id;
        header('location:dashboard.php');
    }
}
?>