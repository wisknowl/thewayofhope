<?php
/**
 * Simple MVC Router for The Way of Hope
 */

class Router {
    private $routes = [];
    private $currentRoute;
    
    public function __construct() {
        $this->defineRoutes();
    }
    
    private function defineRoutes() {
        // Frontend routes
        $this->routes = [
            '/' => ['controller' => 'HomeController', 'action' => 'index'],
            '/about' => ['controller' => 'AboutController', 'action' => 'index'],
            '/programs' => ['controller' => 'ProgramsController', 'action' => 'index'],
            '/programs/education' => ['controller' => 'ProgramsController', 'action' => 'education'],
            '/programs/health' => ['controller' => 'ProgramsController', 'action' => 'health'],
            '/programs/vocational' => ['controller' => 'ProgramsController', 'action' => 'vocational'],
            '/programs/rights' => ['controller' => 'ProgramsController', 'action' => 'rights'],
            '/programs/disability' => ['controller' => 'ProgramsController', 'action' => 'disability'],
            '/rare-diseases' => ['controller' => 'RareDiseasesController', 'action' => 'index'],
            '/get-involved' => ['controller' => 'InvolvementController', 'action' => 'index'],
            '/volunteer' => ['controller' => 'InvolvementController', 'action' => 'volunteer'],
            '/donate' => ['controller' => 'DonationController', 'action' => 'index'],
            '/donation/success' => ['controller' => 'DonationController', 'action' => 'success'],
            '/donation/subscription-success' => ['controller' => 'DonationController', 'action' => 'subscriptionSuccess'],
            '/donation/cancel' => ['controller' => 'DonationController', 'action' => 'cancel'],
            '/subscription/manage' => ['controller' => 'DonationController', 'action' => 'manageSubscription'],
            '/subscription/cancel' => ['controller' => 'DonationController', 'action' => 'cancelSubscription'],
            '/news' => ['controller' => 'NewsController', 'action' => 'index'],
            '/news/([0-9]+)' => ['controller' => 'NewsController', 'action' => 'show'],
            '/events' => ['controller' => 'EventsController', 'action' => 'index'],
            '/gallery' => ['controller' => 'GalleryController', 'action' => 'index'],
            '/store' => ['controller' => 'StoreController', 'action' => 'index'],
            '/store/product/([0-9]+)' => ['controller' => 'StoreController', 'action' => 'product'],
            '/contact' => ['controller' => 'ContactController', 'action' => 'index'],
            '/privacy' => ['controller' => 'PrivacyController', 'action' => 'index'],
            '/terms' => ['controller' => 'TermsController', 'action' => 'index'],
            
            // Admin routes
            '/admin' => ['controller' => 'AdminController', 'action' => 'dashboard'],
            '/admin/login' => ['controller' => 'AdminController', 'action' => 'login'],
            '/admin/logout' => ['controller' => 'AdminController', 'action' => 'logout'],
            '/admin/content' => ['controller' => 'AdminController', 'action' => 'content'],
            '/admin/volunteers' => ['controller' => 'AdminController', 'action' => 'volunteers'],
            '/admin/volunteers/export' => ['controller' => 'AdminController', 'action' => 'exportVolunteersCSV'],
            '/admin/volunteers/status/([0-9]+)' => ['controller' => 'AdminController', 'action' => 'updateVolunteerStatus'],
            '/admin/donations' => ['controller' => 'AdminController', 'action' => 'donations'],
            '/admin/donations/status/([0-9]+)' => ['controller' => 'AdminController', 'action' => 'updateDonationStatus'],
            '/admin/store' => ['controller' => 'AdminController', 'action' => 'store'],
            '/admin/orders/status/([0-9]+)' => ['controller' => 'AdminController', 'action' => 'updateOrderStatus'],
            // Admin posts CMS
            '/admin/posts' => ['controller' => 'AdminPostsController', 'action' => 'index'],
            // Admin products CMS
            '/admin/products' => ['controller' => 'AdminProductsController', 'action' => 'index'],
            '/admin/products/create' => ['controller' => 'AdminProductsController', 'action' => 'create'],
            '/admin/products/store' => ['controller' => 'AdminProductsController', 'action' => 'store'],
            '/admin/products/edit/([0-9]+)' => ['controller' => 'AdminProductsController', 'action' => 'edit'],
            '/admin/products/update/([0-9]+)' => ['controller' => 'AdminProductsController', 'action' => 'update'],
            '/admin/products/delete/([0-9]+)' => ['controller' => 'AdminProductsController', 'action' => 'delete'],
            
            // Admin users management
            '/admin/users' => ['controller' => 'AdminUsersController', 'action' => 'index'],
            '/admin/users/create' => ['controller' => 'AdminUsersController', 'action' => 'create'],
            '/admin/users/store' => ['controller' => 'AdminUsersController', 'action' => 'store'],
            '/admin/users/edit/([0-9]+)' => ['controller' => 'AdminUsersController', 'action' => 'edit'],
            '/admin/users/update/([0-9]+)' => ['controller' => 'AdminUsersController', 'action' => 'update'],
            '/admin/users/delete/([0-9]+)' => ['controller' => 'AdminUsersController', 'action' => 'delete'],
            '/admin/posts/create' => ['controller' => 'AdminPostsController', 'action' => 'create'],
            '/admin/posts/store' => ['controller' => 'AdminPostsController', 'action' => 'store'],
            '/admin/posts/edit/([0-9]+)' => ['controller' => 'AdminPostsController', 'action' => 'edit'],
            '/admin/posts/update/([0-9]+)' => ['controller' => 'AdminPostsController', 'action' => 'update'],
            '/admin/posts/delete/([0-9]+)' => ['controller' => 'AdminPostsController', 'action' => 'delete'],
            
            // API routes
            '/api/language' => ['controller' => 'ApiController', 'action' => 'setLanguage'],
            '/api/contact' => ['controller' => 'ApiController', 'action' => 'contact'],
            '/api/volunteer' => ['controller' => 'ApiController', 'action' => 'volunteer'],
            '/api/donation' => ['controller' => 'ApiController', 'action' => 'donation'],
            '/api/donation/capture' => ['controller' => 'ApiController', 'action' => 'capturePayPalPayment'],
            '/api/webhooks/paypal' => ['controller' => 'ApiController', 'action' => 'paypalWebhook'],
        ];
    }
    
