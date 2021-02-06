<?php
include 'header.inc.php';

include 'classes/user.class.php';
include 'classes/FriendRequest.class.php';
include 'classes/manage_page.php';

$user_id = intval($_SESSION['PersonID']);
$root = $_SERVER['DOCUMENT_ROOT'];
$uri = $_SERVER['PHP_SELF'];
$items_count = 10;
$page = 0;

if (isset($_REQUEST["page"])) {
    if (is_numeric($_REQUEST["page"])) {
        $page = $_REQUEST["page"];
    }
}

if (isset($_POST["selected_req"])) {
    $selected_req = $_POST["selected_req"];
    $selected_action = $_POST["selected_action"];
    if (is_numeric($selected_req)) {
        if ($selected_action == 1) {
            manage_friend_request::accept($selected_req);
        } else if ($selected_action == 0) {
            manage_friend_request::reject($selected_req);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fa">

<head>
    <title>اعلانات</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.15.2/css/all.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/notif.js"></script>

    <style>
        @font-face {
            font-family: 'Vazir Regular';
            src: url("fonts/Vazir-Regular.ttf") format("truetype");
        }

        @font-face {
            font-family: 'Vazir Bold';
            src: url("fonts/Vazir-Bold.ttf") format("truetype");
        }

        * {
            font-family: "Vazir Regular";
        }
    </style>
</head>

<body>

<div id="main-container" class="container">
    <h1 class="text-center">اعلانات</h1>

    <div id="result-section" class="d-flex flex-column justify-content-around text">
        <?php
        $search_result = manage_users::get_events($user_id, $items_count, $page * $items_count);
        $result = $search_result->list;
        $total_count = $search_result->total_count;

        if (count($result) > 0) {
            ?>
            <form id="select-user-form" method="post">
                <div class="d-flex flex-row table-responsive">
                    <input id='selected-req-id' name='selected_req' type='hidden'>
                    <input id='selected-req-action' name='selected_action' type='hidden'>
                    <div class="container">
                        <div class="row" style="margin-top: 2vh">
                            <ul class="list-group w-100">
                                <?php
                                for ($i = 0; $i < count($result); $i++) {
                                    $req = $result[$i];
                                    if ($req->status == 0){?>
                                    <li class="list-group-item">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col d-flex justify-content-center"><button type="submit" formmethod="post" class="btn btn-primary w-75" onclick='accept_req("<?=$req->friendRequestId?>")'>تایید</button></div>
                                                <div class="col d-flex justify-content-center"><button type="submit" formmethod="post" class="btn btn-danger w-75" onclick='reject_req("<?=$req->friendRequestId?>")'>رد</button></div>
                                                <div class="col-8 text-right" style="
        display: table-cell;
        height: 100%;
        direction: rtl;
        padding: 10px;
        vertical-align: middle;"><div><?=htmlentities($req->fromName) . ' درخواست دنبال کردن شما را داده است.'?></div></div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                    } else {
                                        ?>
                                        <li class="list-group-item">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-8 text-right" style="
        display: table-cell;
        height: 100%;
        direction: rtl;
        padding: 10px;
        vertical-align: middle;"><div><?=htmlentities($req->fromName) . ' درخواست شما را قبول کرده است.'?></div></div>
                                                </div>
                                            </div>
                                        </li>
                                <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>

                        <div class="row" style="margin-top: 2vh">
                            <div class="w-100" style="display: flex; justify-content: center">
                            <nav aria-label="page navigation">
                                <ul class="pagination">
                                    <li class="page-item <?php if ($page == 0) echo 'disabled'?>">
                                        <a class="page-link" href="<?=manage_page::get_page_url($uri, $_GET, $page - 1)?>" tabindex="-1">قبلی</a>
                                    </li>

                                    <?php
                                    $pages = ceil($total_count / $items_count);
                                    for ($i = 0; $i < $pages; $i++) {
                                        if ($i == $page) {
                                            echo "<li class='page-item active'><div class='page-link'>" . ($i + 1) . "</div></li>";
                                        } else {
                                            $page_uri = manage_page::get_page_url($uri, $_GET, $i);
                                            echo "<li class='page-item'><a class='page-link' href='".$page_uri."'>" . ($i + 1) . "</a></li>";
                                        }
                                    }
                                    ?>

                                    <li class="page-item <?php if ($page == $pages - 1) echo 'disabled'?>">
                                        <a class="page-link" href="<?=manage_page::get_page_url($uri, $_GET, $page + 1)?>">بعدی</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php
        } else {
            ?>
            <div class="text-center" style="direction: rtl">
                <h6>
                    هیچ رویدادی یافت نشد!
                </h6>
            </div>
            <?php
        }
        ?>
    </div>

</div>

</body>
</html>

