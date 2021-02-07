
<?php
include "header.inc.php";
?>

<!DOCTYPE html>
<html class=>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Mybooks</title>

    <meta content="Mybook" name="description">
    <link rel="stylesheet" href="./css/font.css" media="all">
    <link rel="stylesheet" media="all" href="./css/mylibrary.css">

    <link rel="stylesheet" media="screen,print" href="./css/list.css">
    <link rel="stylesheet" media="print" href="./css/printList.css">


</head>


<body>

<script>

    function changeurl (elemnt) {

        var url = new URL(window.location.href);
        var tag = url.searchParams.get("tag");

        if (tag){
            if(elemnt.href.endsWith("?")){
                window.location = elemnt.href+"tag="+tag;
                elemnt.href = elemnt.href+"tag="+tag;
            }
            else{
                window.location = elemnt.href+"&tag="+tag;
                elemnt.href = elemnt.href+"&tag="+tag;
            }
        }
        elemnt.preventDefault();
    }
</script>
<div class="content">

    <div class="siteHeader">
        <div >
            <header>
                <div class="siteHeader__topLine  gr-box--withShadow">
                    <div class="siteHeader__contents">
                        <div class="siteHeader__topLevelItem siteHeader__topLevelItem--searchIcon">
                            <button class="gr-iconButton" aria-label="Toggle search" type="button" >

                            </button>
                        </div>
                        <a href="../sadaf/firstpage.php" class="siteHeader__logo" aria-label="Bookreads Home" title="Bookreads Home">
                            <img  src="asset/icon/logo.png" class="siteHeader__logo">
                        </a>
                        <nav class="siteHeader__primaryNavInline">
                            <ul role="menu" class="siteHeader__menuList">
                                <li class="siteHeader__topLevelItem siteHeader__topLevelItem--home">
                                    <a href="../sadaf/firstpage.php" class="siteHeader__topLevelLink" >
                                        Home
                                    </a>
                                </li>
                                <li class="siteHeader__topLevelItem">
                                    <a href="mylibrary.php" class="siteHeader__topLevelLink">
                                        My Library
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </header>
        </div>
    </div>
    <div class="siteHeaderBottomSpacer"></div>

    <div class="mainContentContainer ">
        <div class="mainContent ">
            <div class="mainContentFloat ">
                <div id="leadercol">

                    <div id="header" style="float: left">
                        <h1>
                            <a href="mylibrary.php">My Library</a>
                        </h1>
                    </div>

                    <div id="controls" class="uitext right">
                            <span class="controlGroup uitext">
                                <span class="bookMeta">
                                </span>
                            </span>
                    </div>
                    <div class="clear"></div>
                </div>

                <div id="columnContainer" class="myBooksPage">
                    <div id="leftCol" class="col reviewListLeft">
                        <div id="sidewrapper">
                            <div id="side">
                                <div id="shelvesSection">
                                    <div class="sectionHeader">
                                        Bookshelves
                                    </div>
                                    <div id="paginatedShelfList" class="stacked">
                                        <div class="user_shelf">
                                            <a title="All" class="actionLinkLite" href="mylibrary.php?" onclick="changeurl(this)">All </a>
                                        </div>
                                        <div class="userShelf">
                                            <a  title="Read" class="actionLinkLite" href="mylibrary.php?state=0" onclick="changeurl(this)">Read</a>
                                        </div>
                                        <div class="userShelf">
                                            <a  title="Currently Reading shelf" class="actionLinkLite" href="mylibrary.php?state=1" onclick="changeurl(this)">Currently Reading </a>
                                        </div>
                                        <div class="userShelf">
                                            <a title="Want to Read shelf" class="actionLinkLite" href="mylibrary.php?state=2" onclick="changeurl(this)">Want to Read</a>
                                        </div>
                                    </div>
                                    <div class="stacked">
                                    </div>
                                </div>
                                <div class="horizontalGreyDivider"></div>
                            </div>
                        </div>
                    </div>
                    <div id="rightCol" class="last col">
                        <div class="js-dataTooltip" data-use-wtr-tooltip="true">
                            <table id="books" class="table stacked"  border="1px">
                                <thead>
                                <tr id="booksHeader" class="tableList">
                                    <th alt="cover" class="header field cover" style="">
                                        <a>ISBN</a>
                                    </th>
                                    <th alt="title" class="header field title" style="">
                                        <a>Title</a>
                                    </th>
                                    <th alt="author" class="header field author" style="">
                                        <a>Author</a>
                                    </th>
                                    <th alt="avg_rating" class="header field avg_rating" style="">
                                        <a>NumberOfPages</a>
                                    </th>
                                    <th alt="num_ratings" class="header field avg_rating" style="">
                                        <a>Done Pages</a>
                                    </th>
                                    <th alt="rating" class="header field rating" style="">
                                        <a>avg rating</a>
                                    </th>

                                    <th alt="review" class="header field shelves" style="">
                                        <a>num ratings</a>
                                    </th>

                                    <th alt="date_read" class="header field date_read" style="">
                                        <a>publisher</a>
                                    </th>
                                    <th alt="date_added" class="header field date_added" style="">
                                        <a>date</a>

                                    </th>
                                </tr>
                                <?php
                                if($_REQUEST['tag']){
                                    $id = $_REQUEST['tag'];
                                    if (isset($_REQUEST['state'])){
                                        $query = "select * from connects ,books where connects.ISBN=books.ISBN and state=".$_REQUEST['state']." and connects.AccountSpecID=".$id;
                                    }else{
                                        $query = "select * from connects ,books where connects.ISBN=books.ISBN and connects.AccountSpecID=".$id;
                                    }

                                    $mysql = pdodb::getInstance();
                                    $res = $mysql-> Execute($query);
                                    while ($rec = $res->fetch())
                                    {
                                        echo "<tr>";
                                        echo "<td>";
                                        echo "<a title =";
                                        echo "ISBN class=";
                                        echo "actionLinkLite ";
                                        echo "href=BookProfile.php?ISBN=".$rec['ISBN'].">";
                                        echo $rec['ISBN'];
                                        echo "</a></td>";
                                        echo "<td>".$rec['title']."</td>";
                                        echo "<td>".$rec['author']."</td>";
                                        echo "<td>".$rec['numberofPage']."</td>";
                                        echo "<td>".$rec['donePages']."</td>";

                                        $avg_rating = "SELECT avg(rating.rating) as avg FROM books,rating where books.ISBN=rating.ISBN and rating.ISBN = '".$rec['ISBN']."'";
                                        $avg_res = $mysql->Execute($avg_rating);
                                        $ans_avg = $avg_res->fetch();
                                        echo "<td>".round($ans_avg['avg'],2)."</td>";

                                        $count_rating = "SELECT count(rating.rating) as count FROM books,rating where books.ISBN=rating.ISBN and rating.ISBN = '".$rec['ISBN']."'";
                                        $count_res = $mysql->Execute($count_rating);
                                        $cnt_avg = $count_res->fetch();
                                        echo "<td>".$cnt_avg['count']."</td>";
                                        echo "<td>".$rec['publisher']."</td>";
                                        echo "<td>".$rec['dates']."</td>";
                                        echo "</tr>";

                                    }
                                }

                                ?>
                                </thead>
                            </table>
                        </div>
                        <div class="clear"></div>

                    </div>
                    <div class="clear"></div>
                </div>

            </div>


        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>


<div class="clear"></div>

<div style="margin-top: 10px">
    <?php
    $query = "select * from Connects where state=0 and AccountSpecID=1";
    $mysql = pdodb::getInstance();
    $res = $mysql-> Execute($query);
    while ($rec = $res->fetch())
    {
        echo $rec['ISBN'];
    }
    ?>
</div>
</body>
</html>
