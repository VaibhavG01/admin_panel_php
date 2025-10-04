<?php
class Seo {
    private $conn;
    private $table = "seos";

    public $id;
    public $meta_tags;
    public $meta_descriptions;
    public $isActive;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Fetch all SEO records
    public function getAll() {
        $query = "SELECT * FROM {$this->table} ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Fetch single SEO record by ID
    public function getById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create new SEO record
    public function create() {
        $query = "INSERT INTO {$this->table} (meta_tags, meta_descriptions, isActive) 
                  VALUES (:meta_tags, :meta_descriptions, :isActive)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":meta_tags", $this->meta_tags);
        $stmt->bindParam(":meta_descriptions", $this->meta_descriptions);
        $stmt->bindParam(":isActive", $this->isActive, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Update existing SEO record
    public function update() {
        $query = "UPDATE {$this->table} 
                  SET meta_tags = :meta_tags, meta_descriptions = :meta_descriptions, isActive = :isActive
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":meta_tags", $this->meta_tags);
        $stmt->bindParam(":meta_descriptions", $this->meta_descriptions);
        $stmt->bindParam(":isActive", $this->isActive, PDO::PARAM_INT);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Delete SEO record
    public function delete() {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getCount() {
        $query = "SELECT COUNT(*) as total FROM {$this->table}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'] ?? 0;
    }
}
