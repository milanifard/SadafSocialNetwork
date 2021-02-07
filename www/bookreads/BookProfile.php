
<?php
include "header.inc.php";

//    HTMLBegin();
$title = "title name";
$image = "https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1459795105l/12996._SY475_.jpg";
$author_name = "author name";
$numberOfPages = 0;
$publisher = "publisher name";
$ISBN = "000000000";
$average_rating = 3.9;
$description = "In Othello, Shakespeare creates a powerful drama of a marriage that begins with fascination (between the exotic Moor Othello and the Venetian lady Desdemona), with elopement, and with intense mutual devotion and that ends precipitately with jealous rage and violent deaths. He sets this story in the romantic world of the Mediterranean, moving the action from Venice to the island of Cyprus and giving it an even more exotic coloring with stories of Othello's African past. Shakespeare builds so many differences into his hero and heroine—differences of race, of age, of cultural background—that one should not, perhaps, be surprised that the marriage ends disastrously. But most people who see or read the play feel that the love that the play presents between Othello and Desdemona is so strong that it would have overcome all these differences were it not for the words and actions of Othello's standard-bearer, Iago, who hates Othello and sets out to destroy him by destroying his love for Desdemona. As Othello succumbs to Iago's insinuations that Desdemona is unfaithful, fascination—which dominates the early acts of the play—turns to horror, especially for the audience. We are confronted by spectacles of a generous and trusting Othello in the grip of Iago's schemes; of an innocent Desdemona, who has given herself up entirely to her love for Othello only to be subjected to his horrifying verbal and physical assaults, the outcome of Othello's mistaken convictions about her faithlessness.";
?>


