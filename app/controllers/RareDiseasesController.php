<?php
/**
 * Rare Diseases Controller
 * Handles rare diseases awareness and information pages
 */

require_once '../app/core/BaseController.php';

class RareDiseasesController extends BaseController {
    
    public function index() {
        // Render the rare diseases page
        require_once __DIR__ . '/../views/rare-diseases/index.php';
    }
}

