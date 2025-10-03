<?php
/**
 * ProductModel - manages store products
 */

require_once '../app/models/BaseModel.php';

class ProductModel extends BaseModel {
    public function __construct() {
        parent::__construct('products');
    }
}


