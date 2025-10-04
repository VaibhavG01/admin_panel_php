<?php
require_once "models/Users.php";

class UsersController {
    private $db;
    private $user;

    public function __construct($db) {
        $this->db = $db;
        $this->user = new Users($db);
    }

    // List all users
    public function index() {
        $result = $this->user->getAll();
        include "views/users/users.php";
    }

    // Show create form
    public function create() {
        include "views/users/create.php";
    }

    // Store new user
    public function store($data, $file) {
        $this->user->username = $data['username'];
        $this->user->occupation = $data['occupation'] ?? null;
        $this->user->speciality = $data['speciality'] ?? null;
        $this->user->about = $data['about'] ?? null;
        $this->user->timing = $data['timing'] ?? null;
        $this->user->social_media_links = $data['social_media_links'] ?? null;
        $this->user->social_media_title = $data['social_media_title'] ?? null;
        $this->user->post = $data['post'] ?? null;
        $this->user->isActive = isset($data['isActive']) ? 1 : 0;

        // Handle image upload
        if (!empty($file['user_image']['name'])) {
            $targetDir = "assets/img/uploads/users/";
            if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
            $fileName = time() . "_" . basename($file['user_image']['name']);
            $targetFile = $targetDir . $fileName;
            move_uploaded_file($file['user_image']['tmp_name'], $targetFile);
            $this->user->user_image = $fileName;
        } else {
            $this->user->user_image = null;
        }

        $this->user->create();
        header("Location: index.php?route=users");
    }

    // Show edit form
    public function edit($id) {
        $user = $this->user->getById($id);
        include "views/users/update.php";
    }

    // Update user
    public function update($id, $data, $file) {
        $this->user->id = $id;
        $this->user->username = $data['username'];
        $this->user->occupation = $data['occupation'] ?? null;
        $this->user->speciality = $data['speciality'] ?? null;
        $this->user->about = $data['about'] ?? null;
        $this->user->timing = $data['timing'] ?? null;
        $this->user->social_media_links = $data['social_media_links'] ?? null;
        $this->user->social_media_title = $data['social_media_title'] ?? null;
        $this->user->post = $data['post'] ?? null;
        $this->user->isActive = isset($data['isActive']) ? 1 : 0;

        // Handle image upload
        if (!empty($file['user_image']['name'])) {
            $targetDir = "assets/img/uploads/users/";
            $fileName = time() . "_" . basename($file['user_image']['name']);
            $targetFile = $targetDir . $fileName;
            move_uploaded_file($file['user_image']['tmp_name'], $targetFile);
            $this->user->user_image = $fileName;
        } else {
            $this->user->user_image = $data['old_image'] ?? null;
        }

        $this->user->update();
        header("Location: index.php?route=users");
    }

    // Delete user
    public function delete($id) {
        $this->user->id = $id;
        $this->user->delete();
        header("Location: index.php?route=users");
    }

    // ✅ Get total count of users
    public function getCount() {
        return $this->user->getCount();
    }
}
?>
