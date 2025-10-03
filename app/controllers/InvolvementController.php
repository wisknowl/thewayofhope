<?php
/**
 * Involvement Controller for The Way of Hope
 */

require_once '../app/core/BaseController.php';

class InvolvementController extends BaseController {
    
    public function index() {
        $data = [
            'pageTitle' => $this->translate('involve_title', 'Get Involved')
        ];
        
        $this->render('involvement/index', $data);
    }
    
    public function volunteer() {
        $data = [
            'pageTitle' => $this->translate('involve_volunteer', 'Become a Volunteer')
        ];
        
        $this->render('involvement/volunteer', $data);
    }
}
