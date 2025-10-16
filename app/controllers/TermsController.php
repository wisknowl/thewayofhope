<?php

require_once __DIR__ . '/../core/BaseController.php';

class TermsController extends BaseController {
    
    public function index() {
        $this->render('terms/index');
    }
}




