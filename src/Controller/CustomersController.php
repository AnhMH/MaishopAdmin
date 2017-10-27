<?php

namespace App\Controller;

use Cake\Event\Event;

/**
 * Customers page
 */
class CustomersController extends AppController {
    
    /**
     * Customers page
     */
    public function index() {
        include ('Bus/Customers/index.php');
    }
}
