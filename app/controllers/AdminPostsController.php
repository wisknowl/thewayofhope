<?php
/**
 * AdminPostsController - CRUD for posts with WYSIWYG
 */

require_once __DIR__ . '/../core/BaseController.php';
require_once __DIR__ . '/../models/PostModel.php';

class AdminPostsController extends BaseController {
    private PostModel $posts;

    public function __construct() {
        parent::__construct();
        Security::requireLogin();
        $this->posts = new PostModel();
    }

    public function index() {
        $all = $this->posts->findAll([], 'updated_at DESC');
        $this->render('admin/posts/index', [ 'posts' => $all, 'pageTitle' => 'Posts' ]);
    }

    public function create() {
        $this->render('admin/posts/form', [ 'mode' => 'create', 'pageTitle' => 'Create Post' ]);
    }

    public function store() {
        $csrf = $_POST['csrf_token'] ?? '';
        if (!Security::verifyCSRFToken($csrf)) {
            return $this->render('admin/posts/form', [ 'mode' => 'create', 'error' => 'Invalid CSRF', 'pageTitle' => 'Create Post' ]);
        }
        $authorId = $_SESSION['admin_user_id'] ?? null;
        $data = [
            'title_en' => $_POST['title_en'] ?? '',
            'title_fr' => $_POST['title_fr'] ?? '',
            'title_es' => $_POST['title_es'] ?? '',
            'content_en' => $_POST['content_en'] ?? '',
            'content_fr' => $_POST['content_fr'] ?? '',
            'content_es' => $_POST['content_es'] ?? '',
            'excerpt_en' => $_POST['excerpt_en'] ?? '',
            'excerpt_fr' => $_POST['excerpt_fr'] ?? '',
            'excerpt_es' => $_POST['excerpt_es'] ?? '',
            'category' => $_POST['category'] ?? null,
            'status' => $_POST['status'] ?? 'draft',
            'published_at' => ($_POST['status'] ?? 'draft') === 'published' ? date('Y-m-d H:i:s') : null,
            'author_id' => $authorId,
        ];
        $id = $this->posts->create($data);
        if ($id) return $this->redirect(dirname($_SERVER['SCRIPT_NAME']) . '/admin/posts');
        $this->render('admin/posts/form', [ 'mode' => 'create', 'error' => 'Failed to save', 'pageTitle' => 'Create Post' ]);
    }

    public function edit($matches) {
        $id = intval($matches[1] ?? 0);
        $post = $this->posts->find($id);
        if (!$post) return $this->redirect(dirname($_SERVER['SCRIPT_NAME']) . '/admin/posts');
        $this->render('admin/posts/form', [ 'mode' => 'edit', 'post' => $post, 'pageTitle' => 'Edit Post' ]);
    }

    public function update($matches) {
        $id = intval($matches[1] ?? 0);
        $csrf = $_POST['csrf_token'] ?? '';
        if (!Security::verifyCSRFToken($csrf)) {
            $post = $this->posts->find($id);
            return $this->render('admin/posts/form', [ 'mode' => 'edit', 'post' => $post, 'error' => 'Invalid CSRF', 'pageTitle' => 'Edit Post' ]);
        }
        $data = [
            'title_en' => $_POST['title_en'] ?? '',
            'title_fr' => $_POST['title_fr'] ?? '',
            'title_es' => $_POST['title_es'] ?? '',
            'content_en' => $_POST['content_en'] ?? '',
            'content_fr' => $_POST['content_fr'] ?? '',
            'content_es' => $_POST['content_es'] ?? '',
            'excerpt_en' => $_POST['excerpt_en'] ?? '',
            'excerpt_fr' => $_POST['excerpt_fr'] ?? '',
            'excerpt_es' => $_POST['excerpt_es'] ?? '',
            'category' => $_POST['category'] ?? null,
            'status' => $_POST['status'] ?? 'draft',
            'published_at' => ($_POST['status'] ?? 'draft') === 'published' ? date('Y-m-d H:i:s') : null,
        ];
        $this->posts->update($id, $data);
        return $this->redirect(dirname($_SERVER['SCRIPT_NAME']) . '/admin/posts');
    }

    public function delete($matches) {
        $id = intval($matches[1] ?? 0);
        $this->posts->delete($id);
        return $this->redirect(dirname($_SERVER['SCRIPT_NAME']) . '/admin/posts');
    }
}


