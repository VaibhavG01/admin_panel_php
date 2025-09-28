<?php
require_once "models/Contact.php";

class ContactController {
    private $db;
    private $contact;

    public function __construct($db) {
        $this->db = $db;
        $this->contact = new Contact($db);
    }

    // ✅ List all contacts
    public function index() {
        $result = $this->contact->getAll();
        include "views/contact/contact.php";
    }

    // ✅ Show create form
    public function create() {
        include "views/contact/create.php";
    }

    // ✅ Store contact
    public function store($data) {
        $this->contact->fullname   = $data['fullname'];
        $this->contact->email      = $data['email'];
        $this->contact->mobile_no  = $data['mobile_no'];
        $this->contact->address    = $data['address'];
        $this->contact->message    = $data['message'];

        if ($this->contact->create()) {
            header("Location: index.php?route=contact");
            exit;
        }
    }

    // ✅ Show edit form
    public function edit($id) {
        $contact = $this->contact->getById($id);
        include "views/contact/update.php";
    }

    // ✅ Update contact
    public function update($id, $data) {
        $this->contact->id         = $id;
        $this->contact->fullname   = $data['fullname'];
        $this->contact->email      = $data['email'];
        $this->contact->mobile_no  = $data['mobile_no'];
        $this->contact->address    = $data['address'];
        $this->contact->message    = $data['message'];

        if ($this->contact->update()) {
            header("Location: index.php?route=contact");
            exit;
        }
    }

    // ✅ Delete contact
    public function delete($id) {
        $this->contact->id = $id;
        if ($this->contact->delete()) {
            header("Location: index.php?route=contact");
            exit;
        }
    }

    // ✅ Get total count of contacts
    public function getCount() {
        return $this->contact->getCount();
    }
}
?>
