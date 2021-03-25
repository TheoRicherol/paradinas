<?php
include "controllers/header-controller.php";
?>
<div id="content" class="">
    <div class="" id="slogan">
        <h1 class="">Victor
        </h1>
        <h2 class="">L&rsquo;art &agrave; porter, &agrave; port&eacute;e de mains</h2>
    </div>
    <div class="collection">
        <a href="/category/1">
            <div class="item">
                <h3 class="">Sur-Mesure</h3>
                <img src="../view/assets/img/beeWaxOnBag.jpg" class="" alt="">
            </div>
        </a>
        <a href="/category/2">
            <div class="item">
                <h3 class="">Collection</h3>
                <img src="../view/assets/img/sewingOnBagTop.jpg" class="" alt="">
            </div>
        </a>

    </div>
    <div class="">
        <h4 class="">La S&eacute;lection de l'Atelier</h4>
    </div>
    <div class="collection-2">
        <!-- <div class="item">
            <img src="../view/assets/img/sac_3quart.jpg" class="" alt="">
        </div>
        <div class="item">
            <img src="../view/assets/img/sewing.jpg" class="" alt="">
        </div>
        <div class="item">
            <img src="../view/assets/img/beeWax.jpg" class="" alt="">
        </div>
        <div class="item">
            <img src="../view/assets/img/sac_3quart.jpg" class="" alt="">
        </div>
        <div class="item">
            <img src="../view/assets/img/sewing.jpg" class="" alt="">
        </div>
        <div class="item">
            <img src="../view/assets/img/beeWax.jpg" class="" alt="">
        </div> -->
        <!-- Place <div> tag where you want the feed to appear -->
        <div id="curator-feed-default-feed-layout"><a href="https://curator.io" target="_blank" class="crt-logo crt-tag">Powered by Curator.io</a></div>
        <!-- The Javascript can be moved to the end of the html page before the </body> tag -->
        <script type="text/javascript">
            /* curator-feed-default-feed-layout */
            (function() {
                var i, e, d = document,
                    s = "script";
                i = d.createElement("script");
                i.async = 1;
                i.src = "https://cdn.curator.io/published/954eeb14-9046-4742-9052-390bf557abe3.js";
                e = d.getElementsByTagName(s)[0];
                e.parentNode.insertBefore(i, e);
            })();
        </script>
    </div>


    <?php
    include "view/includes/footer.html";
    ?>