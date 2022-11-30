<?php $this->pageTitle = 'Новый Статья - '. $this->appName; ?>

<h1>Новый Статья</h1>
<?php echo $this->renderPartial('form_product_general', compact('model', 'fixAttributes', 'eavAttributes', 'productAttrs')); ?>
