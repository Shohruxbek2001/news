<?php
/** @var CategoryListWidget $this */
/** @var array[Category] $categories */

if($categories):
?>
    <ul class="categories">
      <? foreach($categories as $category): ?>
        <li><a href="<?=$this->owner->createUrl('shop/category', ['id'=>$category->id])?>"><?= $category->title; ?></a></li>
      <? endforeach; ?>
    </ul>


<?endif; ?>
