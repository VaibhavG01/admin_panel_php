<?php
class Empanelment {
    private $conn;
    private $table = "empanelments";

    public $id;
    public $company_name;
    public $type;
    public $company_image;
    public $isActive;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Fetch all empanelments
    public function getAll() {
        $query = "SELECT * FROM {$this->table} ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Fetch single empanelment
    public function getById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create empanelment
    public function create() {
        $query = "INSERT INTO {$this->table} (company_name, type, company_image, isActive) 
                  VALUES (:company_name, :type, :company_image, :isActive)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":company_name", $this->company_name);
        $stmt->bindParam(":type", $this->type);
        $stmt->bindParam(":company_image", $this->company_image);
        $stmt->bindParam(":isActive", $this->isActive, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Update empanelment
    public function update() {
        $query = "UPDATE {$this->table} 
                  SET company_name = :company_name, type = :type, company_image = :company_image, isActive = :isActive
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":company_name", $this->company_name);
        $stmt->bindParam(":type", $this->type);
        $stmt->bindParam(":company_image", $this->company_image);
        $stmt->bindParam(":isActive", $this->isActive, PDO::PARAM_INT);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Delete empanelment
    public function delete() {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
