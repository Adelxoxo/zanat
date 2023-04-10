<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="zanat.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/alatsi-2" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/vl-newparis-headline" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>zanat.com</title>
</head>
<body>

    <div id="header">
        <img src="img/zanatdotcom.png" width="150" alt="Zanatlogo">
    </div>

    <!-- Nav Bar -->
    <div class="navbar">
        <a href="index.php">Početna</a>
        <a href="#about">O nama</a>
        <?php 
        if(!isset($_SESSION['user'])) { ?>
            <!--Linkovi su prikazani samo kada korisnik nije ulogovan-->
            <a href="login.php">Prijava</a>
            <a href="register.php">Registracija</a>
        <?php } else { ?>
            <!--Linkovi su prikazani kada je kontakt ulogovan-->
            <a href="dashboard.php">Dobrodosli, <b style="color: red;"><?php echo $_SESSION['user']['name']; ?></b></a>
            <a href="logout.php">Logout</a>
        <?php } ?>

    </div>
