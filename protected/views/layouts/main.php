<?php
use iblock\models\InfoBlock; ?>
<!DOCTYPE html>
<html lang="ru">
<head>


    <?php if (\Yii::app()->params['isAdaptive']): ?>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <? else: ?>
        <meta name="viewport" content="width=device-width">
    <? endif; ?>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/flexslider.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="canonical" href="<?=$this->createAbsoluteUrl('/').preg_replace('/\?.*$/', '', $_SERVER['REQUEST_URI'])?>" />
    <script src="/js/lab/responsiveslides.min.js"></script>
    <script>
        $(function () {
            $("#slider").responsiveSlides({
                auto: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                pager: true,
            });
        });
    </script>

    <!--/script-->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},900);
            });
        });
    </script>

</head>

<body class="<?= D::c($this->isIndex(), 'index-page', 'inner-page') ?> <?= D::cms('vertical_template') ? 'vertical-template' : '' ?>">

<div id="my-page" class="">
    <?php if (D::cms('vertical_template')): ?>
        <div id="my-header" class="header">
            <div class="header-top">
                <div class="wrap">
                    <div class="top-menu">
                        <?php
                        $this->widget('\menu\widgets\menu\MenuWidget', array(
                            'rootLimit' => D::cms('menu_limit')
                        ));
                        ?>
                    </div>
                    <div class="num">
                        <p> Call us : 032 2352 782</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="logo text-center">
                    <a href="/"><img src="images/logo.jpg" alt="" /></a>
                </div>
                <div class="navigation">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="wrap">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                            </div>
                            <!--/.navbar-header-->

                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <?php
                                $this->widget('\menu\widgets\menu\MenuWidget', array(
                                    'rootLimit' => D::cms('menu_limit')
                                ));
                                ?>
                                <div class="search">
                                    <!-- start search-->
                                    <div class="search-box">
                                        <div id="sb-search" class="sb-search">
                                            <form>
                                                <input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
                                                <input class="sb-search-submit" type="submit" value="">
                                                <span class="sb-icon-search"> </span>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- search-scripts -->
                                    <script src="/js/lab/classie.js"></script>
                                    <script src="/js/lab/uisearch.js"></script>
                                    <script>
                                        new UISearch( document.getElementById( 'sb-search' ) );
                                    </script>
                                    <!-- //search-scripts -->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!--/.navbar-collapse-->
                        <!--/.navbar-->
                </div>
                </nav>
            </div>
        </div>
    <?php else: ?>
        <div id="my-header" class="header">
            <div class="header-top">
                <div class="wrap">
                    <div class="top-menu">
                        <?php
                        $this->widget('\menu\widgets\menu\MenuWidget', array(
                            'rootLimit' => D::cms('menu_limit')
                        ));
                        ?>
                    </div>
                    <div class="num">
                        <a href="tel:<?= preg_replace('/[^0-9+]/', '', D::cms('phone')) ?>">
                        <p>Тел: <?= D::cms('phone') ?></p>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="logo text-center">
                    <a href="/"><img src="/images/logo.jpg" alt="" /></a>
                </div>
                <div class="navigation">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="wrap">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                            </div>
                            <!--/.navbar-header-->

                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <? $this->widget('widget.catalog.CategoryList'); ?>
                                <div class="search">
                                    <!-- start search-->
                                    <div class="search-box">
                                        <? $this->widget('widget.search.SearchWidget', ['submit'=>'', 'view'=>'search_new']); ?>
                                    </div>
                                    <!-- search-scripts -->
                                    <script src="/js/lab/classie.js"></script>
                                    <script src="/js/lab/uisearch.js"></script>
                                    <script>
                                        new UISearch( document.getElementById( 'sb-search' ) );
                                    </script>
                                    <!-- //search-scripts -->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!--/.navbar-collapse-->
                        <!--/.navbar-->
                </div>
                </nav>
            </div>
        </div>
    <?php endif; ?>
    <div class="wrap">
      <?php  $data=InfoBlock::model()->findByPk(1); ?>
        <div class="move-text">
            <div class="breaking_news">
                <h2><?=$data->title?></h2>
            </div>
            <div class="marquee">
                <div class="marquee1"><a class="breaking" href="#"><?=$data->description?></a></div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <script type="text/javascript" src="/js/lab/jquery.marquee.min.js"></script>
            <script>
                $('.marquee').marquee({ pauseOnHover: true });
                //@ sourceURL=pen.js
            </script>
        </div>
    </div>

    <main id="my-content" class="main-body">
        <?php if (D::cms('vertical_template')): ?>
        <aside class="aside">
            <div class="menu">
                <?php
                $this->widget('\menu\widgets\menu\MenuWidget', array(
                    'rootLimit' => D::cms('menu_limit')
                ));
                ?>
            </div>
        </aside>
        <section class="vertical-page">
            <?=$content?>
        </section>
        <? else: ?>
        <?=$content?>
        <? endif; ?>
    </main>

    <div class="footer">
        <div class="footer-top">
            <div class="wrap">
                <div class="col-md-3 col-xs-6 col-sm-4 footer-grid">
                    <h4 class="footer-head">About Us</h4>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here.</p>
                </div>
                <div class="col-md-2 col-xs-6 col-sm-2 footer-grid">
                    <h4 class="footer-head">Categories</h4>
                    <ul class="cat">
                        <li><a href="business.html">Business</a></li>
                        <li><a href="technology.html">Technology</a></li>
                        <li><a href="entertainment.html">Entertainment</a></li>
                        <li><a href="sports.html">Sports</a></li>
                        <li><a href="shortcodes.html">Health</a></li>
                        <li><a href="fashion.html">Fashion</a></li>
                    </ul>
                </div>
                <div class="col-md-4 col-xs-6 col-sm-6 footer-grid">
                    <h4 class="footer-head">Flickr Feed</h4>
                    <ul class="flickr">
                        <li><a href="#"><img src="/images/bus4.jpg"></a></li>
                        <li><a href="#"><img src="/images/bus2.jpg"></a></li>
                        <li><a href="#"><img src="/images/bus3.jpg"></a></li>
                        <li><a href="#"><img src="/images/tec4.jpg"></a></li>
                        <li><a href="#"><img src="/images/tec2.jpg"></a></li>
                        <li><a href="#"><img src="/images/tec3.jpg"></a></li>
                        <li><a href="#"><img src="/images/bus2.jpg"></a></li>
                        <li><a href="#"><img src="/images/bus3.jpg"></a></li>
                        <div class="clearfix"></div>
                    </ul>
                </div>
                <div class="col-md-3 col-xs-12 footer-grid">
                    <h4 class="footer-head">Контакты</h4>
                    <span class="hq">O Нас</span>
                    <address>
                        <ul class="location">
                            <li><span class="glyphicon glyphicon-map-marker"></span></li>
                            <li></li>
                            <div class="clearfix"></div>
                        </ul>
                        <ul class="location">
                            <li><span class="glyphicon glyphicon-earphone"></span></li>
                            <li><?= D::cms('phone') ?></li>
                            <div class="clearfix"></div>
                        </ul>
                        <ul class="location">
                            <li><span class="glyphicon glyphicon-envelope"></span></li>
                            <li><a href="mailto:<?= D::cms('email') ?>"><?= D::cms('email') ?></a></li>
                            <div class="clearfix"></div>
                        </ul>
                    </address>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="wrap">
                <div class="copyrights col-md-6">
                    <p> © 2015 Express News. All Rights Reserved | Design by  <a href="http://w3layouts.com/"> W3layouts</a></p>
                </div>
                <div class="footer-social-icons col-md-6">
                    <ul>
                        <li><a class="facebook" href="#"></a></li>
                        <li><a class="twitter" href="#"></a></li>
                        <li><a class="flickr" href="#"></a></li>
                        <li><a class="googleplus" href="#"></a></li>
                        <li><a class="dribbble" href="#"></a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>


<?php if (D::yd()->isActive('feedback')): // обратный звонок ?>
    <div style="display: none;">
        <div id="form-callback">
            <div class="popup-info">
                <?php $this->widget('\feedback\widgets\FeedbackWidget', array('id' => 'callback', 'title'=>'Заказать звонок')) ?>
            </div>
        </div>
    </div>
<?php endif; // обратный звонок ?>
<?php echo D::cms('counter'); ?>
<script type="text/javascript" src="/js/lab/move-top.js"></script>
<script type="text/javascript" src="/js/custom.js"></script>
<script type="text/javascript" src="/js/lab/easing.js"></script>
<script type="text/javascript" src="/js/lab/jquery.flexisel.js"></script>
<script type="text/javascript" src="/js/lab/jquery.marquee.min.js"></script>
<script type="text/javascript" src="/js/lab/jquery.min.js"></script>
<script type="text/javascript" src="/js/lab/bootstrap.js"></script>
<script type="text/javascript" src="/js/lab/responsiveslides.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        var defaults = {
        wrapID: 'toTop', // fading element id
        wrapHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear'
        };

        $().UItoTop({ easingType: 'easeOutQuart' });
    });
</script>
</body>
</html>
