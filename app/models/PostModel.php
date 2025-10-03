<?php
/**
 * PostModel - handles posts CRUD
 */

require_once '../app/models/BaseModel.php';

class PostModel extends BaseModel {
    public function __construct() {
        parent::__construct('posts');
    }

    public function paginatePublished(int $limit, int $offset) {
        $sql = "SELECT * FROM posts WHERE status='published' ORDER BY published_at DESC LIMIT ? OFFSET ?";
        return $this->db->fetchAll($sql, [$limit, $offset]);
    }
}


