<?php
require_once "models/Features.php";

class FeaturesController {
    private $db;
    private $feature;

    public function __construct($db) {
        $this->db = $db;
        $this->feature = new Features($db);
    }

    // List all features
    public function index() {
        $result = $this->feature->getAll();
        include "views/features/features.php";
    }

    // Show create form
    public function create() {
        include "views/features/create.php";
    }

    // Store feature
    public function store($data, $file) {
        $this->feature->features_name = $data['features_name'];
        $this->feature->descriptions = $data['descriptions'];
        $this->feature->isActive = isset($data['isActive']) ? 1 : 0;

        // Handle image upload
        if (!empty($file['feature_image']['name'])) {
            $targetDir = "assets/img//uploads/features/";
            if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
            $fileName = time() . "_" . basename($file['feature_image']['name']);
            $targetFile = $targetDir . $fileName;
            move_uploaded_file($file['feature_image']['tmp_name'], $targetFile);
            $this->feature->feature_image = $fileName;
        }

        $this->feature->create();
        header("Location: index.php?route=features");
    }

    // Show edit form
    public function edit($id) {
        $feature = $this->feature->getById($id);
        include "views/features/update.php";
    }

    // Update feature
    public function update($id, $data, $file) {
        $feature = $this->feature->getById($id);

        $this->feature->id = $id;
        $this->feature->features_name = $data['features_name'];
        $this->feature->descriptions = $data['descriptions'];
        $this->feature->isActive = isset($data['isActive']) ? 1 : 0;

        if (!empty($file['feature_image']['name'])) {
            $targetDir = "assets/img/uploads/features/";
            $fileName = time() . "_" . basename($file['feature_image']['name']);
            $targetFile = $targetDir . $fileName;
            move_uploaded_file($file['feature_image']['tmp_name'], $targetFile);
            $this->feature->feature_image = $fileName;
        } else {
            $this->feature->feature_image = $feature['feature_image'];
        }

        $this->feature->update();
        header("Location: index.php?route=features");
    }

    // Delete feature
    public function delete($id) {
        $this->feature->id = $id;
        $this->feature->delete();
        header("Location: index.php?route=features");
    }

    // ✅ Get total count of features
    public function getCount() {
        return $this->feature->getCount();
    }
}
