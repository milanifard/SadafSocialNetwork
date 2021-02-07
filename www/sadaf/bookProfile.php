<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Kasra Korminejad - Shiva Radmanesh - Sahar Sheikholeslami - Ali Nasiri - Mohsen Mahmoud zadeh">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./BookReads/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./BookReads/css/index.css">
</head>

<<?php
include "header.inc.php";
echo "tokhmi";
$mysql = pdodb::getInstance();
if (isset($_REQUEST['ISBN'])){
    $query = "SELECT * FROM Books WHERE ISBN=".$_REQUEST['ISBN']."";
    $res = $mysql->Execute($query);
    
    $des       = $res['description'];
    $file      = $res['file'];
    $ISBN      = $res['ISBN'];
    $title     = $res['title'];
    $author    = $res['author'];
    $noPage    = $res['numberofPage'];
    $img_path  = $res['image'];
    $publisher = $res['publisher'];
}

?> 

<body class="bg-light">
    <div class="container-fluid">

        <!-- <div class="row bg-dark header"> -->
        <div class="row bg-dark header">
            <div class="input-group  mb-3 col-3"></div>

            <div class="col-6 logo">
                Book<b id="logo-bold">Reads</b>
            </div>


            <div class="col-2" style="margin-top: auto; margin-bottom: auto;">
                <a href="../bookreads/mylibrary.php" class="profile-link">Profile</a>
            </div>

            <div class="col-1"></div>
        </div>


        <div id="page-cover" class="row">
            <img src="./BookReads/asset/images/bg_img3.jpg" style="width: 100%;">
        </div>


        <div class="row" style="margin-top: 8vw;">
            <h2 class="h2" style="margin-left: 2vw;"><?php echo $title ?></h2>
            <hr style="width: 90%; display: block;  margin-bottom: 4vw; margin-left: auto; margin-right: auto;">
        </div>
        

    </div> <!-- container div--> 
</body>
</html>