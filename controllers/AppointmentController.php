<?php
require_once "models/Appointment.php";

class AppointmentController {
    private $db;
    private $appointment;

    public function __construct($db) {
        $this->db = $db;
        $this->appointment = new Appointment($db);
    }

    // ✅ List all appointments
    public function index() {
        $result = $this->appointment->getAll();
        include "views/appointments/appointments.php";
    }

    // ✅ Show create form
    public function create() {
        include "views/appointments/create.php";
    }

    // ✅ Store appointment
    public function store($data) {
        $this->appointment->fullname   = $data['fullname'];
        $this->appointment->email      = $data['email'];
        $this->appointment->mobile_no  = $data['mobile_no'];
        $this->appointment->address    = $data['address'];
        $this->appointment->message    = $data['message'];
        $this->appointment->date       = $data['date'];
        $this->appointment->status     = "Pending"; // Default

        if ($this->appointment->create()) {
            header("Location: index.php?route=appointments");
            exit;
        }
    }

    // ✅ Show edit form
    public function edit($id) {
        $appointment = $this->appointment->getById($id);
        include "views/appointments/update.php";
    }

    // ✅ Update appointment
    public function update($id, $data) {
        $this->appointment->id         = $id;
        $this->appointment->fullname   = $data['fullname'];
        $this->appointment->email      = $data['email'];
        $this->appointment->mobile_no  = $data['mobile_no'];
        $this->appointment->address    = $data['address'];
        $this->appointment->message    = $data['message'];
        $this->appointment->date       = $data['date'];
        $this->appointment->status     = $data['status'] ?? "Pending";

        if ($this->appointment->update()) {
            header("Location: index.php?route=appointments");
            exit;
        }
    }

    // ✅ Delete appointment
    public function delete($id) {
        $this->appointment->id = $id;
        if ($this->appointment->delete()) {
            header("Location: index.php?route=appointments");
            exit;
        }
    }

    // ✅ Accept appointment
    public function accept($id) {
        $this->appointment->id = $id;
        if ($this->appointment->updateStatus("Accepted")) {
            header("Location: index.php?route=appointments");
            exit;
        }
    }

    // ✅ Reject appointment
    public function reject($id) {
        $this->appointment->id = $id;
        if ($this->appointment->updateStatus("Rejected")) {
            header("Location: index.php?route=appointments");
            exit;
        }
    }

    // ✅ Get total count of appointments
    public function getCount() {
        return $this->appointment->getCount();
    }

   


}
?>
