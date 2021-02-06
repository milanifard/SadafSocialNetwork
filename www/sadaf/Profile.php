<?php
include 'header.inc.php';
include 'classes/user.class.php';
include 'classes/manage_page.php';
include 'classes/FriendRequest.class.php';

$user_id = intval($_SESSION['PersonID']);
$root = $_SERVER['DOCUMENT_ROOT'];
$uri = $_SERVER['PHP_SELF'];
$items_count = 10;
$page = 0;
$editable = true;

if (isset($_POST["uploadImage"])) {
    $img = file_get_contents($_FILES["file"]["tmp_name"]);

    // Encode the image string data into base64
    $data = base64_encode($img);
    manage_users::set_propic($user_id, $data);
}

if (isset($_POST["friend_id"])) {
    $friend_id = $_POST["friend_id"];
    if (is_numeric($friend_id)) {
        manage_friend_request::reject($friend_id);
    }
}

if (isset($_POST["confirm"])) {
    manage_users::update_data($user_id, $_POST["mail"], $_POST["desc"]);
}

if (isset($_GET["username"])) {
    $n_userid = manage_users::get_user_id($_GET["username"]);
    if ($n_userid !== $user_id) {
        $editable = false;
    }
    $selected_user_id = $n_userid;
    $user = manage_users::get_user_data($n_userid);
} else {
    $selected_user_id = $user_id;
    $user = manage_users::get_user_data($user_id);
}
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
    <div class="text-right row d-flex justify-content-center">
        <form method="POST"
              action="Profile.php"
              enctype="multipart/form-data">
            <div class="d-flex justify-content-center">
                <img id="pimage" height="160px" src="data:image/*;base64,<?= $user->image ?>"
                     class="rounded-circle border" alt="ProfileImage">

            </div>
            <?php
            if ($editable) {
                ?>
                <input type="hidden" name="MAX_FILE_SIZE" value="30000000"/>

                <input type="file" name="file" onchange="readURL(this);"/>

                <button type='submit' formmethod="post" name="uploadImage">بارگذاری</button>
                <?php
            }
            ?>

        </form>
    </div>
