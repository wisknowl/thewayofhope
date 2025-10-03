<?php
/**
 * Contact Controller for The Way of Hope
 */

require_once '../app/core/BaseController.php';

class ContactController extends BaseController {
    
    public function index() {
        // Get site settings for contact info
        $settings = $this->getSiteSettings();
        
        $data = [
            'settings' => $settings,
            'pageTitle' => $this->translate('contact_title', 'Contact Us')
        ];
        
        $this->render('contact/index', $data);
    }
    
    private function getSiteSettings() {
        $settings = [];
        $result = $this->db->fetchAll("SELECT setting_key, setting_value FROM site_settings");
        
        foreach ($result as $setting) {
            $settings[$setting['setting_key']] = $setting['setting_value'];
        }
        
        return $settings;
    }
}
