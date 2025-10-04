<?php
class Users {
    private $conn;
    private $table = "users";

    public $id;
    public $username;
    public $occupation;
    public $speciality;
    public $about;
    public $user_image;
    public $timing;
    public $social_media_links;
    public $social_media_title;
    public $post;
    public $isActive;
    public $created_at;
    public $updated_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Fetch all users
    public function getAll() {
        $query = "SELECT * FROM {$this->table} ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Fetch single user
    public function getById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create user
    public function create() {
        $query = "INSERT INTO {$this->table} 
            (username, occupation, speciality, about, user_image, timing, social_media_links, social_media_title, post, isActive) 
            VALUES 
            (:username, :occupation, :speciality, :about, :user_image, :timing, :social_media_links, :social_media_title, :post, :isActive)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":occupation", $this->occupation);
        $stmt->bindParam(":speciality", $this->speciality);
        $stmt->bindParam(":about", $this->about);
        $stmt->bindParam(":user_image", $this->user_image);
        $stmt->bindParam(":timing", $this->timing);
        $stmt->bindParam(":social_media_links", $this->social_media_links);
        $stmt->bindParam(":social_media_title", $this->social_media_title);
        $stmt->bindParam(":post", $this->post);
        $stmt->bindParam(":isActive", $this->isActive);
        return $stmt->execute();
    }

    // Update user
    public function update() {
        $query = "UPDATE {$this->table} SET 
            username=:username,
            occupation=:occupation,
            speciality=:speciality,
            about=:about,
            user_image=:user_image,
            timing=:timing,
            social_media_links=:social_media_links,
            social_media_title=:social_media_title,
            post=:post,
            isActive=:isActive
            WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":occupation", $this->occupation);
        $stmt->bindParam(":speciality", $this->speciality);
        $stmt->bindParam(":about", $this->about);
        $stmt->bindParam(":user_image", $this->user_image);
        $stmt->bindParam(":timing", $this->timing);
        $stmt->bindParam(":social_media_links", $this->social_media_links);
        $stmt->bindParam(":social_media_title", $this->social_media_title);
        $stmt->bindParam(":post", $this->post);
        $stmt->bindParam(":isActive", $this->isActive);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }

    // Delete user
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