    public function handleRequest() {
        $requestUri = $_SERVER['REQUEST_URI'];
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        
        // Remove query string
        $path = parse_url($requestUri, PHP_URL_PATH);
        
        // Remove the base path if we're running in a subdirectory
        $scriptDir = dirname($_SERVER['SCRIPT_NAME']);
        if ($scriptDir !== '/' && strpos($path, $scriptDir) === 0) {
            $path = substr($path, strlen($scriptDir));
        }
        
        // Ensure path starts with /
        if ($path === '') {
            $path = '/';
        }
        
        // Check for exact matches first
        if (isset($this->routes[$path])) {
            $this->currentRoute = $this->routes[$path];
            $this->executeRoute();
            return;
        }
        
        // Check for pattern matches
        foreach ($this->routes as $pattern => $route) {
            if (preg_match('#^' . $pattern . '$#', $path, $matches)) {
                $this->currentRoute = $route;
                $this->executeRoute($matches);
                return;
            }
        }
        
        // 404 Not Found
        $this->show404();
    }
    
    private function executeRoute($matches = []) {
        $controllerName = $this->currentRoute['controller'];
        $actionName = $this->currentRoute['action'];
        
        // Include controller file
        $controllerFile = __DIR__ . "/../controllers/{$controllerName}.php";
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            
            if (class_exists($controllerName)) {
                $controller = new $controllerName();
                if (method_exists($controller, $actionName)) {
                    $controller->$actionName($matches);
                } else {
                    $this->show404();
                }
            } else {
                $this->show404();
            }
        } else {
            $this->show404();
        }
    }
    
    private function show404() {
        http_response_code(404);
        include __DIR__ . '/../views/errors/404.php';
        exit;
    }
}
