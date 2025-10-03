<?php
/**
 * UserModel - handles admin users
 */

require_once __DIR__ . '/BaseModel.php';

class UserModel extends BaseModel {
    public function __construct() {
        parent::__construct('users');
    }

    public function findByUsernameOrEmail(string $identifier) {
        $sql = "SELECT * FROM users WHERE username = ? OR email = ? LIMIT 1";
        return $this->db->fetch($sql, [$identifier, $identifier]);
    }
}


