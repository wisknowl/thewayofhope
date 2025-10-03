<?php
/**
 * Store Controller for The Way of Hope
 */

require_once '../app/core/BaseController.php';

class StoreController extends BaseController {
    
    public function index() {
        // Get filter parameters
        $category = $_GET['category'] ?? '';
        $search = $_GET['search'] ?? '';
        
        // Build query
        $whereClause = "WHERE is_active = 1";
        $params = [];
        
        if ($category) {
            $whereClause .= " AND category = ?";
            $params[] = $category;
        }
        
        if ($search) {
            $whereClause .= " AND (name LIKE ? OR description LIKE ?)";
            $params[] = "%{$search}%";
            $params[] = "%{$search}%";
        }
        
        // Get products
        $products = $this->db->fetchAll("SELECT * FROM products {$whereClause} ORDER BY created_at DESC", $params);
        
        // Get categories for filter
        $categories = $this->db->fetchAll("SELECT DISTINCT category FROM products WHERE is_active = 1 AND category IS NOT NULL");
        
        $data = [
            'products' => $products,
            'categories' => $categories,
            'currentCategory' => $category,
            'search' => $search,
            'pageTitle' => $this->translate('nav_store', 'Store')
        ];
        
        $this->render('store/index', $data);
    }
    
    public function product($matches) {
        $productId = $matches[1] ?? 0;
        
        // Get the specific product
        $product = $this->db->fetch("SELECT * FROM products WHERE id = ? AND is_active = 1", [$productId]);
        
        if (!$product) {
            $this->show404();
            return;
        }
        
        // Get related products
        $relatedProducts = $this->db->fetchAll("SELECT * FROM products WHERE id != ? AND is_active = 1 AND category = ? ORDER BY created_at DESC LIMIT 4", [$productId, $product['category']]);
        
        $data = [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
            'pageTitle' => $product['name']
        ];
        
        $this->render('store/product', $data);
    }
    
    private function show404() {
        http_response_code(404);
        include '../app/views/errors/404.php';
        exit;
    }
}