<!DOCTYPE html>
<html class="desktop
">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# good_reads: http://ogp.me/ns/fb/good_reads#">
    <title><?php echo $title ?></title>


    <!--    <link href='https://www.goodreads.com/book/show/12996.Othello' rel='canonical'>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/en/book/show/12996" hreflang="en"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/de/book/show/12996" hreflang="de"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/tr/book/show/12996" hreflang="tr"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/it/book/show/12996" hreflang="it"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/pt/book/show/12996" hreflang="pt"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/el/book/show/12996" hreflang="el"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/ar/book/show/12996" hreflang="ar"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/es/book/show/12996" hreflang="es"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/fa/book/show/12996" hreflang="fa"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/pl/book/show/12996" hreflang="pl"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/sk/book/show/12996" hreflang="sk"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/ro/book/show/12996" hreflang="ro"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/nl/book/show/12996" hreflang="nl"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/id/book/show/12996" hreflang="id"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/zh/book/show/12996" hreflang="zh"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/fr/book/show/12996" hreflang="fr"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/no/book/show/12996" hreflang="no"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/bg/book/show/12996" hreflang="bg"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/ru/book/show/12996" hreflang="ru"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/da/book/show/12996" hreflang="da"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/cs/book/show/12996" hreflang="cs"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/ka/book/show/12996" hreflang="ka"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/fi/book/show/12996" hreflang="fi"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/mn/book/show/12996" hreflang="mn"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/ca/book/show/12996" hreflang="ca"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/hu/book/show/12996" hreflang="hu"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/hr/book/show/12996" hreflang="hr"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/ta/book/show/12996" hreflang="ta"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/sr/book/show/12996" hreflang="sr"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/ko/book/show/12996" hreflang="ko"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/vi/book/show/12996" hreflang="vi"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/et/book/show/12996" hreflang="et"/>-->
    <!--    <link rel="alternate" href="https://www.goodreads.com/sv/book/show/12996" hreflang="sv"/>-->


    <!--    <link rel="alternate" href="android-app://com.goodreads/https/www.goodreads.com/book/show/12996.Othello">-->

    <!--    <link rel="next" href="https://www.goodreads.com/book/show/12996.Othello?page=2">-->



    <!--    <script type="text/javascript"> var ue_t0=window.ue_t0||+new Date();-->
    <!--    </script>-->

    <!--    <script type="text/javascript">-->
    <!--        var ue_mid = "A1PQBFHBHS6YH1";-->
    <!--        var ue_sn = "www.goodreads.com";-->
    <!--        var ue_furl = "fls-na.amazon.com";-->
    <!--        var ue_sid = "596-5873062-4886762";-->
    <!--        var ue_id = "G0P6T6C4CV01TZY49Y50";-->
    <!---->
    <!--        (function(e){var c=e;var a=c.ue||{};a.main_scope="mainscopecsm";a.q=[];a.t0=c.ue_t0||+new Date();a.d=g;function g(h){return +new Date()-(h?0:a.t0)}function d(h){return function(){a.q.push({n:h,a:arguments,t:a.d()})}}function b(m,l,h,j,i){var k={m:m,f:l,l:h,c:""+j,err:i,fromOnError:1,args:arguments};c.ueLogError(k);return false}b.skipTrace=1;e.onerror=b;function f(){c.uex("ld")}if(e.addEventListener){e.addEventListener("load",f,false)}else{if(e.attachEvent){e.attachEvent("onload",f)}}a.tag=d("tag");a.log=d("log");a.reset=d("rst");c.ue_csm=c;c.ue=a;c.ueLogError=d("err");c.ues=d("ues");c.uet=d("uet");c.uex=d("uex");c.uet("ue")})(window);(function(e,d){var a=e.ue||{};function c(g){if(!g){return}var f=d.head||d.getElementsByTagName("head")[0]||d.documentElement,h=d.createElement("script");h.async="async";h.src=g;f.insertBefore(h,f.firstChild)}function b(){var k=e.ue_cdn||"z-ecx.images-amazon.com",g=e.ue_cdns||"images-na.ssl-images-amazon.com",j="/images/G/01/csminstrumentation/",h=e.ue_file||"ue-full-11e51f253e8ad9d145f4ed644b40f692._V1_.js",f,i;if(h.indexOf("NSTRUMENTATION_FIL")>=0){return}if("ue_https" in e){f=e.ue_https}else{f=e.location&&e.location.protocol=="https:"?1:0}i=f?"https://":"http://";i+=f?g:k;i+=j;i+=h;c(i)}if(!e.ue_inline){if(a.loadUEFull){a.loadUEFull()}else{b()}}a.uels=c;e.ue=a})(window,document);-->
    <!---->
    <!--        if (window.ue && window.ue.tag) { window.ue.tag('book:show:signed_in', ue.main_scope);window.ue.tag('book:show:signed_in:desktop', ue.main_scope); }-->
    <!--    </script>-->


    <!--    <script type="text/javascript">-->
    <!--        if (window.Mobvious === undefined) {-->
    <!--            window.Mobvious = {};-->
    <!--        }-->
    <!--        window.Mobvious.device_type = 'desktop';-->
    <!--    </script>-->



    <!--    <script src="https://s.gr-assets.com/assets/webfontloader-f5925439393a000d48096973793890d8.js"></script>-->
    <!--    <script>-->
    <!--        WebFont.load({-->
    <!--            classes: false,-->
    <!--            custom: {-->
    <!--                families: ["Lato:n4,n7,i4", "Merriweather:n4,n7,i4"],-->
    <!--                urls: ["https://s.gr-assets.com/assets/gr/fonts-e256f84093cc13b27f5b82343398031a.css"]-->
    <!--            }-->
    <!--        });-->
    <!--    </script>-->

    <link rel="stylesheet" media="all" href="./css/goodreads_all.css" />



    <link rel="stylesheet" media="screen" href="./css/goodreads_screen.css" />

    <!--    <script src="https://s.gr-assets.com/assets/desktop/libraries-41a429a5834e6352d597e2cf0b06486f.js"></script>-->
    <!--    <script src="https://s.gr-assets.com/assets/application-e1f7a59d8a3ee82c2db20200ea66a37f.js"></script>-->

    <!--    <script>-->
    <!--        -->
    <!--        var gptAdSlots = gptAdSlots || [];-->
    <!--        var googletag = googletag || {};-->
    <!--        googletag.cmd = googletag.cmd || [];-->
    <!--        (function() {-->
    <!--            var gads = document.createElement("script");-->
    <!--            gads.async = true;-->
    <!--            gads.type = "text/javascript";-->
    <!--            var useSSL = "https:" == document.location.protocol;-->
    <!--            gads.src = (useSSL ? "https:" : "http:") +-->
    <!--                "//securepubads.g.doubleclick.net/tag/js/gpt.js";-->
    <!--            var node = document.getElementsByTagName("script")[0];-->
    <!--            node.parentNode.insertBefore(gads, node);-->
    <!--        })();-->
    <!--        -->
    <!--    </script>-->

    <!--    <script>-->
    <!--        -->
    <!--        googletag.cmd.push(function() {-->
    <!--            googletag.pubads().setTargeting("sid", "osid.3ef9237958fcfb29a594dd991e8112c5");-->
    <!--            googletag.pubads().setTargeting("grsession", "osid.3ef9237958fcfb29a594dd991e8112c5");-->
    <!--            googletag.pubads().setTargeting("surface", "desktop");-->
    <!--            googletag.pubads().setTargeting("signedin", "true");-->
    <!--            googletag.pubads().setTargeting("gr_author", "false");-->
    <!--            googletag.pubads().setTargeting("author", ["947","3137322","1020792","585","569","3706","799335","25885","2782"]);-->
    <!--            googletag.pubads().setTargeting("genres", ["1","24","25","28","29","26","136","62","460","40","64","128","146","244","621","776","1053","8300","4","5","35","48","58","68","84","96","144","173","188","207","269","384","397","479","560","587","688","798","945","1024","1126","1413","1670","2093","2207","4005","5722","5737","6568"]);-->
    <!--            googletag.pubads().setTargeting("Gender", "male");-->
    <!--            googletag.pubads().setTargeting("Age", "20-24");-->
    <!--            googletag.pubads().setTargeting("shelf", ["classics","plays","fiction","drama","school","literature","theatre","readforschool","poetry","tragedy"]);-->
    <!--            googletag.pubads().setTargeting("tags", ["24","621","1","460","26","25","776","8300","146","9926"]);-->
    <!--            googletag.pubads().setTargeting("gtargeting", "dcly0qk1t");-->
    <!--            googletag.pubads().setTargeting("resource", "Work_995103");-->
    <!--            googletag.pubads().enableAsyncRendering();-->
    <!--            googletag.pubads().enableSingleRequest();-->
    <!--            googletag.pubads().collapseEmptyDivs(true);-->
    <!--            googletag.pubads().disableInitialLoad();-->
    <!--            googletag.enableServices();-->
    <!--        });-->
    <!--        -->
    <!--    </script>-->

    <!--    <script>-->
    <!--    -->
    <!--        ! function(a9, a, p, s, t, A, g) {-->
    <!--            if (a[a9]) return;-->
    <!---->
    <!--            function q(c, r) {-->
    <!--                a[a9]._Q.push([c, r])-->
    <!--            }-->
    <!--            a[a9] = {-->
    <!--                init: function() {-->
    <!--                    q("i", arguments)-->
    <!--                },-->
    <!--                fetchBids: function() {-->
    <!--                    q("f", arguments)-->
    <!--                },-->
    <!--                setDisplayBids: function() {},-->
    <!--                _Q: []-->
    <!--            };-->
    <!--            A = p.createElement(s);-->
    <!--            A.async = !0;-->
    <!--            A.src = t;-->
    <!--            g = p.getElementsByTagName(s)[0];-->
    <!--            g.parentNode.insertBefore(A, g)-->
    <!--        }("apstag", window, document, "script", "//c.amazon-adsystem.com/aax2/apstag.js");-->
    <!---->
    <!--        apstag.init({-->
    <!--            pubID: '3211', adServer: 'googletag', bidTimeout: 4e3, params: { aps_privacy: '1YN' }-->
    <!--        });-->
    <!--    -->
    <!--    </script>-->



    <!--    <script src="https://s.gr-assets.com/assets/book/show-a22931d02749837069b3b4a4ebf40236.js"></script>-->

    <!--    <script>-->
    <!---->
    <!--        !function(d,s,id)-->
    <!--        {var js, fjs = d.getElementsByTagName(s)[0];-->
    <!--            if(!d.getElementById(id))-->
    <!--            {js=d.createElement(s);-->
    <!--                js.id=id;-->
    <!--                js.src='https://platform.twitter.com/widgets.js';-->
    <!--                fjs.parentNode.insertBefore(js,fjs);-->
    <!--            }}(document,'script','twitter-wjs');-->
    <!---->
    <!--    </script>-->






    <!--    <link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="Goodreads">-->

    <!--    <script>-->
    <!---->
    <!---->
    <!--        var GoodreadsAnalytics = GoodreadsAnalytics || {};-->
    <!--        var _gaq = _gaq || [];-->
    <!---->
    <!--        GoodreadsAnalytics.push = function () {-->
    <!--            _gaq.push.apply(_gaq, arguments);-->
    <!--        }-->
    <!---->
    <!--        GoodreadsAnalytics.push(['_setAccount', 'UA-968618-1']);-->
    <!--        GoodreadsAnalytics.push(['_setCustomVar',-->
    <!--            1,                        // Slot 1-->
    <!--            'User Status',            // Custom variable name-->
    <!--            'signed_in',  // Custom variable value: signed_out, signed_in,-->
    <!--            //   signed_in_facebook_connected, or-->
    <!--            //   goodreads_member_previously_signed_in-->
    <!--            2                         // Visit-level scope, which means slot 1 will be-->
    <!--                                      //   free when the visit ends.-->
    <!--        ]);-->
    <!--        GoodreadsAnalytics.push(['_setCustomVar',-->
    <!--            2,                        // Slot 2-->
    <!--            'Device Type',            // Custom variable name-->
    <!--            'desktop',         // Custom variable value: desktop, mobile, or-->
    <!--            //   tablet-->
    <!--            2                         // Visit-level scope, which means slot 2 will be-->
    <!--                                      //   free when the visit ends.-->
    <!--        ]);-->
    <!--        GoodreadsAnalytics.push(['_trackPageview']);-->
    <!---->
    <!--        (function () {-->
    <!--            var ga = document.createElement('script');-->
    <!--            ga.type = 'text/javascript';-->
    <!--            ga.async = true;-->
    <!--            ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';-->
    <!--            var s = document.getElementsByTagName('script')[0];-->
    <!--            s.parentNode.insertBefore(ga, s);-->
    <!--        })();-->
    <!---->
    <!---->
    <!--    </script>-->

    <!--    <meta name="description" content="Othello book. Read 6,648 reviews from the world's largest community for readers. In Othello, Shakespeare creates a powerful drama of a marriage that begi...">-->


    <!--    <meta content='summary' name='twitter:card'>-->
    <!--    <meta content='@goodreads' name='twitter:site'>-->
    <!--    <meta content='Othello by William Shakespeare' name='twitter:title'>-->
    <!--    <meta content="Othello book. Read 6,648 reviews from the world's largest community for readers. In Othello, Shakespeare creates a powerful drama of a marriage that begi..." name='twitter:description'>-->
    <!--    <meta content='https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1459795105i/12996._UY2503_SS2503_.jpg' name='twitter:image'>-->
    <!--    <meta content='Othello' name='twitter:image:alt'>-->


    <!--    <meta name="verify-v1" content="cEf8XOH0pulh1aYQeZ1gkXHsQ3dMPSyIGGYqmF53690=">-->
    <!--    <meta name="google-site-verification" content="PfFjeZ9OK1RrUrKlmAPn_iZJ_vgHaZO1YQ-QlG2VsJs" />-->
    <!--    <meta name="apple-itunes-app" content="app-id=355833469">-->
