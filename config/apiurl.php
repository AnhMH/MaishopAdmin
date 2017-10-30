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

Configure::write('API.user_customers_list', 'customers/list');
Configure::write('API.url_customers_detail', 'customers/detail');
Configure::write('API.url_customers_addupdate', 'customers/addupdate');

Configure::write('API.user_suppliers_list', 'suppliers/list');
Configure::write('API.url_suppliers_detail', 'suppliers/detail');
Configure::write('API.url_suppliers_addupdate', 'suppliers/addupdate');