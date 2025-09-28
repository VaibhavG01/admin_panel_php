<?php
require_once "models/Empanelments.php";

class EmpanelmentController {
    private $db;
    private $empanelment;

    public function __construct($db) {
        $this->db = $db;
        $this->empanelment = new Empanelment($db);
    }

    // List all empanelments
    public function index() {
        $result = $this->empanelment->getAll();
        include "views/empanelments/empanelments.php";
    }

    // Show create form
    public function create() {
        include "views/empanelments/create.php";
    }

    // Store empanelment
    public function store($data, $file) {
        $this->empanelment->company_name = $data['company_name'];
        $this->empanelment->type = $data['type'];
        $this->empanelment->isActive = isset($data['isActive']) ? 1 : 0;

        // Handle image upload
        if (!empty($file['company_image']['name'])) {
            $targetDir = "assets/img/uploads/empanelments/";
            if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
            $fileName = time() . "_" . basename($file['company_image']['name']);
            $targetFile = $targetDir . $fileName;
            move_uploaded_file($file['company_image']['tmp_name'], $targetFile);
            $this->empanelment->company_image = $fileName;
        }

        $this->empanelment->create();
        header("Location: index.php?route=empanelments");
    }

    // Show edit form
    public function edit($id) {
        $empanelment = $this->empanelment->getById($id);
        include "views/empanelments/update.php";
    }

    // Update empanelment
    public function update($id, $data, $file) {
        $empanelment = $this->empanelment->getById($id);

        $this->empanelment->id = $id;
        $this->empanelment->company_name = $data['company_name'];
        $this->empanelment->type = $data['type'];
        $this->empanelment->isActive = isset($data['isActive']) ? 1 : 0;

        if (!empty($file['company_image']['name'])) {
            $targetDir = "assets/img/uploads/empanelments/";
            $fileName = time() . "_" . basename($file['company_image']['name']);
            $targetFile = $targetDir . $fileName;
            move_uploaded_file($file['company_image']['tmp_name'], $targetFile);
            $this->empanelment->company_image = $fileName;
        } else {
            $this->empanelment->company_image = $empanelment['company_image'];
        }

        $this->empanelment->update();
        header("Location: index.php?route=empanelments");
    }

    // Delete empanelment
    public function delete($id) {
        $this->empanelment->id = $id;
        $this->empanelment->delete();
        header("Location: index.php?route=empanelments");
    }
}
?>