</head>


<body class="">


<div class="content">
    <!--    <script>-->
    <!---->
    <!--        var initializeGrfb = function() {-->
    <!--            $grfb.initialize({-->
    <!--                appId: "2415071772"-->
    <!--            });-->
    <!--        };-->
    <!--        if (typeof $grfb !== "undefined") {-->
    <!--            initializeGrfb();-->
    <!--        } else {-->
    <!--            window.addEventListener("DOMContentLoaded", function() {-->
    <!--                if (typeof $grfb !== "undefined") {-->
    <!--                    initializeGrfb();-->
    <!--                }-->
    <!--            });-->
    <!--        }-->
    <!--        -->
    <!--    </script>-->

    <!--    <script>-->
    <!--        -->
    <!--        function loadScript(url, callback) {-->
    <!--            var script = document.createElement("script");-->
    <!--            script.type = "text/javascript";-->
    <!---->
    <!--            if (script.readyState) {  //Internet Explorer-->
    <!--                script.onreadystatechange = function() {-->
    <!--                    if (script.readyState == "loaded" ||-->
    <!--                        script.readyState == "complete") {-->
    <!--                        script.onreadystatechange = null;-->
    <!--                        callback();-->
    <!--                    }-->
    <!--                };-->
    <!--            } else {  //Other browsers-->
    <!--                script.onload = function() {-->
    <!--                    callback();-->
    <!--                };-->
    <!--            }-->
    <!---->
    <!--            script.src = url;-->
    <!--            document.getElementsByTagName("head")[0].appendChild(script);-->
    <!--        }-->
    <!---->
    <!--        function initAppleId() {-->
    <!--            AppleID.auth.init({-->
    <!--                clientId : 'com.goodreads.app',-->
    <!--                scope : 'name email',-->
    <!--                redirectURI: 'https://www.goodreads.com/apple_users/sign_in_with_apple_web',-->
    <!--                state: 'apple_oauth_state_29bc57ea-a5eb-4cee-9a69-22ddba5948dc'-->
    <!--            });-->
    <!--        }-->
    <!---->
    <!--        var initializeSiwa = function() {-->
    <!--            var APPLE_SIGN_IN_JS_URL =  "https://appleid.cdn-apple.com/appleauth/static/jsapi/appleid/1/en_US/appleid.auth.js"-->
    <!--            loadScript(APPLE_SIGN_IN_JS_URL, initAppleId);-->
    <!--        };-->
    <!--        if (typeof AppleID !== "undefined") {-->
    <!--            initAppleId();-->
    <!--        } else {-->
    <!--            initializeSiwa();-->
    <!--        }-->
    <!---->
    <!--    </script>-->


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

    <div class='siteHeaderBottomSpacer'></div>



    <div class="mainContentContainer ">




        <div class="mainContent ">


            <div class="mainContentFloat ">

                <div class="leftContainer" itemscope itemtype="http://schema.org/Book">
                    <div id="topcol" class="last col stacked">

                        <div id="imagecol" class="col">
                            <div class="bookCoverContainer">
                                <div class="bookCoverPrimary">
                                    <a rel="nofollow" itemprop="image" href="/book/photo/12996.Othello"><img id="coverImage" alt="Othello" src="<?php echo $image ?>" /></a>
                                </div>
                                <div class="bookCoverActions">

                                    <div class="coverButtonContainer">
                                        <div class="coverButton enlargeCover" id="edition_12996_enlarge">
                                            Enlarge cover
                                        </div>
                                        <div class="editionCover" id="edition_12996_enlarge_cover" style= "display: none;">
                                            <img src="<?php echo $image ?>" alt="12996. sy475 " />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class='wtrButtonContainer' id='1_book_12996'>
                                <div class='wtrUp wtrLeft'>
                                    <form action="/shelf/add_to_shelf" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="Wd7NiVVkUFJA5+oFlzwp5fjcBzWddED6HBPwJ84SFK7Se3FmC27WlRe3M2B7FooXBmTiCcRKckGVAUlwgDun1g==" />

                                        <button class='wtrToRead'  type='submit'>
                                            <span class='progressTrigger'>Read</span>
                                            <span class='progressIndicator'>saving…</span>
                                        </button>
                                        <button class='wtrToRead'  type='submit'>
                                            <span class='progressTrigger'>Currently Reading</span>
                                            <span class='progressIndicator'>saving…</span>
                                        </button>
                                        <button class='wtrToRead' type='submit'>
                                            <span class='progressTrigger'>Want to Read</span>
                                            <span class='progressIndicator'>saving…</span>
                                        </button>
                                    </form>

                                </div>



                                <div class='ratingStars wtrRating'>
                                    <div class='starsErrorTooltip hidden'>
                                        Error rating book. Refresh and try again.
                                    </div>
                                    <div class='myRating uitext greyText'>Rate this book</div>
                                    <div class='clearRating uitext'>Clear rating</div>
                                    <div class="stars" data-resource-id="12996" data-user-id="129148878" data-submit-url="/review/rate/12996?page_referrer=https%3A%2F%2Fwww.goodreads.com%2F&page_url=%2Fbook%2Fshow%2F12996.Othello&qid=GSbtI3R7Hp&rank=1&stars_click=true&wtr_button_id=1_book_12996" data-rating="0">
                                        <a class="star off" title="did not like it" href="#" ref="bm_rtg_st1_bsh">
                                            1 of 5 stars
                                        </a>
                                        <a class="star off" title="it was ok" href="#" ref="bm_rtg_st2_bsh">
                                            2 of 5 stars
                                        </a>
                                        <a class="star off" title="liked it" href="#" ref="bm_rtg_st3_bsh">
                                            3 of 5 stars
                                        </a>
                                        <a class="star off" title="really liked it" href="#" ref="bm_rtg_st4_bsh">
                                            4 of 5 stars
                                        </a>
                                        <a class="star off" title="it was amazing" href="#" ref="bm_rtg_st5_bsh">
                                            5 of 5 stars
                                        </a>
                                    </div>
                                </div>

                            </div>





                        </div>

                        <div id="metacol" class="last col">
                            <h1 id="bookTitle" class="gr-h1 gr-h1--serif" itemprop="name">
                                <?php echo $title?>
                            </h1>
                            <h2 id="bookSeries">
                            </h2>

                            <div id="bookAuthors" class="">
                                <span class='by'>
                                    by
                                </span>
                                <span itemprop='author' itemscope='' itemtype='http://schema.org/Person'>
                                    <div class='authorName__container'>
                                        <a class="authorName" itemprop="url" href="https://www.goodreads.com/author/show/947.William_Shakespeare">
                                            <span itemprop="name">
                                                <?php echo $author_name ?>
                                            </span>
                                        </a>
                                    </div>
                                </span>
                            </div>

                            <div id="bookMeta"
                                 class="uitext stacked"
                                 style="position: relative"
                                 itemprop="aggregateRating"
                                 itemscope
                                 itemtype="https://schema.org/AggregateRating">


                                <span class="stars staticStars notranslate"><span size="12x12" class="staticStar p10"></span><span size="12x12" class="staticStar p10"></span><span size="12x12" class="staticStar p10"></span><span size="12x12" class="staticStar p6">

                                    </span>
                                    <span size="12x12" class="staticStar p0">

                                    </span>
                                </span>
                                <span itemprop="ratingValue">
                                    <?php echo $average_rating ?>
                                </span>

                            </div>

                            <div id="descriptionContainer">

                                <div id="description" class="readable stacked" style="right:0">

                                    <span id="freeTextContainer16394401686507852407">
                                        <?php echo $description ?>
