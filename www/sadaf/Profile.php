<?php
include 'header.inc.php';
include 'classes/user.class.php';
include 'classes/manage_page.php';

$user_id = intval($_SESSION['PersonID']);
$root = $_SERVER['DOCUMENT_ROOT'];
$uri = $_SERVER['PHP_SELF'];
$items_count = 10;
$page = 0;

if(isset($_POST["uploadImage"])) {
    $img = file_get_contents($_FILES["file"]["tmp_name"]);

    // Encode the image string data into base64
    $data = base64_encode($img);
    manage_users::set_propic($user_id, $data);
}

//echo $user_id;
$user = manage_users::get_user_data($user_id);

?>
<!DOCTYPE html>
<html>
<head>
    <meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
    <title>پروفایل</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.15.2/css/all.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/profile.js"></script>
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
    <h1 class="text-center" style="margin-bottom: 3vh">پروفایل</h1>
    <div class="text-right row">
        <div class="col-3"></div>
        <div class="col-6" style="padding-bottom: 20px " dir="rtl">
            <form method="POST"
                  action="Profile.php"
                  enctype="multipart/form-data">
                    <div class="justify-content-center">
                        <img id="pimage" height="160px" src="data:image/*;base64,<?=$user->image?>" class="rounded-circle border" alt="ProfileImage">

                    </div>

                    <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />

                    <input type="file" name="file" onchange="readURL(this);"/>

                    <button type='submit' formmethod="post" class='btn btn-sm btn-outline-primary' name="uploadImage">بارگذاری</button>

            </form>
            <div class="row">
                <div class="col-4 border">نام :</div>
                <div class="col-8 border">
                    <?= $user->name ?>
                </div>
            </div>
            <div class="row">
                <div class="col-4 border">نام خانوادگی :</div>
                <div class="col-8 border">
                    <?= $user->lastName ?>
                </div>
            </div>
            <div class="row">
                <div class="col-4 border">نام کاربری :</div>
                <div class="col-8 border">
                    <?= $user->username ?>
                </div>
            </div>
            <div class="row">
                <div class="col-4 border">ایمیل :</div>
                <div class="col-8 border">
                    <?= $user->email ?>
                </div>
            </div>
            <div class="row">
                <div class="col-4 border">توضیحات :</div>
                <div class="col-8 border">
                    <?= $user->bio ?>
                </div>
            </div>
        </div>
        <div class="col-3"></div>

    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <?php
            $search_result = manage_users::get_friends($user_id);
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
                                <th style='vertical-align: middle'>نام کاربری</th>
                                <th style='vertical-align: middle; text-align: center'>دنبال نکردن</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $btn_type = "button";
                            $btn_class = "btn-success modal-btn";
                            $btn_value = "دنبال‌ نکردن";
                            for ($i = 0; $i < $total_count; $i++) {
                                $friend = $result[$i];

                                ?>

                                <tr class='row-link'
                                    onclick='go_to_profile("<?= htmlentities($friend) ?>" , "<?= $root ?>")'>
                                    <th style='vertical-align: middle' scope='row'>
                                        <script>document.write(toPersianNumber(<?=($page * $items_count + $i + 1)?>))</script>
                                    </th>
                                    <td style='vertical-align: middle'><?= htmlentities($friend) ?></td>
                                    <td style='vertical-align: middle; text-align: center'>
                                        <button type='<?= $btn_type ?>' formmethod="post"
                                                class='btn btn-sm <?= $btn_class ?>'

                                                data-toggle="modal" data-target="#confirm-modal"
                                                data-username="<?= $friend ?>" data-id="<?= $user->id ?>"
                                                data-status="<?= $user->friend_status ?>"

                                        ><?= " " . $btn_value ?>
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
                                                <li class="page-item <?php if ($page == 0) echo 'disabled' ?>">
                                                    <a class="page-link"
                                                       href="<?= manage_page::get_page_url($uri, $_GET, $page - 1) ?>"
                                                       tabindex="-1">قبلی</a>
                                                </li>

                                                <?php
                                                $pages = ceil($total_count / $items_count);
                                                for ($i = 0; $i < $pages; $i++) {
                                                    if ($i == $page) {
                                                        echo "<li class='page-item active'><div class='page-link'>" . ($i + 1) . "</div></li>";
                                                    } else {
                                                        $page_uri = manage_page::get_page_url($uri, $_GET, $i);
                                                        echo "<li class='page-item'><a class='page-link' href='" . $page_uri . "'>" . ($i + 1) . "</a></li>";
                                                    }
                                                }
                                                ?>

                                                <li class="page-item <?php if ($page == $pages - 1) echo 'disabled' ?>">
                                                    <a class="page-link"
                                                       href="<?= manage_page::get_page_url($uri, $_GET, $page + 1) ?>">بعدی</a>
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
                        هیچ دوستی برای
                        <?php
                        echo $user->username;
                        ?>
                        یافت نشد!
                    </h6>
                </div>
                <?php

            }
            ?>
        </div>
        <div class="col-3"></div>
    </div>
</div>
</body>
</html>

