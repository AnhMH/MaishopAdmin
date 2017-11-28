<?php
use App\Lib\Api;
use Cake\Core\Configure;

if (empty($type)) {
    $type = '1';
}

$data = array();
if (!empty($id)) {
    $data = Api::call(Configure::read('API.url_orders_detail'), array(
        'id' => $id
    ));
}

$param = array(
    'type' => $type
);
$products = Api::call(Configure::read('API.url_products_all'), $param);
$customers = Api::call(Configure::read('API.url_customers_all'), $param);

$this->set(compact(
        'products',
        'customers',
        'data'
));