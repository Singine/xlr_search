<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>小懒人平台</title>
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link type="text/css" rel="stylesheet" href="css/slide.css">
    <link type="text/css" rel="stylesheet" href="css/buttom.css">
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/resize.js"></script>
    <script src="js/slide.js"></script>
    <script src="js/animation.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".slideInner").slide({
                slideContainer: $('.slideInner a'),
                effect: 'easeOutCirc',
                autoRunTime: 5000,
                slideSpeed: 1000,
                nav: true,
                autoRun: true,
                prevBtn: $('a.prev'),
                nextBtn: $('a.next')
            });
        });
    </script>
</head>
<body >
<div  id="top">
    <a href="javascript:void(0)"  id="top-a">TOP</a>
</div>
<div class="header" id="header">
    <div class="main-nav">
        <ul id="nav-ul">
            <li class="nav-li" id="nav-li1-1"  title="ABOUT"><a href="javascript:void(0)" class="nav-li-a" id="nav-li-a-1">关于</a></li>
            <li class="nav-li" id="nav-li2-1"  title="SERVICES"><a href="javascript:void(0)" class="nav-li-a" id="nav-li-a-2">服务</a>
                <div id="services-menu">
                    <ul class="service-list">
                        <li class="service-li" id="service-li1-1"><a href="javascript:void(0)" class="service-li-a" id="service-li-a-1">二手书</a><hr class="hr-list" id="hr-list-1"></li>
                        <li class="service-li" id="service-li1-2"><a href="javascript:void(0)" class="service-li-a" id="service-li-a-2">二手车</a><hr class="hr-list" id="hr-list-2"></li>
                        <li class="service-li" id="service-li1-3"><a href="javascript:void(0)" class="service-li-a" id="service-li-a-3">快递</a><hr class="hr-list" id="hr-list-3"></li>
                        <li class="service-li" id="service-li1-4"><a href="javascript:void(0)" class="service-li-a" id="service-li-a-4">校园通</a><hr class="hr-list" id="hr-list-4"></li>
                    </ul>
                </div>
            </li>
            <li class="nav-li" id="nav-li3-1"  title="SHOW"><a href="javascript:void(0)" class="nav-li-a" id="nav-li-a-3">展示</a></li>
            <li class="nav-li" id="nav-li4-1"  title="CONTACT"><a href="javascript:void(0)" class="nav-li-a" id="nav-li-a-4">联系我们</a></li>
        </ul>
    </div>
</div>

<div class="headImage" id="div-resize">
    <div class="img-cover">
    <div class="slides">
        <div class="slideInner">

            <a  >
                <div class="moveElem img1" rel="0,easeInOutExpo"> <img src="images/slide2p1.png" /> </div>

            </a>
            <a  >
                <div class="moveElem img1" rel="0,easeInOutExpo"> <img src="images/slide1p1.png" /> </div>
                <div class="moveElem img2" rel="150,easeInOutExpo"> <img src="images/slide1p2.png" /> </div>
            </a>
            <a  class="slide3" >

                <div class="moveElem img2" rel="150,easeInOutExpo"> <img src="images/slide3p2.png" /> </div>
                <div class="moveElem img3" rel="300,easeInOutExpo"> <img src="images/slide3p3.png" /> </div>
            </a>

        </div>
        <div class="nav" >
            <a class="prev" href="javascript:void(0);"></a>
            <a class="next" href="javascript:void(0);"></a>
        </div>
    </div>
    </div>
</div>
<div class="content">
    <div class="row">
        <div class="div1" id="index_ABOUT">
            <div class="aboutBox">
                <h2 class="section-heading">关于小懒人</h2>
                <hr class="light">
                <p class="text-faded">
                    小懒人是一个专门为大学生解决生活中各类问题和需求的平台！</p>
                    <p class="text-faded">你情我愿，互帮互助，互惠互利是我们的宗旨！</p>
                <p class="text-faded">多说无益，一用便知！</p>

                <a  class="btn btn-3" href="javascript:void(0)">了解更多</a>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="div2" id="index_SERVICES"  >
            <div class="serviceBox">
                <h2 class="section-heading">我们的服务</h2>
                <hr class="">
                <div class="serviceContainer">
                    <div class="service" onclick="document.location='acsearch.php';">
                        <div class="service-shadow"></div>
                        <div class="service-img-1"></div>
                        <h3>二手书</h3>
                        <p class="text-service"> 还在为处理历年的书籍而苦恼吗？小懒人为您提供大学生自己的二手书买卖平台！ </p>

                    </div>
                    <div class="service" onclick="document.location='acsearch.php';">
                        <div class="service-shadow"></div>
                        <div class="service-img-2"></div>
                        <h3 class="h3-bike">二手车</h3>
                        <p class="text-service"> 众里寻“车”千百度，蓦然回首，小懒人二手车转让定会让您找到满意的坐骑！ </p>
                    </div>
                    <div class="service" onclick="document.location='acsearch.php';">
                        <div class="service-shadow"></div>
                        <div class="service-img-3"></div>
                        <h3>快递</h3>
                        <p class="text-service"> 别让你的快递无家可归，小懒人帮您把飘荡在外的快递送回家！ </p>
                    </div>
                    <div class="service" onclick="document.location='acsearch.php';">
                        <div class="service-shadow"></div>
                        <div class="service-img-4"></div>
                        <h3>校园通</h3>
                        <p class="text-service"> 尽请期待 </p>
                    </div>
                </div>

            </div>

        </div>
    </div>
        <div class="row">
        <div class="div3" id="index_SHOW">
            <div class="showBox">
                <h2 class="section-heading">展示</h2>
                <hr class="light">
            </div>

        </div>
    </div>


    <div class="row">
        <div class="div4" id="index_CONTACT">
            <div class="contactBox">
                <h2 class="section-heading">联系我们</h2>
                <hr class="">
                <p class="text-contact">
                    小懒人立志成为一个大学生自己的互助平台，这需要我们共同努力！<br>
                    志同道合的朋友不要犹豫，通过以下方式加入我们吧！<br>
                    如果您有什么意见或建议，也请联系我们！
                </p>
                <div class="contact-info">
                    <div class="contact-info-1">
                        <div class="contact-info-1-img"></div>
                        <p class="text-info">189-1817-6580</p>
                    </div>
                     <div class="contact-info-2">
                        <div class="contact-info-2-img"></div>
                         <p class="text-info"> xlr_platform@outlook.com </p>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <footer>
        <p class="footer-p" >小懒人的灵魂：你情我愿 、互帮互助 、互惠互利<br>Copyright © xlrplatform.com All Rights Reserved</p>

    </footer>
</div>




</body>
</html>