<?php
require_once "models/Testimonial.php";

class TestimonialController {
    private $db;
    private $testimonial;

    public function __construct($db) {
        $this->db = $db;
        $this->testimonial = new Testimonial($db);
    }

    // List all testimonials
    
    public function index() {
        $result = $this->testimonial->getAll(); // should be PDOStatement
        include "views/testimonials/testimonials.php";
    }


    // Show create form
    public function create() {
        include "views/testimonials/create.php";
    }

    // Store testimonial
    public function store($data, $file) {
        $this->testimonial->mediaType = $data['mediaType'];
        $this->testimonial->title = $data['title'];
        $this->testimonial->descriptions = $data['descriptions'];
        $this->testimonial->isActive = isset($data['isActive']) ? 1 : 0;

        // Handle media upload (image/video)
        if (!empty($file['mediaFile']['name'])) {
            $targetDir = "assets/img/uploads/testimonials/";
            if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

            $fileName = time() . "_" . basename($file['mediaFile']['name']);
            $targetFile = $targetDir . $fileName;

            if (move_uploaded_file($file['mediaFile']['tmp_name'], $targetFile)) {
                $this->testimonial->media = $fileName;
            }
        }

        $this->testimonial->create();
        header("Location: index.php?route=testimonials");
        exit;
    }

    // Show edit form
    public function edit($id) {
        $testimonial = $this->testimonial->getById($id);
        include "views/testimonials/update.php";
    }

    // Update testimonial
    public function update($id, $data, $file) {
        $testimonial = $this->testimonial->getById($id);

        $this->testimonial->id = $id;
        $this->testimonial->mediaType = $data['mediaType'];
        $this->testimonial->title = $data['title'];
        $this->testimonial->descriptions = $data['descriptions'];
        $this->testimonial->isActive = isset($data['isActive']) ? 1 : 0;

        // Handle media upload if new file uploaded
        if (!empty($file['mediaFile']['name'])) {
            $targetDir = "assets/img/uploads/testimonials/";
            $fileName = time() . "_" . basename($file['mediaFile']['name']);
            $targetFile = $targetDir . $fileName;

            if (move_uploaded_file($file['mediaFile']['tmp_name'], $targetFile)) {
                $this->testimonial->media = $fileName;
            }
        } else {
            // Keep old media if no new upload
            $this->testimonial->media = $testimonial['mediaFile'];
        }

        $this->testimonial->update();
        header("Location: index.php?route=testimonials");
        exit;
    }

    // Delete testimonial
    public function delete($id) {
        $this->testimonial->id = $id;
        $this->testimonial->delete();
        header("Location: index.php?route=testimonials");
        exit;
    }

    // ✅ Get total count of testimonial
    public function getCount() {
        return $this->testimonial->getCount();
    }
}
?>
