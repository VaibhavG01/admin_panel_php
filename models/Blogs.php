<?php
class Blogs {
    private $conn;
    private $table = "blogs";

    public $id;
    public $blog_name;  
    public $descriptions;
    public $blog_image;
    public $isActive;
    public $tags;
    public $author;


    public function __construct($db) {
        $this->conn = $db;
    }

    // Fetch all blogs
    public function getAll() {
        $query = "SELECT * FROM {$this->table} ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt; 
    }

    // Fetch single blog by ID
    public function getById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create blog
    public function create() {
        $query = "INSERT INTO {$this->table} (blog_name, descriptions, blog_image, isActive, tags, author) 
                  VALUES (:blog_name, :descriptions, :blog_image, :isActive, :tags, :author)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":blog_name", $this->blog_name);
        $stmt->bindParam(":descriptions", $this->descriptions);
        $stmt->bindParam(":blog_image", $this->blog_image);
        $stmt->bindParam(":isActive", $this->isActive, PDO::PARAM_INT);
        $stmt->bindParam(":tags", $this->tags);
        $stmt->bindParam(":author", $this->author);
        return $stmt->execute();
    }

    // Update blog
    public function update() {
        $query = "UPDATE {$this->table} SET blog_name = :blog_name, descriptions = :descriptions, 
                  blog_image = :blog_image, isActive = :isActive, tags = :tags, author = :author WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":blog_name", $this->blog_name);
        $stmt->bindParam(":descriptions", $this->descriptions);
        $stmt->bindParam(":blog_image", $this->blog_image);
        $stmt->bindParam(":isActive", $this->isActive, PDO::PARAM_INT);
        $stmt->bindParam(":tags", $this->tags);
        $stmt->bindParam(":author", $this->author);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Delete blog
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
