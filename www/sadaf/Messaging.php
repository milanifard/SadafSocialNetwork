<?php
include 'header.inc.php';
include "classes/MsgDelivery.class.php";

$user_id = intval($_SESSION['PersonID']);
$root = $_SERVER['DOCUMENT_ROOT'];
$uri = $_SERVER['PHP_SELF'];
?>

<!doctype html>
<html lang="fa">
<head>
    <!-- Required meta tags -->
    <title>پیام ها</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.15.2/css/all.css">
    <link rel="stylesheet" href="css/messaging-style.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/search-users.js"></script>
    <script src="js/string-util.js"></script>

</head>
<body>
<div id="main-container" class="container">
    <div id="title-section" class="row">
        <h2 style="text-align: center;">پیام ها</h2>
    </div>

    <div id="messanger-section" class="row justify-content-center">

        <div id="friends-list" class="col-2 header">
            <h4 class="header-title">دوستان</h4>

            <div class="scroll-wrapper">
                <table class="table table-hover">
                    <tbody>
                    <?php
                    $users = MsgDelivery::getRecipients($user_id);
                    for ($i = 0; $i < count($users); $i++) {
                        echo "<tr><td id=". htmlentities($users[$i]->id). ">". htmlentities($users[$i]->name). " ". htmlentities($users[$i]->lastName). "</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="col-7 header d-flex flex-column">
            <h4 id="chatbox-title" class="header-title chatbox">علی گلدانی</h4>

            <div id="message-section" class="flex-grow-1 chatbox">
                <div class="scroll-wrapper">
                    <div id="message-list" class="d-flex flex-column">
                        <?php
                        $messages = MsgDelivery::getConversation($user_id, 2);
                        for ($i = 0; $i < count($messages); $i++) {
                            if($messages[$i]->sender_id == $user_id) {
                                echo '<div class="message to">'. htmlentities($messages[$i]->content). '</div>';
                            } else {
                                echo '<div class="message from">'. htmlentities($messages[$i]->content). '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3 chatbox">
                <input type="text" class="form-control " placeholder="متن پیام" aria-label="Recipient's username" aria-describedby="button-addon2" dir="rtl">
                <button class="btn btn-primary" type="submit" id="button-addon2">
                    <i class="far fa-paper-plane"></i>
                </button>
            </div>

        </div>
    </div>

</div>



<!-- <h1>Hello, world!</h1> -->

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
-->
</body>
</html>