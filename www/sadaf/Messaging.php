<?php
include 'header.inc.php';
include "classes/MsgDelivery.class.php";

$user_id = intval($_SESSION['PersonID']);
$root = $_SERVER['DOCUMENT_ROOT'];
$uri = $_SERVER['PHP_SELF'];
$selectedChatID = $_SESSION['selectedChatID'];
$selectedChatName = $_SESSION['selectedChatName'];

if(isset($_GET['messageContent'])) {
    $message = $_GET['messageContent'];
    MsgDelivery::sendMessages($user_id, $selectedChatID, $message);
}

if(isset($_GET['selectedChatID']) && isset($_GET['selectedChatName'])) {
    $_SESSION['selectedChatID'] = $selectedChatID = intval($_GET['selectedChatID']);
    $_SESSION['selectedChatName'] = $selectedChatName = $_GET['selectedChatName'];
}
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

</head>
<body>
<div id="main-container" class="container">
    <div id="title-section" class="row">
        <h2 style="text-align: center;">پیام ها</h2>
    </div>

    <div id="messanger-section" class="row justify-content-center">

        <div id="friends-list" class="col-2 header">
            <h4 class="header-title">دوستان</h4>

            <form id="select-chat-form" method="get"></form>

            <div class="scroll-wrapper">
                <table class="table table-hover">
                    <tbody>
                    <?php
                    $users = MsgDelivery::getRecipients($user_id);
                    if (!isset($selectedChatID)) {
                        $_SESSION['selectedChatID'] = $selectedChatID = $users[0]->id;
                    };
                    if (!isset($selectedChatName)) {
                        $_SESSION['selectedChatName'] = $selectedChatName = htmlentities($users[0]->name) . " " . htmlentities($users[0]->lastName);
                    }
                    for ($i = 0; $i < count($users); $i++) {
                        echo "<tr><td id=". htmlentities($users[$i]->id). " onclick='selectChat(this)'>". htmlentities($users[$i]->name). " ". htmlentities($users[$i]->lastName). "</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="col-7 header d-flex flex-column">
            <?php
                echo '<h4 id="chatbox-title" class="header-title chatbox">'. htmlentities($selectedChatName). '</h4>'
            ?>

            <div id="message-section" class="flex-grow-1 chatbox">
                <div class="scroll-wrapper">
                    <div id="message-list" class="d-flex flex-column">
                        <form id="refresh-chat" method="get"></form>
                        <?php
                        $messages = MsgDelivery::getMessages($user_id, $selectedChatID);
                        for ($i = 0; $i < count($messages); $i++) {
                            if($messages[$i]->sender_id == $user_id) {
                                echo '<div class="message to"><p>'. htmlentities($messages[$i]->content). '</p></div>';
                            } else {
                                echo '<div class="message from"><p>'. htmlentities($messages[$i]->content). '</p></div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>


            <form method="get" name="form" class="input-group mb-3">
                <input type="text" class="form-control" placeholder="متن پیام" autocomplete="off" dir="rtl" name="messageContent">
                <button class="btn btn-primary" type="submit" id="button-addon2">
                    <i class="far fa-paper-plane"></i>
                </button>
            </form>

        </div>
    </div>

</div>




<script>

    let selectChatForm = $('#select-chat-form');
    let refreshChatFrom = $('#refresh-chat');

    let selectChat = (elem) => {
        selectChatForm.append(`<input type="hidden" name="selectedChatID" value="${elem.getAttribute('id')}"/>`);
        selectChatForm.append(`<input type="hidden" name="selectedChatName" value="${elem.innerText}"/>`);
        selectChatForm.submit();
    }

    //TODO: Do sth for refreshing webpage
    // setTimeout(() => {
    //     refreshChatFrom.append(`<input type="hidden" name="refreshChat"/>`);
    //     refreshChatFrom.submit();
    // }, 30000)

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>