<?php
/**
 * Donation Controller for The Way of Hope
 */

require_once '../app/core/BaseController.php';

class DonationController extends BaseController {
    
    public function index() {
        // Get programs for donation targeting
        $programs = $this->db->fetchAll("SELECT * FROM programs WHERE is_active = 1 ORDER BY name_en");
        
        // Get recent donations for display
        $recentDonations = $this->db->fetchAll("SELECT * FROM donations WHERE payment_status = 'completed' ORDER BY created_at DESC LIMIT 5");
        
        $data = [
            'programs' => $programs,
            'recentDonations' => $recentDonations,
            'pageTitle' => $this->translate('donate_title', 'Support Our Mission')
        ];
        
        $this->render('donation/index', $data);
    }
}
