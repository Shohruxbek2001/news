<?php if (D::yd()->isActive('slider')): ?>
<?php $this->widget('\extend\modules\slider\widgets\Slider', ['code'=>'main', 'content'=>function($slides) { ?>
        <section class="slider">
            <div class="slider__main slider__container">
                <?php foreach ($slides as $slide):?>
                <div class="slider__main-item">
                    <?php if ($slide->url): ?>
                        <a href="<?= $slide->url ?>" class="slider__item">
                    <?php endif; ?>
                        <div class="slider__img" style="background-image:url(<?= $slide->src ?>)"
                             alt="<?= $slide->alt ?>" title="<?= $slide->alt ?>">
                            <?php if ($slide->title || $slide->alt): ?>
                                <div class="slider__bg"></div>
                                <div class="slider__item-textbox">
                                    <?php if ($slide->title): ?>
                                        <div class="slider__item-header"><?= $slide->title ?></div>
                                    <?php endif; ?>
                                    <? if ($slide->alt): ?>
                                        <div class="slider__item-desc"><?= $slide->alt ?></div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php if ($slide->url): ?></a><?php endif; ?>
                </div>
            <? endforeach; ?>
            </div>
        </section>
<?php }, 'cache'=>false, 'options'=>[
        'dots' => true,
        'infinite' => true,
        'autoplay' => false,
]]); ?>
<?php else: ?>
<div class="banner">
    <div class="banner__slider">
        <div class="banner__item banner__item-wide">
            <div class="banner__img" style="background-image: url('/images/banner.png');"></div>
        </div>
    </div>
</div>
<?php endif; ?>
	<div class="main-body">
    <div class="wrap">
        <div class="col-md-8 content-left">
            <div class="articles">
                <header>
                    <h3 class="title-head">Последные Новости</h3>
                </header>

                <?php $this->widget('widget.Events.Events') ?>

            </div>
            <div class="life-style">
                <header>
                    <h3 class="title-head">Последные Статьи</h3>
                </header>

                <div class="life-style-grids">
                    <div class="life-style-left-grid">
                        <a href="single.html"><img src="images/l1.jpg" alt="" /></a>
                        <a class="title" href="single.html">It is a long established fact that a reader will be distracted.</a>
                    </div>
                    <div class="life-style-right-grid">
                        <a href="single.html"><img src="images/l2.jpg" alt="" /></a>
                        <a class="title" href="single.html">There are many variations of passages of Lorem Ipsum available.</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="life-style-grids">
                    <div class="life-style-left-grid">
                        <a href="single.html"><img src="images/l3.jpg" alt="" /></a>
                        <a class="title" href="single.html">Contrary to popular belief, Lorem Ipsum is not simply random text.</a>
                    </div>
                    <div class="life-style-right-grid">
                        <a href="single.html"><img src="images/l4.jpg" alt="" /></a>
                        <a class="title" href="single.html">Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
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
                            <label for="label-3" id="item3"><i class="icon-trophy" id="i3"></i>Комментари<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
                            <div class="content" id="a3">
                                <div class="scrollbar" id="style-2">
                                    <div class="force-overflow">
                                        <div class="response">
                                            <?php $this->widget('widget.productReviews.GetReviews') ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="side-bar-articles">
                    <?php $this->widget('widget.ItemImages.ItemImages') ?>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

