<?php
/**
 * Product list widget
 */
class ProductListWidget extends CWidget
{
    public $criteria;

    public $view='product_list';

    public function run()
    {
        $criteria = new CDbCriteria();
        $criteria->order     = 'created DESC, id DESC';
        $products = Product::model()->getDataProvider($this->criteria);

        if(!$products->totalItemCount) return false;
        
        $this->render('default', compact('products'));
    }
}
