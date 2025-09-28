<?php
class Services {
    private $conn;
    private $table = "services";

    public $id;
    public $services_name;
    public $descriptions;
    public $service_image;
    public $isActive;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Fetch all services
    public function getAll() {
        $query = "SELECT * FROM {$this->table} ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt; // controller will loop through
    }

    // Fetch single service
    public function getById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create service
    public function create() {
        $query = "INSERT INTO {$this->table} (services_name, descriptions, service_image, isActive) 
                  VALUES (:services_name, :descriptions, :service_image, :isActive)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":services_name", $this->services_name);
        $stmt->bindParam(":descriptions", $this->descriptions);
        $stmt->bindParam(":service_image", $this->service_image);
        $stmt->bindParam(":isActive", $this->isActive, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Update service
    public function update() {
        $query = "UPDATE {$this->table} SET services_name = :services_name, descriptions = :descriptions, 
                  service_image = :service_image, isActive = :isActive WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":services_name", $this->services_name);
        $stmt->bindParam(":descriptions", $this->descriptions);
        $stmt->bindParam(":service_image", $this->service_image);
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
}
