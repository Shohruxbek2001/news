<?php CmsHtml::fancybox(); ?>

<div class="main-body">
    <div class="wrap">
        <ol class="breadcrumb">
            <li><a href="/">Главный</a></li>
        </ol>
        <div class="single-page">
            <h1><?= $product->getMetaH1() ?></h1>
            <div class="col-md-8 content-left single-post">
                <?php if (!Yii::app()->user->isGuest) echo CHtml::link('редактировать', array('cp/shop/productUpdate', 'id' => $product->id), array('class' => 'btn-product-edit', 'target' => 'blank')); ?>
                <div class="blog-posts">
                    <h3 class="post"><?=$product->title?></h3>
                    <div class="last-article">
                       <?=$product->description?>
                        <div class="clearfix"></div>
                        <!--related-posts-->
                        <div class="row related-posts">
                            <h4>Дополнителный:</h4>
                            <? foreach ($product->moreImages as $id => $img): ?>
                            <div class="col-xs-6 col-md-3 related-grids">
                                <a href="#" class="thumbnail">
                                    <img src="<?=$img->tmbUrl?>" alt=""/>
                                </a>
                                <h5><a href="#"><?=$img->description?></a></h5>
                            </div>
                          <? endforeach;?>
                        </div>
                        <!--//related-posts-->
                        <? if (D::cms('shop_enable_reviews')) $this->widget('widget.productReviews.ProductReviews', array('product_id' => $product->id)) ?>
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
                                <label for="label-3" id="item3"><i class="icon-trophy" id="i3"></i>Comments<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
                                <div class="content" id="a3">
                                    <div class="scrollbar" id="style-2">
                                        <div class="force-overflow">
                                            <div class="response">

                                                <div class="media response-info">
                                                    <div class="media-left response-text-left">
                                                        <a href="#">
                                                            <img class="media-object" src="/images/icon1.png" alt="" />
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
                            <a href="single.html"><img src="/images/sai.jpg" alt="" /></a>
                            <div class="side-bar-article-title">
                                <a href="single.html">Contrary to popular belief, Lorem Ipsum is not simply random text</a>
                            </div>
                        </div>
                        <div class="side-bar-article">
                            <a href="single.html"><img src="/images/sai2.jpg" alt="" /></a>
                            <div class="side-bar-article-title">
                                <a href="single.html">There are many variations of passages of Lorem</a>
                            </div>
                        </div>
                        <div class="side-bar-article">
                            <a href="single.html"><img src="/images/sai3.jpg" alt="" /></a>
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
</div>


