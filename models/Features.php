<?php
class Features {
    private $conn;
    private $table = "features";

    public $id;
    public $features_name;
    public $descriptions;
    public $feature_image;
    public $isActive;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Fetch all features
    public function getAll() {
        $query = "SELECT * FROM {$this->table} ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt; // controller will loop through
    }

    // Fetch single features
    public function getById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create service
    public function create() {
        $query = "INSERT INTO {$this->table} (features_name, descriptions, feature_image, isActive) 
                  VALUES (:features_name, :descriptions, :feature_image, :isActive)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":features_name", $this->features_name);
        $stmt->bindParam(":descriptions", $this->descriptions);
        $stmt->bindParam(":feature_image", $this->feature_image);
        $stmt->bindParam(":isActive", $this->isActive, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Update feature
    public function update() {
        $query = "UPDATE {$this->table} SET features_name = :features_name, descriptions = :descriptions, 
                  feature_image = :feature_image, isActive = :isActive WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":features_name", $this->features_name);
        $stmt->bindParam(":descriptions", $this->descriptions);
        $stmt->bindParam(":feature_image", $this->feature_image);
        $stmt->bindParam(":isActive", $this->isActive, PDO::PARAM_INT);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Delete service
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
