<?php
require_once "models/Seo.php";

class SeosController {
    private $db;
    private $seo;

    public function __construct($db) {
        $this->db = $db;
        $this->seo = new Seo($db);
    }

    // List all SEO records
    public function index() {
        $result = $this->seo->getAll();
        include "views/seo/seos.php";
    }

    // Show create form
    public function create() {
        include "views/seo/create.php";
    }

    // Store new SEO record
    public function store($data) {
        $this->seo->meta_tags = $data['meta_tags'];
        $this->seo->meta_descriptions = $data['meta_descriptions'];
        $this->seo->isActive = isset($data['isActive']) ? 1 : 0;
        $this->seo->create();
        header("Location: index.php?route=seos");
    }

    // Show edit form
    public function edit($id) {
        $seo = $this->seo->getById($id);
        include "views/seo/update.php";
    }

    // Update existing SEO record
    public function update($id, $data) {
        $this->seo->id = $id;
        $this->seo->meta_tags = $data['meta_tags'];
        $this->seo->meta_descriptions = $data['meta_descriptions'];
        $this->seo->isActive = isset($data['isActive']) ? 1 : 0;
        $this->seo->update();
        header("Location: index.php?route=seos");
    }

    // Delete SEO record
    public function delete($id) {
        $this->seo->id = $id;
        $this->seo->delete();
        header("Location: index.php?route=seos");
    }

    // ✅ Get total count of seos
    public function getCount() {
        return $this->seo->getCount();
    }
}
