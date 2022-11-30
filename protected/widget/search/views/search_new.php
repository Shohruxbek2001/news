<? use common\components\helpers\HYii as Y; ?>

<div id="sb-search" class="sb-search">
    <form class="search__form" id="search" action="<?= \Yii::app()->createUrl('search/index') ?>" role="search">
        <span class="sb-icon-search"> </span>
        <?= \CHtml::textField(Y::config('search', 'queryname'), \Yii::app()->request->getQuery('q'), [
            'placeholder'=>'Я ищу ...',
            'id'=>$this->id,
            'autocomplete'=>'off',
            'class'=>'sb-search-input',
            'type'=>'search'
        ]); ?>
        <?= \CHtml::submitButton('Найти', ['encode'=>false, 'class'=>'sb-search-submit','type'=>'submit']); ?>
    </form>
</div>
