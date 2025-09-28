<?php
require_once "models/Profile.php";

class ProfileController {
    private $db;
    private $profile;

    public function __construct($db) {
        $this->db = $db;
        $this->profile = new Profile($db);
    }

    // List all profiles
    public function index() {
        $result = $this->profile->getAll();
        include "views/profiles/profile.php";
    }

    // Show create form
    public function create() {
        include "views/profiles/create.php";
    }

    // Store profile
    public function store($data, $file) {
        $this->profile->name = $data['name'];
        $this->profile->about = $data['about'];
        $this->profile->email = $data['email'];
        $this->profile->mobile_no = $data['mobile_no'];
        $this->profile->address = $data['address'];
        $this->profile->isActive = isset($data['isActive']) ? 1 : 0;

        // Handle image upload
        if (!empty($file['logo_image']['name'])) {
            $targetDir = "assets/img/uploads/profile/";
            if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
            $fileName = time() . "_" . basename($file['logo_image']['name']);
            $targetFile = $targetDir . $fileName;
            move_uploaded_file($file['logo_image']['tmp_name'], $targetFile);
            $this->profile->logo_image = $fileName;
        }

        $this->profile->create();
        header("Location: index.php?route=profile");
    }

    // Show edit form
    public function edit($id) {
        $profile = $this->profile->getById($id);
        include "views/profiles/update.php";
    }

    // Update profile
    public function update($id, $data, $file) {
        $profile = $this->profile->getById($id);

        $this->profile->id = $id;
        $this->profile->name = $data['name'];
        $this->profile->about = $data['about'];
        $this->profile->email = $data['email'];
        $this->profile->mobile_no = $data['mobile_no'];
        $this->profile->address = $data['address'];
        $this->profile->isActive = isset($data['isActive']) ? 1 : 0;

        if (!empty($file['logo_image']['name'])) {
            $targetDir = "assets/img/uploads/profile/";
            $fileName = time() . "_" . basename($file['logo_image']['name']);
            $targetFile = $targetDir . $fileName;
            move_uploaded_file($file['logo_image']['tmp_name'], $targetFile);
            $this->profile->logo_image = $fileName;
        } else {
            $this->profile->logo_image = $profile['logo_image'];
        }

        $this->profile->update();
        header("Location: index.php?route=profile");
    }

    // Delete profile
    public function delete($id) {
        $this->profile->id = $id;
        $this->profile->delete();
        header("Location: index.php?route=profile");
    }
}
