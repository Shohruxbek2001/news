<?php /** @var Event $data */ ?>


<div class="tech">
    <a href="<?= Yii::app()->createUrl('site/event', array('id' => $data->id)); ?>"><img src="<?= ResizeHelper::resize($data->getPreviewImg() ?: $this->controller->template . '/images/news-empty.jpg', 350 * 1.2, 222 * 1.2) ?>" title="<?php echo $data->title; ?>" alt="<?php echo $data->title; ?>" /></a>
    <a class="power" href="<?= Yii::app()->createUrl('site/event', array('id' => $data->id)); ?>"><?php echo $data->getIntro(100); ?></a>
</div>

