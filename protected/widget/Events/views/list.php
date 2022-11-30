<?php foreach($events as $event):?>

<div class="article">
    <div class="article-left">
        <a href="<?= Yii::app()->createUrl('site/event', array('id' => $event->id)); ?>"><img src="<?= ResizeHelper::resize($event->getPreviewImg() ?: $this->controller->template . '/images/news-empty.jpg', 350 * 1.2, 222 * 1.2) ?>"></a>
    </div>
    <div class="article-right">
        <div class="article-title">
            <p><?=$event->date?><br/>
            <a class="title" href="<?= Yii::app()->createUrl('site/event', array('id' => $event->id)); ?>"><?=$event->title?></a>
        </div>
        <div class="article-text">
            <p><?=$event->intro?></p>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<?php endforeach;?>