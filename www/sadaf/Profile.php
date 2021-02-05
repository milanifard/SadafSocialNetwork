<?php //include "logincheck.php"; ?>
<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>-->
<!--    <link rel="stylesheet" type="text/css" href="style.css" />-->
<!--    <title>7topics - Login Demo</title>-->
<!--</head>-->
<!--<body>-->
<!--<div id="center">-->
<!--    <div id="center-set">-->
<!--        <div id="signup">-->
<!--            <div id="signup-st">-->
<!--                <div align="center">-->
<!--                    --><?php
//                    $remarks = isset($_GET['remarks']) ? $_GET['remarks'] : '';
//                    if ($remarks==null and $remarks=="") {
//                        echo ' <div id="reg-head" class="headrg">Your Profile</div> ';
//                    }
//                    if ($remarks=='success') {
//                        echo ' <div id="reg-head" class="headrg">Registration Success</div> ';
//                    }
//                    if ($remarks=='failed') {
//                        echo ' <div id="reg-head-fail" class="headrg">Registration Failed!, Username exists</div> ';
//                    }
//                    if ($remarks=='error') {
//                        echo ' <div id="reg-head-fail" class="headrg">Registration Failed! <br> Error: '.$_GET['value'].' </div> ';
//                    }
//                    ?>
<!--                </div>-->
<!--                <form name="reg" action="execute.php" onsubmit="return validateForm()" method="post" id="reg">-->
<!--                    <table border="0" align="center" cellpadding="2" cellspacing="0">-->
<!--                        <tr>-->
<!---->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td class="t-1">-->
<!--                                <div align="left" id="tb-name">First&nbsp;Name:</div>-->
<!--                            </td>-->
<!--                            <td width="171">-->
<!--                                <div align="right" id="name">-->
<!--                                    --><?php
//
//                                    ?>
<!--                                </div>-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td class="t-1"><div align="left" id="tb-name">Last&nbsp;Name:</div></td>-->
<!--                            <td><input type="text" name="lname" id="tb-box"/></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td class="t-1"><div align="left" id="tb-name">Email:</div></td>-->
<!--                            <td><input type="text" id="tb-box" name="address" /></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td class="t-1"><div align="left" id="tb-name">Username:</div></td>-->
<!--                            <td><input type="text" id="tb-box" name="username" /></td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td class="t-1"><div align="left" id="tb-name">Password:</div></td>-->
<!--                            <td><input id="tb-box" type="password" name="password" /></td>-->
<!--                        </tr>-->
<!--                    </table>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--</body>-->
<!--</html>-->

<?php
//check if form has been submitted
if(isset($_GET['submit'])){
    $username = $_GET['username'];
}else die("You need to specify a username!")
?>
