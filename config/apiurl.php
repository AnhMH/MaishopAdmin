<?php

/**
 * API's Url
 */
use Cake\Core\Configure;

Configure::write('API.Timeout', 60);
Configure::write('API.secretKey', 'maishop');
Configure::write('API.rewriteUrl', array());

Configure::write('API.url_admins_login', 'admins/login');
Configure::write('API.url_admins_updateprofile', 'admins/updateprofile');

Configure::write('API.url_customers_list', 'customers/list');
Configure::write('API.url_customers_detail', 'customers/detail');
Configure::write('API.url_customers_addupdate', 'customers/addupdate');
Configure::write('API.url_customers_all', 'customers/all');

Configure::write('API.url_suppliers_list', 'suppliers/list');
Configure::write('API.url_suppliers_detail', 'suppliers/detail');
Configure::write('API.url_suppliers_addupdate', 'suppliers/addupdate');
Configure::write('API.url_suppliers_all', 'suppliers/all');

Configure::write('API.url_products_list', 'products/list');
Configure::write('API.url_products_detail', 'products/detail');
Configure::write('API.url_products_addupdate', 'products/addupdate');
Configure::write('API.url_products_all', 'products/all');

Configure::write('API.url_orders_addupdate', 'orders/addupdate');
Configure::write('API.url_orders_list', 'orders/list');
Configure::write('API.url_orders_detail', 'orders/detail');

Configure::write('API.url_reports_general', 'reports/general');