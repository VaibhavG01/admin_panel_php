<?php
require_once "models/Review.php";

class ReviewController {
    private $db;
    private $review;

    public function __construct($db) {
        $this->db = $db;
        $this->review = new Review($db);
    }

    // List all reviews
    public function index() {
        $result = $this->review->getAll();
        include "views/reviews/reviews.php";
    }

    // Show create form
    public function create() {
        include "views/reviews/create.php";
    }

    // Store new review
    public function store($data) {
        $this->review->rating = $data['rating'];
        $this->review->name = $data['name'];
        $this->review->description = $data['description'];
        $this->review->isActive = isset($data['isActive']) ? 1 : 0;

        $this->review->create();
        header("Location: index.php?route=reviews");
        exit;
    }

    // Show edit form
    public function edit($id) {
        $review = $this->review->getById($id);
        include "views/reviews/update.php";
    }

    // Update review
    public function update($id, $data) {
        $this->review->id = $id;
        $this->review->rating = $data['rating'];
        $this->review->name = $data['name'];
        $this->review->description = $data['description'];
        $this->review->isActive = isset($data['isActive']) ? 1 : 0;

        $this->review->update();
        header("Location: index.php?route=reviews");
        exit;
    }

    // Delete review
    public function delete($id) {
        $this->review->id = $id;
        $this->review->delete();
        header("Location: index.php?route=reviews");
        exit;
    }
}
?>