</div>
<form method="post" class="row d-flex justify-content-center">
    <ul class="list-group w-50" style="margin-top: 6vh; direction: rtl">
        <li class="list-group-item">
            <div class="container">
                <div class="row">
                    <div class="col-2 text-right" style="
        display: table-cell;
        height: 100%;
        direction: rtl;
        padding: 10px;
        vertical-align: middle;">نام :
                    </div>
                    <div class="col-6 text-right" style="
        display: table-cell;
        height: 100%;
        direction: rtl;
        padding: 10px;
        vertical-align: middle;">
                        <?= $user->name ?>
                    </div>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="container">
                <div class="row">
                    <div class="col-2 text-right" style="
        display: table-cell;
        height: 100%;
        direction: rtl;
        padding: 10px;
        vertical-align: middle;">نام خانوادگی :
                    </div>
                    <div class="col-6 text-right" style="
        display: table-cell;
        height: 100%;
        direction: rtl;
        padding: 10px;
        vertical-align: middle;">
                        <?= $user->lastName ?>
                    </div>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="container">
                <div class="row">
                    <div class="col-2 text-right" style="
        display: table-cell;
        height: 100%;
        direction: rtl;
        padding: 10px;
        vertical-align: middle;">نام کاربری :
                    </div>
                    <div class="col-6 text-right" style="
        display: table-cell;
        height: 100%;
        direction: rtl;
        padding: 10px;
        vertical-align: middle;">
                        <?= $user->username ?>
                    </div>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="container">
                <div class="row">
                    <div class="col-2 text-right" style="
        display: table-cell;
        height: 100%;
        direction: rtl;
        padding: 10px;
        vertical-align: middle;">ایمیل :
                    </div>
                    <div class="col-6 text-right" style="
        display: table-cell;
        height: 100%;
        direction: rtl;
        padding: 10px;
        vertical-align: middle;">
                        <?php
                        if ($editable) {
                            ?>
                            <input type="email" class="form-control" id="mailInput"
                                   aria-describedby="emailHelp" name="mail" placeholder="Enter Email" value="<?= $user->email ?>">
                            <?php
                        } else { ?>
                            <?= $user->email ?>
                            <?php
                        }
                        ?>
                    </div>

                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="container">
                <div class="row">
                    <div class="col-2 text-right" style="
        display: table-cell;
        height: 100%;
        direction: rtl;
        padding: 10px;
        vertical-align: middle;">توضیحات :
                    </div>
                    <div class="col-6 text-right" style="
        display: table-cell;
        height: 100%;
        direction: rtl;
        padding: 10px;
        vertical-align: middle;">
                        <?php
                        if ($editable) {
                            ?>
                            <textarea class="form-control" name="desc" id="description" rows="3"><?= $user->bio ?></textarea>
                            <?php
                        } else { ?>
                            <?= $user->bio ?>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-center">
            <?php
            if ($editable) {
                ?>
                <button class="btn btn-success" id="changeData" name="confirm">ثبت</button>
                <?php
            }?>
        </li>
    </ul>
</form>
<div class="row">
    <div class="w-100 col">
        <h1 class="text-center" style="margin-top: 4vh">دنبال شوندگان</h1>
        <div class=" w-100 d-flex justify-content-center" style="margin-top: 2vh">
            <div class="w-50">
                <?php
                $search_result = manage_users::get_followings($selected_user_id);
                $result = $search_result->list;
                $total_count = $search_result->total_count;


                if (count($result) > 0) {
                    ?>
                    <form id="select-user-form" method="post">
                        <div class="d-flex flex-row table-responsive">
                            <input id='friend-id' name='friend_id' type='hidden'>
                            <table id="result-table" class="table table-hover"
                                   style="direction: rtl; text-align: right">
                                <thead>
                                <tr>
                                    <th style='vertical-align: middle'>ردیف</th>
                                    <th style='vertical-align: middle'>نام کاربری</th>
                                    <th style='vertical-align: middle; text-align: center'></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $btn_type = "submit";
                                $btn_class = "btn-danger modal-btn";
                                $btn_value = "دنبال‌ نکردن";
                                for ($i = 0; $i < $total_count; $i++) {
                                    $friend = $result[$i];

                                    ?>

                                    <tr class='row-link'
                                        onclick='go_to_profile("<?= htmlentities($friend->username) ?>" , "<?= $root ?>")'>
                                        <th style='vertical-align: middle' scope='row'>
                                            <script>document.write(toPersianNumber(<?=($page * $items_count + $i + 1)?>))</script>
                                        </th>
                                        <td style='vertical-align: middle'><?= htmlentities($friend->username) ?></td>
                                        <td style='vertical-align: middle; text-align: center'>
                                            <?php
                                            if ($editable) {
                                                ?>
                                                <button type='<?= $btn_type ?>' formmethod="post"
                                                        class='btn btn-sm <?= $btn_class ?>'
                                                        onclick='unfollow(<?= $friend->id ?>)'
                                                ><?= " " . $btn_value ?>
                                                </button>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>

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
        </div>
    </div>
    <div class="w-100 col">
        <h1 class="text-center" style="margin-top: 4vh">دنبال کنندگان</h1>
        <div class=" w-100 d-flex justify-content-center" style="margin-top: 2vh">
            <div class="w-50">
                <?php
                $search_result = manage_users::get_followers($selected_user_id);
                $result = $search_result->list;
                $total_count = $search_result->total_count;


                if (count($result) > 0) {
                    ?>
                    <form id="select-user-form2" method="post">
                        <div class="d-flex flex-row table-responsive">
                            <input id='friend-id2' name='friend_id' type='hidden'>
                            <table id="result-table" class="table table-hover"
                                   style="direction: rtl; text-align: right">
                                <thead>
                                <tr>
                                    <th style='vertical-align: middle'>ردیف</th>
                                    <th style='vertical-align: middle'>نام کاربری</th>
                                    <th style='vertical-align: middle; text-align: center'></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $btn_type = "submit";
                                $btn_class = "btn-danger modal-btn";
                                $btn_value = "بلاک";
                                for ($i = 0; $i < $total_count; $i++) {
                                    $friend = $result[$i];

                                    ?>

                                    <tr class='row-link'
                                        onclick='go_to_profile("<?= htmlentities($friend->username) ?>" , "<?= $root ?>")'>
                                        <th style='vertical-align: middle' scope='row'>
                                            <script>document.write(toPersianNumber(<?=($page * $items_count + $i + 1)?>))</script>
                                        </th>
                                        <td style='vertical-align: middle'><?= htmlentities($friend->username) ?></td>
                                        <td style='vertical-align: middle; text-align: center'>
                                            <?php
                                            if ($editable) {
                                                ?>
                                                <button type='<?= $btn_type ?>' formmethod="post"
                                                        class='btn btn-sm <?= $btn_class ?>'
                                                        onclick='block(<?= $friend->id ?>)'
                                                ><?= " " . $btn_value ?>
                                                </button>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>

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
        </div>
    </div>
</div>
</div>
</body>
</html>

