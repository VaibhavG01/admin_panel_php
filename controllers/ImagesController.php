<?php
require_once "models/Images.php";

class ImagesController {
    private $db;
    private $images;

    public function __construct($db) {
        $this->db = $db;
        $this->images = new Images($db);
    }

    // List images
    public function index() {
        $result = $this->images->getAll();
        include "views/images/images.php";
    }

    // Show create form
    public function create() {
        include "views/images/create.php";
    }

    // Store images
    public function store($data, $file) {
        $this->images->title = $data['title'];
        $this->images->isActive = isset($data['isActive']) ? 1 : 0;

        // Handle image upload
        if (!empty($file['images']['name'])) {
            $targetDir = "assets/img/uploads/images/";
            if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
            $fileName = time() . "_" . basename($file['images']['name']);
            $targetFile = $targetDir . $fileName;
            move_uploaded_file($file['images']['tmp_name'], $targetFile);
            $this->images->images = $fileName;
        }

        $this->images->create();
        header("Location: index.php?route=images");
    }

    // Show edit form
    public function edit($id) {
        $images = $this->images->getById($id);
        include "views/images/update.php";
    }

    // Update images
    public function update($id, $data, $file) {
        $images = $this->images->getById($id);

        $this->images->id = $id;
        $this->images->title = $data['title'];
        $this->images->isActive = isset($data['isActive']) ? 1 : 0;

        if (!empty($file['images']['name'])) {
            $targetDir = "assets/img/uploads/images/";
            $fileName = time() . "_" . basename($file['images']['name']);
            $targetFile = $targetDir . $fileName;
            move_uploaded_file($file['images']['tmp_name'], $targetFile);
            $this->images->images = $fileName;
        } else {
            $this->images->images = $images['images'];
        }

        $this->images->update();
        header("Location: index.php?route=images");
    }

    // Delete images
    public function delete($id) {
        $this->images->id = $id;
        $this->images->delete();
        header("Location: index.php?route=images");
    }

    // ✅ Get total count of images
    public function getCount() {
        return $this->images->getCount();
    }
}
