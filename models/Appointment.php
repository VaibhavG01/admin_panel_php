<?php
class Appointment {
    private $conn;
    private $table = "appointments";

    public $id;
    public $fullname;
    public $email;
    public $mobile_no;
    public $address;
    public $message;
    public $date;
    public $status; // ✅ accept/reject/pending
    public $created_at;
    public $updated_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    // ✅ Get all appointments
    public function getAll() {
        $query = "SELECT * FROM {$this->table} ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // ✅ Get appointment by ID
    public function getById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // Create method
    public function create() {
        $query = "INSERT INTO {$this->table} 
                (fullname, email, mobile_no, address, message, date, status) 
                VALUES (:fullname, :email, :mobile_no, :address, :message, :date, :status)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":fullname", $this->fullname);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":mobile_no", $this->mobile_no);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":message", $this->message);
        $stmt->bindParam(":date", $this->date);
        $stmt->bindParam(":status", $this->status);

        return $stmt->execute();
    }

    // Update method
    public function update() {
        $query = "UPDATE {$this->table} 
                SET fullname = :fullname, email = :email, mobile_no = :mobile_no, 
                    address = :address, message = :message, date = :date, status = :status
                WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":fullname", $this->fullname);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":mobile_no", $this->mobile_no);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":message", $this->message);
        $stmt->bindParam(":date", $this->date);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    // ✅ Update status only (accept/reject)
    public function updateStatus($status) {
        $query = "UPDATE {$this->table} SET status = :status WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }

    // ✅ Delete appointment
    public function delete() {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }
}
?>