<!--                                        In Othello, Shakespeare creates a powerful drama of a marriage that begins with fascination (between the exotic Moor Othello and the Venetian lady Desdemona), with elopement, and with intense mutual devotion and that ends precipitately with jealous rage and violent deaths. He sets this story in the romantic world of the Mediterranean, moving the action from Venice to the island of Cyprus and giving it an even more exotic coloring with stories of Othello's African past. Shakespeare builds so many differences into his hero and heroine—differences of race, of age, of cultural background—that one should not, perhaps, be surprised that the marriage ends disastrously. But most people who see or read the play feel that the love that the play presents between Othello and Desdemona is so strong that it would have overcome all these differences were it not for the words and actions of Othello's standard-bearer, Iago, who hates Othello and sets out to destroy him by destroying his love for Desdemona. As Othello succumbs to Iago's insinuations that Desdemona is unfaithful, fascination—which dominates the early acts of the play—turns to horror, especially for the audience. We are confronted by spectacles of a generous and trusting Othello in the grip of Iago's schemes; of an innocent Desdemona, who has given herself up entirely to her love for Othello only to be subjected to his horrifying verbal and physical assaults, the outcome of Othello's mistaken convictions about her faithlessness.-->
                                    </span>


                                </div>
                            </div>

                            <div id=buyButtonContainer class="uitext buttons buyableFeature u-marginTopXSmall u-paddingBottomXSmall u-bottomGrayBorder" data-book-id=12996 >

                                <div class="u-positionRelative">
                                    <h2 class='buyButtonContainer__title u-inlineBlock'%>Get A Copy</h2>
                                </div>

                                <ul class="buyButtonBar left">
                                    <li>
                                        <a class="buttonBar" href="/ebooks/download/12996.Othello">
                                            Download eBook
                                        </a>
                                    </li>
                                </ul>
                                <div class="clear"></div>
                            </div>


                            <div id="details" class="uitext darkGreyText">
                                <div class="row">
                                    <span itemprop="bookFormat">
                                        Paperback
                                    </span>
                                    ,
                                    <span itemprop="numberOfPages">
                                        <?php echo $numberOfPages ?> pages
                                    </span>
                                </div>

                                <div class="row">
                                    Published
                                    by <?php echo $publisher ?>

                                </div>

                                <div class="buttons">
                                    <a id="bookDataBoxShow" class="left inter actionLinkLite" style="display: none;"
                                       href="#"
                                       onclick="$j(&#39;#bookDataBoxShow&#39;).hide();
                                       $j(&#39;#bookDataBoxHide&#39;).show();
                                       $j(&#39;#bookDataBox&#39;).show();
                                       savePreference(&#39;book_show_details_flag&#39;, 1);; return false;">
                                        More Details...
                                    </a>

                                    <div id="bookDataBox" class="uitext" style=" margin: 10px 0">

                                        <div class="clearFloats">
                                            <div class="infoBoxRowTitle">ISBN</div>
                                            <div class="infoBoxRowItem">
                                                <?php echo $ISBN ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>

                    <div id='lazy_loadable_view'>
                            
                    </div>
                </div>

                <div class="rightContainer">
                </div>

                <span id="rating_graph" class="rating_graph">
    <script type="text/javascript+protovis">
      renderRatingGraph([101917, 117158, 78761, 19921, 5572]);
      if ($('rating_details')) {
        $('rating_details').insert({top: $('rating_graph')})
      }
    </script>
  </span>

                <script>
                    //<![CDATA[
                    if (typeof window.uet == 'function') { window.uet('af'); }
                    //]]>
                </script>

                <script>
                    //<![CDATA[

                    $j(document).ready(function() {
                        if (typeof window.uet == "function") {
                            window.uet("bb");

                            if (window.ue &&
                                window.ue.identifier &&
                                typeof window.ue.identifier.newRID == "function") {
                                var scope = "delayable_book_show";
                                window.ues("ctb", scope, "1");
                                var rid = window.ue.identifier.newRID();
                                window.ues("id", scope, rid);
                                window.uet("tc", scope);
                                // Only add csm_scope to params if we successfully initialized AJAX metrics
                                ;
                            }
                        }

                        $j("#lazy_loadable_view").load(
                            "/book/delayable_book_show/12996?page=1",
                            {"id":"12996.Othello","csm_scope":"delayable_book_show"},
                            function() {
                                $j(document).trigger("lazyload:complete");
                            }
                        );
                    });

                    //]]>
                </script>






                <script>
                    //<![CDATA[
                    (function (w, d, load) {
                        var script,
                            first = d.getElementsByTagName('SCRIPT')[0],
                            n = load.length,
                            i = 0,
                            go = function () {
                                for (i = 0; i < n; i += 1) {
                                    script = d.createElement('SCRIPT');
                                    script.type = 'text/javascript';
                                    script.async = true;
                                    script.src = load[i];
                                    first.parentNode.insertBefore(script, first);
                                }
                            }
                        if (w.attachEvent) {
                            w.attachEvent('onload', go);
                        } else {
                            w.addEventListener('load', go, false);
                        }
                    }(window, document,
                        ['//assets.pinterest.com/js/pinit.js',
                            '//apis.google.com/js/plusone.js'
                        ]
                    ));

                    //]]>
                </script>

            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>




    <div class="clear"></div>



    <script>
        //<![CDATA[
        if (typeof window.uet == 'function') { window.uet('be'); }
        //]]>
    </script>

</div>



<div id="overlay" style="display:none" onclick="Lightbox.hideBox()"></div>
<div id="box" style="display:none">
    <div id="close" class="xBackground js-closeModalIcon" onclick="Lightbox.hideBox()" title="Close this window"></div>
    <div id="boxContents"></div>
    <div id="boxContentsLeftovers" style="display:none"></div>
    <div class="clear"></div>
</div>

<div id="fbSigninNotification" style="display:none;">
    <p>Welcome back. Just a moment while we sign you in to your Goodreads account.</p>
    <img src="https://s.gr-assets.com/assets/facebook/login_animation-085464711e6c1ed5ba287a2f40ba3343.gif" alt="Login animation" />
</div>




<script>
    //<![CDATA[
    qcdata = {} || qcdata;
    (function(){
        var elem = document.createElement('script');
        elem.src = (document.location.protocol == "https:" ? "https://secure" : "http://pixel") + ".quantserve.com/aquant.js?a=p-0dUe_kJAjvkoY";
        elem.async = true;
        elem.type = "text/javascript";
        var scpt = document.getElementsByTagName('script')[0];
        scpt.parentNode.insertBefore(elem,scpt);
    }());
    var qcdata = {qacct: 'p-0dUe_kJAjvkoY', uid: '129148878'};
    //]]>
</script>
<noscript>
    <img alt='Quantcast' border='0' height='1' src='//pixel.quantserve.com/pixel/p-0dUe_kJAjvkoY.gif' style='display: none;' width='1'>
</noscript>

<script>
    //<![CDATA[
    var _comscore = _comscore || [];
    _comscore.push({ c1: "2", c2: "6035830", c3: "", c4: "", c5: "", c6: "", c15: ""});
    (function() {
        var s = document.createElement("script"), el = document.getElementsByTagName("script")[0]; s.async = true;
        s.src = (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js";
        el.parentNode.insertBefore(s, el);
    })();
    //]]>
</script>
<noscript>
    <img style="display: none" width="0" height="0" alt="" src="https://sb.scorecardresearch.com/p?c1=2&amp;amp;c2=6035830&amp;amp;c3=&amp;amp;c4=&amp;amp;c5=&amp;amp;c6=&amp;amp;c15=&amp;amp;cv=2.0&amp;amp;cj=1" />
</noscript>


</body>
</html>
