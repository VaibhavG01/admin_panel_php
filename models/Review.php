<?php
class Review {
    private $conn;
    private $table = "reviews";

    public $id;
    public $rating;
    public $name;
    public $description;
    public $isActive;
    public $created_at;
    public $updated_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Fetch all reviews
    public function getAll() {
        $query = "SELECT * FROM {$this->table} ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Fetch single review
    public function getById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create review
    public function create() {
        $query = "INSERT INTO {$this->table} (rating, name, description, isActive)
                  VALUES (:rating, :name, :description, :isActive)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":rating", $this->rating);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":isActive", $this->isActive);
        return $stmt->execute();
    }

    // Update review
    public function update() {
        $query = "UPDATE {$this->table} 
                  SET rating=:rating, name=:name, description=:description, isActive=:isActive
                  WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":rating", $this->rating);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":isActive", $this->isActive);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }

    // Delete review
    public function delete() {
        $query = "DELETE FROM {$this->table} WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
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
?>
