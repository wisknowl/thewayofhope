<?php
/**
 * AdminProductsController - CRUD for products
 */

require_once __DIR__ . '/../core/BaseController.php';
require_once __DIR__ . '/../models/ProductModel.php';

class AdminProductsController extends BaseController {
    private ProductModel $products;

    public function __construct() {
        parent::__construct();
        Security::requireLogin();
        $this->products = new ProductModel();
    }

    public function index() {
        $all = $this->products->findAll([], 'created_at DESC');
        $this->render('admin/products/index', [ 'products' => $all, 'pageTitle' => 'Products' ]);
    }

    public function create() {
        $this->render('admin/products/form', [ 'mode' => 'create', 'pageTitle' => 'Create Product' ]);
    }

    public function store() {
        $csrf = $_POST['csrf_token'] ?? '';
        if (!Security::verifyCSRFToken($csrf)) {
            return $this->render('admin/products/form', [ 'mode' => 'create', 'error' => 'Invalid CSRF', 'pageTitle' => 'Create Product' ]);
        }
        $data = [
            'name' => $_POST['name'] ?? '',
            'description' => $_POST['description'] ?? '',
            'price' => floatval($_POST['price'] ?? 0),
            'category' => $_POST['category'] ?? null,
            'size_options' => $_POST['size_options'] ?? null,
            'stock_quantity' => intval($_POST['stock_quantity'] ?? 0),
            'is_active' => isset($_POST['is_active']) ? 1 : 0,
        ];
        $id = $this->products->create($data);
        if ($id) return $this->redirect(dirname($_SERVER['SCRIPT_NAME']) . '/admin/products');
        $this->render('admin/products/form', [ 'mode' => 'create', 'error' => 'Failed to save', 'pageTitle' => 'Create Product' ]);
    }

    public function edit($matches) {
        $id = intval($matches[1] ?? 0);
        $product = $this->products->find($id);
        if (!$product) return $this->redirect(dirname($_SERVER['SCRIPT_NAME']) . '/admin/products');
        $this->render('admin/products/form', [ 'mode' => 'edit', 'product' => $product, 'pageTitle' => 'Edit Product' ]);
    }

    public function update($matches) {
        $id = intval($matches[1] ?? 0);
        $csrf = $_POST['csrf_token'] ?? '';
        if (!Security::verifyCSRFToken($csrf)) {
            $product = $this->products->find($id);
            return $this->render('admin/products/form', [ 'mode' => 'edit', 'product' => $product, 'error' => 'Invalid CSRF', 'pageTitle' => 'Edit Product' ]);
        }
        $data = [
            'name' => $_POST['name'] ?? '',
            'description' => $_POST['description'] ?? '',
            'price' => floatval($_POST['price'] ?? 0),
            'category' => $_POST['category'] ?? null,
            'size_options' => $_POST['size_options'] ?? null,
            'stock_quantity' => intval($_POST['stock_quantity'] ?? 0),
            'is_active' => isset($_POST['is_active']) ? 1 : 0,
        ];
        $this->products->update($id, $data);
        return $this->redirect(dirname($_SERVER['SCRIPT_NAME']) . '/admin/products');
    }

    public function delete($matches) {
        $id = intval($matches[1] ?? 0);
        $this->products->delete($id);
        return $this->redirect(dirname($_SERVER['SCRIPT_NAME']) . '/admin/products');
    }
}


