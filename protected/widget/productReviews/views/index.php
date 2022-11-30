<?php /**
 * File: index.php
 * User: Mobyman
 * Date: 10.04.13
 * Time: 12:56
 * @var Product $product
 */ ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/review.css'); ?>

<div class="response">
    <h4>Комментраии</h4>
    <?php  foreach($product->reviews as $review): ?>


    <div class="media response-info">
        <div class="media-left response-text-left">
            <a href="#">
                <img class="media-object" src="/images/bus2.jpg" alt=""/>
            </a>
            <h5><a href="#"><?php echo $review->username; ?></a></h5>
            <span class="star-view star-<?php echo $review->mark; ?>"></span>
        </div>
        <div class="media-body response-text-right">
            <p>  <?php echo $review->text; ?></p>
        </div>
        <div class="clearfix"> </div>
    </div>
    <?php  endforeach; ?>
</div>
<?php
$this->render('_product_review_form', compact('model', 'product'));
$this->render('_product_review_js');
?>
    <ul class="reviews">

    </ul>
<div class="clr"></div>
