<?php
class Testimonial {
    private $conn;
    private $table = "testimonials";

    public $id;
    public $mediaType;
    public $media; // image or video filename/url
    public $title;
    public $descriptions;
    public $isActive;
    public $created_at;
    public $updated_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    
    // Testimonial.php
    public function getAll() {
        $query = "SELECT * FROM {$this->table} ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt; // returns PDOStatement
    }


    // ✅ Get testimonial by ID
    public function getById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create
    public function create() {
        $query = "INSERT INTO {$this->table} (mediaType, mediaFile, title, descriptions, isActive) 
                VALUES (:mediaType, :mediaFile, :title, :descriptions, :isActive)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":mediaType", $this->mediaType);
        $stmt->bindParam(":mediaFile", $this->media); // make sure $this->media matches your file column
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":descriptions", $this->descriptions);
        $stmt->bindParam(":isActive", $this->isActive);
        return $stmt->execute();
    }

    // Update
    public function update() {
        $query = "UPDATE {$this->table} 
                SET mediaType=:mediaType, mediaFile=:mediaFile, title=:title, descriptions=:descriptions, isActive=:isActive 
                WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":mediaType", $this->mediaType);
        $stmt->bindParam(":mediaFile", $this->media);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":descriptions", $this->descriptions);
        $stmt->bindParam(":isActive", $this->isActive);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }


    // ✅ Delete testimonial
    public function delete() {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }
}
?>
