<?php

use App\Lib\Api;
use App\Lib\Log\AppLog;
use Cake\Core\Configure;

$param = $this->request->data;
if (!empty($param['product_data']) && is_array($param['product_data'])) {
    $param['product_data'] = json_encode($param['product_data']);
}
$result = Api::call(Configure::read('API.url_orders_addupdate'), $param);

if (empty($result) || Api::getError()) {
    AppLog::warning("Can not update", __METHOD__, $param);
    echo __('error');
}