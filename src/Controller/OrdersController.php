<?php

namespace App\Controller;

use Cake\Event\Event;

/**
 * Orders page
 */
class OrdersController extends AppController {
    
    /**
     * Orders page
     */
    public function index() {
        include ('Bus/Orders/index.php');
    }
}
