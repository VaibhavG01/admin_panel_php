<?php
require_once "models/Banner.php";

class BannerController {
    private $db;
    private $banner;

    public function __construct($db) {
        $this->db = $db;
        $this->banner = new Banner($db);
    }

    // List banners
    public function index() {
        $result = $this->banner->getAll();
        include "views/banner/banner.php";
    }

    // Show create form
    public function create() {
        include "views/banner/create.php";
    }

    // Store banner
    public function store($data, $file) {
        $this->banner->title = $data['title'];
        $this->banner->isActive = isset($data['isActive']) ? 1 : 0;

        // Handle image upload
        if (!empty($file['banner_image']['name'])) {
            $targetDir = "assets/img/uploads/banners/";
            if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
            $fileName = time() . "_" . basename($file['banner_image']['name']);
            $targetFile = $targetDir . $fileName;
            move_uploaded_file($file['banner_image']['tmp_name'], $targetFile);
            $this->banner->banner_image = $fileName;
        }

        $this->banner->create();
        header("Location: index.php?route=banners");
    }

    // Show edit form
    public function edit($id) {
        $banner = $this->banner->getById($id);
        include "views/banner/update.php";
    }

    // Update banner
    public function update($id, $data, $file) {
        $banner = $this->banner->getById($id);

        $this->banner->id = $id;
        $this->banner->title = $data['title'];
        $this->banner->isActive = isset($data['isActive']) ? 1 : 0;

        if (!empty($file['banner_image']['name'])) {
            $targetDir = "assets/img/uploads/banners/";
            $fileName = time() . "_" . basename($file['banner_image']['name']);
            $targetFile = $targetDir . $fileName;
            move_uploaded_file($file['banner_image']['tmp_name'], $targetFile);
            $this->banner->banner_image = $fileName;
        } else {
            $this->banner->banner_image = $banner['banner_image'];
        }

        $this->banner->update();
        header("Location: index.php?route=banners");
    }

    // Delete banner
    public function delete($id) {
        $this->banner->id = $id;
        $this->banner->delete();
        header("Location: index.php?route=banners");
    }
}
