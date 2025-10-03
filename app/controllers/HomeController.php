<?php
/**
 * Home Controller for The Way of Hope
 */

require_once '../app/core/BaseController.php';

class HomeController extends BaseController {
    
    public function index() {
        // Get site statistics
        $stats = $this->getSiteStats();
        
        // Get latest news
        $latestNews = $this->getLatestNews();
        
        // Get featured programs
        $programs = $this->getFeaturedPrograms();
        
        $data = [
            'stats' => $stats,
            'latestNews' => $latestNews,
            'programs' => $programs,
            'pageTitle' => $this->translate('nav_home', 'Home')
        ];
        
        $this->render('home/index', $data);
    }
    
    private function getSiteStats() {
        $stats = [];
        
        // Get funds raised
        $fundsResult = $this->db->fetch("SELECT SUM(amount) as total FROM donations WHERE payment_status = 'completed'");
        $stats['funds_raised'] = $fundsResult ? $fundsResult['total'] : 0;
        
        // Get volunteers count
        $volunteerResult = $this->db->fetch("SELECT COUNT(*) as count FROM volunteers WHERE status = 'approved'");
        $stats['volunteers'] = $volunteerResult ? $volunteerResult['count'] : 0;
        
        // Get projects completed (using programs as proxy)
        $projectResult = $this->db->fetch("SELECT COUNT(*) as count FROM programs WHERE is_active = 1");
        $stats['projects'] = $projectResult ? $projectResult['count'] : 0;
        
        return $stats;
    }
    
    private function getLatestNews() {
        $sql = "SELECT * FROM posts WHERE status = 'published' ORDER BY published_at DESC LIMIT 3";
        return $this->db->fetchAll($sql);
    }
    
    private function getFeaturedPrograms() {
        $sql = "SELECT * FROM programs WHERE is_active = 1 ORDER BY created_at DESC LIMIT 4";
        return $this->db->fetchAll($sql);
    }
}
