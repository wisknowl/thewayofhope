<?php
/**
 * About Controller for The Way of Hope
 */

require_once '../app/core/BaseController.php';

class AboutController extends BaseController {
    
    public function index() {
        // Get site settings for contact info
        $settings = $this->getSiteSettings();
        
        // Get board members (placeholder data for now)
        $boardMembers = $this->getBoardMembers();
        
        // Get partners (placeholder data for now)
        $partners = $this->getPartners();
        
        $data = [
            'settings' => $settings,
            'boardMembers' => $boardMembers,
            'partners' => $partners,
            'pageTitle' => $this->translate('about_title', 'About The Way of Hope')
        ];
        
        $this->render('about/index', $data);
    }
    
    private function getSiteSettings() {
        $settings = [];
        $result = $this->db->fetchAll("SELECT setting_key, setting_value FROM site_settings");
        
        foreach ($result as $setting) {
            $settings[$setting['setting_key']] = $setting['setting_value'];
        }
        
        return $settings;
    }
    
    private function getBoardMembers() {
        // Placeholder data - in real implementation, this would come from a board_members table
        return [
            [
                'name' => 'Dr. Marie Nguema',
                'position' => 'President',
                'photo' => '/assets/images/board/marie-nguema.jpg',
                'bio' => 'Founder and President of The Way of Hope with over 15 years of experience in community development.'
            ],
            [
                'name' => 'Rev. Paul Mballa',
                'position' => 'Vice President',
                'photo' => '/assets/images/board/paul-mballa.jpg',
                'bio' => 'Spiritual leader and community advocate with deep roots in Bafang.'
            ],
            [
                'name' => 'Ms. Grace Fon',
                'position' => 'Secretary',
                'photo' => '/assets/images/board/grace-fon.jpg',
                'bio' => 'Education specialist focused on improving access to quality learning.'
            ]
        ];
    }
    
    private function getPartners() {
        // Placeholder data - in real implementation, this would come from a partners table
        return [
            [
                'name' => 'Ministry of Social Affairs',
                'logo' => '/assets/images/partners/ministry-social.jpg',
                'description' => 'Government partnership for social development programs'
            ],
            [
                'name' => 'Cameroon Red Cross',
                'logo' => '/assets/images/partners/red-cross.jpg',
                'description' => 'Collaboration on health awareness and emergency response'
            ],
            [
                'name' => 'Local Community Leaders',
                'logo' => '/assets/images/partners/community-leaders.jpg',
                'description' => 'Grassroots partnerships for community engagement'
            ]
        ];
    }
}
