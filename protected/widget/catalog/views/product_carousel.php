<?php
/** @var $this ProductCarouselWidget */
/** @var $dataProvider CActiveDataProvider[Product] */
	Yii::app()->clientScript->registerScriptFile('/js/slick.min.js');
?>
<div class="product-carousel-block">
	<div class="product-carousel-header">
		<div id="carousel-control" class="carousel-control"></div>
	</div>
	<div id="product-carousel" class="product-carousel">
		<?php foreach($dataProvider->getData() as $data): ?>
            <div class="popular-post-grid">
                <div class="post-img">
                    <a href="<?=Yii::app()->createUrl('shop/product', ['id'=>$data->id])?>"><img src="/images/product/<?=$data->main_image?>" alt="" /></a>
                </div>
                <div class="post-text">
                    <a class="pp-title" href="<?=Yii::app()->createUrl('shop/product', ['id'=>$data->id])?>"><?=$data->title?></a>
                    <p><?php echo $data['update_time']?></p>
                </div>
                <div class="clearfix"></div>
            </div>
		<?php endforeach; ?>
	</div>
</div>