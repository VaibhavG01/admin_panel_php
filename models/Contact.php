<?php
class Contact {
    private $conn;
    private $table = "contact";

    public $id;
    public $fullname;
    public $email;
    public $mobile_no;
    public $address;
    public $message;
    public $created_at;
    public $updated_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    // ✅ Get all contacts
    public function getAll() {
        $query = "SELECT * FROM {$this->table} ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // ✅ Get contact by ID
    public function getById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ✅ Create new contact
    public function create() {
        $query = "INSERT INTO {$this->table} (fullname, email, mobile_no, address, message) 
                  VALUES (:fullname, :email, :mobile_no, :address, :message)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":fullname", $this->fullname);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":mobile_no", $this->mobile_no);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":message", $this->message);

        return $stmt->execute();
    }

    // ✅ Update contact
    public function update() {
        $query = "UPDATE {$this->table} 
                  SET fullname = :fullname, email = :email, mobile_no = :mobile_no, address = :address, message = :message 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":fullname", $this->fullname);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":mobile_no", $this->mobile_no);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":message", $this->message);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    // ✅ Delete contact
    public function delete() {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
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
