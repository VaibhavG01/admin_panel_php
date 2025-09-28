<?php
require_once "models/SocialMedia.php";

class SocialMediaController {
    private $db;
    private $social;

    public function __construct($db) {
        $this->db = $db;
        $this->social = new SocialMedia($db);
    }

    // List all
    public function index() {
        $result = $this->social->getAll();
        include "views/social_media/social_media.php";
    }

    // Show create form
    public function create() {
        include "views/social_media/create.php";
    }

    // Store
    public function store($data) {
        $this->social->name = $data['name'];
        $this->social->url = $data['url'];
        $this->social->icon = $data['icon'];
        $this->social->isActive = isset($data['isActive']) ? 1 : 0;
        $this->social->create();
        header("Location: index.php?route=social_media");
    }

    // Show edit form
    public function edit($id) {
        $social = $this->social->getById($id);
        include "views/social_media/update.php";
    }

    // Update
    public function update($id, $data) {
        $this->social->id = $id;
        $this->social->name = $data['name'];
        $this->social->url = $data['url'];
        $this->social->icon = $data['icon'];
        $this->social->isActive = isset($data['isActive']) ? 1 : 0;
        $this->social->update();
        header("Location: index.php?route=social_media");
    }

    // Delete
    public function delete($id) {
        $this->social->id = $id;
        $this->social->delete();
        header("Location: index.php?route=social_media");
    }
}
?>
