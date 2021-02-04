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
    <title>جستجوی افراد</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.15.2/css/all.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/search-users.js"></script>
    <script src="js/string-util.js"></script>
</head>

<body>

<div id="main-container" class="container">
    <div id="search-section" class="d-flex flex-row justify-content-around">
        <div class="d-flex flex-column col-sm-4">
            <div class="form-group">
                <form>
                    <label for="search-input" class="text d-flex justify-content-center" style="direction: rtl">
                        <h4>
                            جستجوی بر اساس نام کاربری
                        </h4>
                    </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input id="search-input" name="username" type="text" class="form-control" placeholder="username"
                            <?php
                            if (isset($_REQUEST["username"])) {
                                echo "value='".$_REQUEST["username"]."'";
                            }
                            ?>
                        >
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="result-section" class="d-flex flex-column justify-content-around text">
        <?php
        if (isset($_REQUEST["username"])) {
            ?>
            <div class="d-flex flex-row text float-right" style="direction: rtl">
                <h5>
                    نتایج جستجو برای
                    <?php
                    echo $_REQUEST["username"];
                    ?>
                    :
                </h5>
            </div>
            <?php
            $search_result = manage_users::search_by_username($_REQUEST["username"], $user_id, $items_count, $page * $items_count);
            $result = $search_result->list;
            $total_count = $search_result->total_count;

            if (count($result) > 0) {
                ?>
                <form id="select-user-form" method="post">
                    <div class="d-flex flex-row table-responsive">
                        <input id='selected-user' name='selected_user' type='hidden'>
                        <input id='request-status' name='request_status' type='hidden'>
                        <table id="result-table" class="table table-hover" style="direction: rtl; text-align: right">
                            <thead>
                            <tr>
                                <th style='vertical-align: middle'>ردیف</th>
                                <th style='vertical-align: middle'>نام و نام خانوادگی</th>
                                <th style='vertical-align: middle'>ایمیل</th>
                                <th style='vertical-align: middle'>نام کاربری</th>
                                <th style='vertical-align: middle; text-align: center'>دنبال کردن</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            for ($i = 0; $i < count($result); $i++) {
                                $user = $result[$i];

                                $btn_type = "submit";
                                $btn_class = "btn-outline-primary";
                                $btn_value = "دنبال کردن";
                                $btn_icon = "fa-user-plus";
                                if ($user->friend_status == 0) {
                                    $btn_type = "button";
                                    $btn_class = "btn-secondary modal-btn";
                                    $btn_value = "درخواست";
                                    $btn_icon = "fa-clock";
                                } else if ($user->friend_status == 1) {
                                    $btn_type = "button";
                                    $btn_class = "btn-success modal-btn";
                                    $btn_value = "دنبال‌شده";
                                    $btn_icon = "fa-check";
                                }

                                ?>

                                <tr class='row-link' onclick='go_to_profile("<?=htmlentities($user->username)?>" , "<?=$root?>")'>
                                    <th style='vertical-align: middle' scope='row'> <script>document.write(toPersianNumber(<?=($page * $items_count + $i + 1)?>))</script></th>
                                    <td style='vertical-align: middle'><?=htmlentities($user->name) . " " . htmlentities($user->lastName)?></td>
                                    <td style='vertical-align: middle'><?=htmlentities($user->email)?></td>
                                    <td style='vertical-align: middle'><?=htmlentities($user->username)?></td>
                                    <td style='vertical-align: middle; text-align: center'>
                                        <button type='<?=$btn_type?>' formmethod="post" class='btn btn-sm <?=$btn_class?>'
                                            <?php
                                            if ($user->friend_status == -1) {
                                                ?>
                                                onclick='request_to_follow("<?=$user->username?>" , "<?=$user->id?>", <?=$user->friend_status?>)'
                                                <?php
                                            } else {
                                                ?>
                                                data-toggle="modal" data-target="#confirm-modal" data-username="<?=$user->username?>" data-id="<?=$user->id?>" data-status="<?=$user->friend_status?>"
                                                <?php
                                            }
                                            ?>
                                        ><i class='fa <?=$btn_icon?>'></i><?=" ".$btn_value?>
                                        </button>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>

                            <tr class="no-hover">
                                <td colspan="5">
                                    <div style="display: flex; justify-content: center">
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
                                </td>
                            </tr>

                            </tbody>
                        </table>
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

