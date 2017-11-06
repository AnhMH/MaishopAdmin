<?php
use App\Lib\Api;
use Cake\Core\Configure;

if (empty($type)) {
    $type = '1';
}

$param = array(
    'type' => $type
);
$products = Api::call(Configure::read('API.url_products_all'), $param);
$customers = Api::call(Configure::read('API.url_customers_all'), $param);

$this->set(compact(
        'products',
        'customers'
));