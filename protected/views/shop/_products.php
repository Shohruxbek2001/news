<?
/**
 * @var Product $data
 */
$cache=\Yii::app()->user->isGuest;
if(!$cache || $this->beginCache('shop__product_card', ['varyByParam'=>[$data->id]])): // cache begin

if(empty($category)) $categoryId=$data->category_id;
else $categoryId=$category->id;
$productUrl=Yii::app()->createUrl('shop/product', ['id'=>$data->id, 'category_id'=>$categoryId]);
?>

    <div class="fashion-top">
        <div class="fashion-left">
            <? if(!\Yii::app()->user->isGuest) echo CHtml::link('редактировать', ['/cp/shop/productUpdate', 'id'=>$data->id], ['class'=>'btn-product-edit', 'target'=>'_blank']); ?>

            <a href="<?=$productUrl?>"><?=CHtml::link(CHtml::image(ResizeHelper::resize($data->getSrc(), 305, 165),array('class'=>'')), $productUrl); ?>
            </a>
            <div class="blog-poast-info">
                <p class="fdate"><span class="glyphicon glyphicon-time"></span><?=$data->update_time?></p>
            </div>
            <h3><a href="<?=$productUrl?>"><?=$data->title?></a></h3>
            <p><?=HtmlHelper::getIntro($data->description)?></p>
            <a class="reu" href="<?=$productUrl?>">
        </div>
        <div class="clearfix"></div>
    </div>

<? if($cache) { $this->endCache(); } endif; // cache end ?>
