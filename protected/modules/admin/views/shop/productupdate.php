<?php $this->pageTitle = 'Редактирование статья - '. $this->appName; ?>

<h1>Редактирование Статья</h1>

<?php echo $this->renderPartial('form_product_general', compact('model', 'fixAttributes', 'categoryList', 'relatedCategories', 'eavAttributes', 'productAttrs')); ?>


<?php Yii::app()->clientscript->registerScriptFile($this->module->assetsUrl.'/js/admin_shop.js'); ?>
