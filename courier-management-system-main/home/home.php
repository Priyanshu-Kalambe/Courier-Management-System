<?php

session_start();
if(isset($_SESSION['uid'])){
    echo "";
    }else{
    header('location: ../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
    <style>
        .content{
            color: rgb(36, 36, 38);
            font-family: 'Roboto Mono', monospace;
        }
        .content{
            display: flex;
            flex-direction: column;
            padding: 3px 200px;
            justify-content: center;
            align-items: center;
            height: 477px;
        }
        
        
        .content::before{
            content: " ";
            background:url('../images/bg.avif') no-repeat center center/cover;
            position: absolute;
            height: 700px;
            top: 0px;
            left: 0px;
            width: 100%;
            z-index: -1;
            opacity: 0.75;
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?>
    <div align="center" class="content"><br><br><br><br>
        <h1>COURIER MANAGEMENT SYSTEM</h1>
        <h3>The fastest courier service of India</h3><br><br>
        <h1>DBMS Project</h1>
        <h4>By Priyanshu & Kaushik</h4>
    </div>
</body>
</html>