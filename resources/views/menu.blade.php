<?php
$page = isset($_GET["page"]) ? $_GET["page"] : "";
$category = isset($_GET["category"]) ? $_GET["category"] : "";
?>
<div class="menu">
        <div id="menu">
            <div id="menu-burger">
                <a id="menu-open" onclick="openMobileMenu(); return false;"  href="#">
                    <i class="fal fa-bars" style="color: #B0B0B0;font-size: 32px; position: absolute; right: 30px; top: 27px;"></i>
                </a>
                <a id="menu-close" onclick="closeMobileMenu(); return false" href="#" style="display: none;">
                    <i class="fal fa-times" style="color: #B0B0B0;font-size: 32px; position: absolute; right: 30px; top: 27px;"></i>
                </a>
            </div>
    </div>

<script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

        $("#nav > li > a").on("click", function (e) {
            if ($(this).parent().has('ul').length) {
                e.preventDefault();
            }
            if (!$(this).hasClass("open")) {
                // hide any open menus and remove all other classes
                $("#nav li ul").slideUp(350);
                $("#nav li a").removeClass("open");
                // open our new menu and add the open class
                $(this).next("ul").slideDown(350);
                $(this).addClass("open");
            } else if ($(this).hasClass("open")) {
                $(this).removeClass("open");
                $(this).next("ul").slideUp(350);
            } else {
            }
        });
        function openMobileMenu () {
            $('#menu-open').hide();
            $('#menu-close').show();
            $('#menu-content').fadeIn();
        };

         function closeMobileMenu() {
            $('#menu-open').show();
            $('#menu-close').hide();
            $('#menu-content').fadeOut();
        };

        resizeNavigation = function () {

            $('#navigation').css('height', $(window).height() - 79);
        };

        resizeNavigation();

        $(window).resize(function () {
            resizeNavigation();
        });
</script>