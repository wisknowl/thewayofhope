<?php
/**
 * News Controller for The Way of Hope
 */

require_once '../app/core/BaseController.php';

class NewsController extends BaseController {
    
    public function index() {
        // Get pagination parameters
        $page = $_GET['page'] ?? 1;
        $limit = 6;
        $offset = ($page - 1) * $limit;
        
        // Get total count
        $totalPosts = $this->db->fetch("SELECT COUNT(*) as count FROM posts WHERE status = 'published'")['count'];
        $totalPages = ceil($totalPosts / $limit);
        
        // Get posts
        $posts = $this->db->fetchAll("SELECT * FROM posts WHERE status = 'published' ORDER BY published_at DESC LIMIT ? OFFSET ?", [$limit, $offset]);
        
        // Get categories
        $categories = $this->db->fetchAll("SELECT DISTINCT category FROM posts WHERE status = 'published' AND category IS NOT NULL");
        
        $data = [
            'posts' => $posts,
            'categories' => $categories,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'pageTitle' => $this->translate('nav_news', 'News & Updates')
        ];
        
        $this->render('news/index', $data);
    }
    
    public function show($matches) {
        $postId = $matches[1] ?? 0;
        
        // Get the specific post
        $post = $this->db->fetch("SELECT * FROM posts WHERE id = ? AND status = 'published'", [$postId]);
        
        if (!$post) {
            $this->show404();
            return;
        }
        
        // Get related posts
        $relatedPosts = $this->db->fetchAll("SELECT * FROM posts WHERE id != ? AND status = 'published' AND category = ? ORDER BY published_at DESC LIMIT 3", [$postId, $post['category']]);
        
        $data = [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
            'pageTitle' => $post['title_' . $this->getLanguage()] ?? $post['title_en']
        ];
        
        $this->render('news/show', $data);
    }
    
    private function show404() {
        http_response_code(404);
        include '../app/views/errors/404.php';
        exit;
    }
}
