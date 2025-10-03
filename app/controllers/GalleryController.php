<?php
/**
 * Gallery Controller for The Way of Hope
 */

require_once '../app/core/BaseController.php';

class GalleryController extends BaseController {
    
    public function index() {
        // Get filter parameters
        $category = $_GET['category'] ?? '';
        $type = $_GET['type'] ?? '';
        
        // Build query
        $whereClause = "WHERE 1=1";
        $params = [];
        
        if ($category) {
            $whereClause .= " AND category = ?";
            $params[] = $category;
        }
        
        if ($type) {
            $whereClause .= " AND file_type = ?";
            $params[] = $type;
        }
        
        // Get gallery items
        $galleryItems = $this->db->fetchAll("SELECT * FROM gallery {$whereClause} ORDER BY created_at DESC", $params);
        
        // Get categories for filter
        $categories = $this->db->fetchAll("SELECT DISTINCT category FROM gallery WHERE category IS NOT NULL");
        
        $data = [
            'galleryItems' => $galleryItems,
            'categories' => $categories,
            'currentCategory' => $category,
            'currentType' => $type,
            'pageTitle' => $this->translate('nav_gallery', 'Gallery')
        ];
        
        $this->render('gallery/index', $data);
    }
}
