<?php
require_once "models/Videos.php";

class VideosController {
    private $db;
    private $videos;

    public function __construct($db) {
        $this->db = $db;
        $this->videos = new Videos($db);
    }

    // List videos
    public function index() {
        $result = $this->videos->getAll();
        include "views/videos/videos.php";
    }

    // Show create form
    public function create() {
        include "views/videos/create.php";
    }

    // Store videos
    public function store($data, $file) {
        $this->videos->title = $data['title'];
        $this->videos->isActive = isset($data['isActive']) ? 1 : 0;

        // Handle image upload
        if (!empty($file['videos']['name'])) {
            $targetDir = "assets/img/uploads/videos/";
            if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
            $fileName = time() . "_" . basename($file['videos']['name']);
            $targetFile = $targetDir . $fileName;
            move_uploaded_file($file['videos']['tmp_name'], $targetFile);
            $this->videos->videos = $fileName;
        }

        $this->videos->create();
        header("Location: index.php?route=videos");
    }

    // Show edit form
    public function edit($id) {
        $videos = $this->videos->getById($id);
        include "views/videos/update.php";
    }

    // Update videos
    public function update($id, $data, $file) {
        $videos = $this->videos->getById($id);

        $this->videos->id = $id;
        $this->videos->title = $data['title'];
        $this->videos->isActive = isset($data['isActive']) ? 1 : 0;

        if (!empty($file['videos']['name'])) {
            $targetDir = "assets/img/uploads/videos/";
            $fileName = time() . "_" . basename($file['videos']['name']);
            $targetFile = $targetDir . $fileName;
            move_uploaded_file($file['videos']['tmp_name'], $targetFile);
            $this->videos->videos = $fileName;
        } else {
            $this->videos->videos = $videos['videos'];
        }

        $this->videos->update();
        header("Location: index.php?route=videos");
    }

    // Delete videos
    public function delete($id) {
        $this->videos->id = $id;
        $this->videos->delete();
        header("Location: index.php?route=videos");
    }

    // ✅ Get total count of videos
    public function getCount() {
        return $this->videos->getCount();
    }
}
