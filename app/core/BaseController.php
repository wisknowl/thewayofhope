<?php
/**
 * Base Controller for The Way of Hope
 */

class BaseController {
    protected $db;
    protected $language;
    
    public function __construct() {
        $this->db = Database::getInstance();
        Language::init();
    }
    
    protected function render($view, $data = []) {
        // Extract data to variables
        extract($data);
        
        // Include the view file
        $viewFile = __DIR__ . "/../views/{$view}.php";
        if (file_exists($viewFile)) {
            include $viewFile;
        } else {
            throw new Exception("View file not found: {$viewFile}");
        }
    }
    
    protected function jsonResponse($data, $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
    
    protected function redirect($url) {
        header("Location: {$url}");
        exit;
    }
    
    protected function getLanguage() {
        return Language::getCurrentLanguage();
    }
    
    protected function translate($key, $default = '') {
        return Language::get($key, $default);
    }
}
