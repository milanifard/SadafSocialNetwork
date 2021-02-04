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

if (isset($_POST["selected_user"])) {
    $selected_user = $_POST["selected_user"];
    $request_status = $_POST["request_status"];
    if (is_numeric($selected_user)) {
        if ($request_status == -1) {
            manage_friend_request::add($user_id, $selected_user);
        } else if ($request_status >= 0) {
            manage_friend_request::remove($user_id, $selected_user);
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
    <script src="js/search-users.js"></script>
    <script src="js/string-util.js"></script>

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
        $search_result = manage_users::get_my_friend_requests($user_id, $items_count, $page * $items_count);
        $result = $search_result->list;
        $total_count = $search_result->total_count;

        if (count($result) > 0) {
            ?>
            <form id="select-user-form" method="post">
                <div class="d-flex flex-row table-responsive">
                    <input id='selected-user' name='selected_user' type='hidden'>
                    <input id='request-status' name='request_status' type='hidden'>
                    <div class="container">
                        <div class="row" style="margin-top: 2vh">
                            <ul class="list-group w-100">
                                <?php
                                for ($i = 0; $i < count($result); $i++) {
                                    $req = $result[$i];
                                    ?>
                                    <li class="list-group-item">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-2">C</div>
                                                <div class="col-2">C</div>
                                                <div class="text-right col-8" style="direction: rtl"><?=htmlentities($req->fromName) . ' درخواست دنبال کردن شما را داده است.'?></div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
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
            <div class="d-flex flex-row text float-right" style="direction: rtl">
                <h6>
                    هیچ نتیجه‌ای برای
                    <?php
                    echo $_REQUEST["username"];
                    ?>
                    یافت نشد!
                </h6>
            </div>
            <?php
        }
        ?>
    </div>

    <div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="confirm-modal-area" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text">
                <div class="modal-header" style="text-align: right; direction: rtl">
                    <h5 class="modal-title text-bold" id="modal-label">تایید درخواست</h5>
                </div>
                <div class="modal-body">
                    <p id="modal-message" style="text-align: right; direction: rtl"></p>
                </div>
                <div class="modal-footer" style="direction: rtl">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button>
                    <button type="submit" form="select-user-form" class="btn btn-primary">&nbsp بــلـه &nbsp</button>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

