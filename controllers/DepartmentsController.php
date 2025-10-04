<?php
require_once "models/Departments.php";

class DepartmentsController {
    private $db;
    private $department;

    public function __construct($db) {
        $this->db = $db;
        $this->department = new Departments($db);
    }

    // List all departments
    public function index() {
        $result = $this->department->getAll();
        include "views/departments/departments.php";
    }

    // Show create form
    public function create() {
        include "views/departments/create.php";
    }

    // Store department
    public function store($data, $file) {
        $this->department->department_name = $data['department_name'];
        $this->department->descriptions = $data['descriptions'];
        $this->department->isActive = isset($data['isActive']) ? 1 : 0;

        // Handle image upload
        if (!empty($file['department_image']['name'])) {
            $targetDir = "assets/img/uploads/department/";
            if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
            $fileName = time() . "_" . basename($file['department_image']['name']);
            $targetFile = $targetDir . $fileName;
            move_uploaded_file($file['department_image']['tmp_name'], $targetFile);
            $this->department->department_image = $fileName;
        }

        $this->department->create();
        header("Location: index.php?route=departments");
    }

    // Show edit form
    public function edit($id) {
        $department = $this->department->getById($id);
        include "views/departments/update.php";
    }

    // Update department
    public function update($id, $data, $file) {
        $department = $this->department->getById($id);

        $this->department->id = $id;
        $this->department->department_name = $data['department_name'];
        $this->department->descriptions = $data['descriptions'];
        $this->department->isActive = isset($data['isActive']) ? 1 : 0;

        if (!empty($file['department_image']['name'])) {
            $targetDir = "assets/img/uploads/department/";
            $fileName = time() . "_" . basename($file['department_image']['name']);
            $targetFile = $targetDir . $fileName;
            move_uploaded_file($file['department_image']['tmp_name'], $targetFile);
            $this->department->department_image = $fileName;
        } else {
            $this->department->department_image = $department['department_image'];
        }

        $this->department->update();
        header("Location: index.php?route=departments");
    }

    // Delete department
    public function delete($id) {
        $this->department->id = $id;
        $this->department->delete();
        header("Location: index.php?route=departments");
    }

    // ✅ Get total count of departments
    public function getCount() {
        return $this->department->getCount();
    }
}
