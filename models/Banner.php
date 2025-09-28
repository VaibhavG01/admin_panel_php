<?php
class Banner {
    private $conn;
    private $table = "banner";

    public $id;
    public $title;
    public $banner_image;
    public $isActive;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Fetch all banners
    public function getAll() {
        $query = "SELECT * FROM {$this->table} ORDER BY created_at ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    

    // Fetch single banner
    public function getById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create banner
    public function create() {
        $query = "INSERT INTO {$this->table} (title, banner_image, isActive) 
                  VALUES (:title, :banner_image, :isActive)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":banner_image", $this->banner_image);
        $stmt->bindParam(":isActive", $this->isActive, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Update banner
    public function update() {
        $query = "UPDATE {$this->table} 
                  SET title = :title, banner_image = :banner_image, isActive = :isActive 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":banner_image", $this->banner_image);
        $stmt->bindParam(":isActive", $this->isActive, PDO::PARAM_INT);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Delete banner
    public function delete() {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
