<?php
class Departments {
    private $conn;
    private $table = "departments";

    public $id;
    public $department_name;
    public $descriptions;
    public $department_image;
    public $isActive;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Fetch all departments
    public function getAll() {
        $query = "SELECT * FROM {$this->table} ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt; // controller will loop through
    }

    // Fetch single department
    public function getById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create department
    public function create() {
        $query = "INSERT INTO {$this->table} (department_name, descriptions, department_image, isActive) 
                  VALUES (:department_name, :descriptions, :department_image, :isActive)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":department_name", $this->department_name);
        $stmt->bindParam(":descriptions", $this->descriptions);
        $stmt->bindParam(":department_image", $this->department_image);
        $stmt->bindParam(":isActive", $this->isActive, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Update department
    public function update() {
        $query = "UPDATE {$this->table} SET department_name = :department_name, descriptions = :descriptions, 
                  department_image = :department_image, isActive = :isActive WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":department_name", $this->department_name);
        $stmt->bindParam(":descriptions", $this->descriptions);
        $stmt->bindParam(":department_image", $this->department_image);
        $stmt->bindParam(":isActive", $this->isActive, PDO::PARAM_INT);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Delete department
    public function delete() {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
