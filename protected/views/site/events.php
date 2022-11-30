<h1><?= D::cms('events_title', Yii::t('events', 'events_title')) ?></h1>


<div class="main-body">
    <div class="wrap">
        <ol class="breadcrumb">
            <li><a href="/">Главный</a></li>
            <li class="active"><?= D::cms('events_title', Yii::t('events', 'events_title')) ?></li>
        </ol>
        <div class="col-md-8 content-left">
            <div class="articles sports">
                <header>
                    <h3 class="title-head"><?= D::cms('events_title', Yii::t('events', 'events_title')) ?></h3>
                </header>
                <div class="technology">
                    <div class="tech-main">
                        <?php foreach ($eventRevers as $event): ?>
                            <? $this->renderPartial('//site/_events_item', ['data' => $event]) ?>
                        <?php endforeach; ?>

                        <div class="clearfix"></div>
                    </div>
                </div>
                <header>
                    <h3 class="title-head"></h3>
                </header>
                <?php foreach ($events as $event): ?>
                    <? $this->renderPartial('//site/_events_item', ['data' => $event]) ?>
                <?php endforeach; ?>


            </div>


        </div>

        <div class="col-md-4 side-bar">
            <div class="first_half">
                <div class="list_vertical">
                    <section class="accordation_menu">
                        <div>
                            <input id="label-1" name="lida" type="radio" checked/>
                            <label for="label-1" id="item1"><i class="ferme"> </i>Популярные статьи<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
                            <div class="content" id="a1">
                                <div class="scrollbar" id="style-2">
                                    <div class="force-overflow">
                                        <div class="popular-post-grids">

                                            <?php $this->widget('widget.catalog.ProductCarouselWidget') ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <input id="label-2" name="lida" type="radio"/>
                            <label for="label-2" id="item2"><i class="icon-leaf" id="i2"></i>Новинки<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
                            <div class="content" id="a2">
                                <div class="scrollbar" id="style-2">
                                    <div class="force-overflow">
                                        <div class="popular-post-grids">

                                            <?php $this->widget('widget.catalog.NewArticleList') ?>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <input id="label-3" name="lida" type="radio"/>
                            <label for="label-3" id="item3"><i class="icon-trophy" id="i3"></i>Comments<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
                            <div class="content" id="a3">
                                <div class="scrollbar" id="style-2">
                                    <div class="force-overflow">
                                        <div class="response">

                                            <div class="media response-info">
                                                <div class="media-left response-text-left">
                                                    <a href="#">
                                                        <img class="media-object" src="images/icon1.png" alt="" />
                                                    </a>
                                                    <h5><a href="#">Username</a></h5>
                                                </div>
                                                <div class="media-body response-text-right">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                    <ul>
                                                        <li>MARCH 21, 2015</li>
                                                        <li><a href="single.html">Reply</a></li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix"> </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="side-bar-articles">
                    <div class="side-bar-article">
                        <a href="single.html"><img src="images/sai.jpg" alt="" /></a>
                        <div class="side-bar-article-title">
                            <a href="single.html">Contrary to popular belief, Lorem Ipsum is not simply random text</a>
                        </div>
                    </div>
                    <div class="side-bar-article">
                        <a href="single.html"><img src="images/sai2.jpg" alt="" /></a>
                        <div class="side-bar-article-title">
                            <a href="single.html">There are many variations of passages of Lorem</a>
                        </div>
                    </div>
                    <div class="side-bar-article">
                        <a href="single.html"><img src="images/sai3.jpg" alt="" /></a>
                        <div class="side-bar-article-title">
                            <a href="single.html">Sed ut perspiciatis unde omnis iste natus error sit voluptatem</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<div class="pager search-pager">
    <?php $this->widget('DLinkPager', array(
        'header' => '',
        'pages' => $pages,
        'lastPageLabel' => '&gt;&gt;',
        'nextPageLabel' => '&gt;',
        'prevPageLabel' => '&lt;',
        'firstPageLabel' => '&lt;&lt;',
        'cssFile' => false,
//  'htmlOptions'=>array('class'=>'')
    )); ?>
</div>