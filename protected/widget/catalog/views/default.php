

<div class="life-style-grids">

    <?php foreach ($products as $product): ?>
        <div class="life-style-left-grid">
            <?=CHtml::link(CHtml::image(ResizeHelper::resize($product->main_image, 310, 200), $product->main_image_alt, ['title'=>$product->title]), $product->main_image, ['class'=>'image-full', 'data-fancybox'=>'group']); ?>
            <a class="title" href="single.html">It is a long established fact that a reader will be distracted.</a>
        </div>


    <?php endforeach; ?>
    <div class="clearfix"></div>

</div>
