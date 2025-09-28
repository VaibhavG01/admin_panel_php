<?php
class Profile {
    private $conn;
    private $table = "profile";

    public $id;
    public $name;
    public $email;
    public $mobile_no;
    public $descriptions;
    public $logo_image;
    public $address;
    public $about; 
    public $isActive;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Fetch all profile
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

    // Create profile
    public function create() {
        $query = "INSERT INTO {$this->table} (name, email, mobile_no, about, logo_image, address, isActive) 
                  VALUES (:name, :email, :mobile_no, :about, :logo_image, :address, :isActive)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":about", $this->about);
        $stmt->bindParam(":logo_image", $this->logo_image);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":mobile_no", $this->mobile_no);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":isActive", $this->isActive, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Update profile
    public function update() {
        $query = "UPDATE {$this->table} SET name = :name, about = :about, email = :email, mobile_no = :mobile_no, address = :address, logo_image = :logo_image, isActive = :isActive WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":about", $this->about);
        $stmt->bindParam(":logo_image", $this->logo_image);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":mobile_no", $this->mobile_no);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":isActive", $this->isActive, PDO::PARAM_INT);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Delete profile
    public function delete() {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
