<?php
require_once "models/Services.php";

class ServicesController {
    private $db;
    private $service;

    public function __construct($db) {
        $this->db = $db;
        $this->service = new Services($db);
    }

    // List all services
    public function index() {
        $result = $this->service->getAll();
        include "views/services/services.php";
    }

    // Show create form
    public function create() {
        include "views/services/create.php";
    }

    // Store service
    public function store($data, $file) {
        $this->service->services_name = $data['services_name'];
        $this->service->descriptions = $data['descriptions'];
        $this->service->isActive = isset($data['isActive']) ? 1 : 0;

        // Handle image upload
        if (!empty($file['service_image']['name'])) {
            $targetDir = "assets/img//uploads/services/";
            if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
            $fileName = time() . "_" . basename($file['service_image']['name']);
            $targetFile = $targetDir . $fileName;
            move_uploaded_file($file['service_image']['tmp_name'], $targetFile);
            $this->service->service_image = $fileName;
        }

        $this->service->create();
        header("Location: index.php?route=services");
    }

    // Show edit form
    public function edit($id) {
        $service = $this->service->getById($id);
        include "views/services/update.php";
    }

    // Update service
    public function update($id, $data, $file) {
        $service = $this->service->getById($id);

        $this->service->id = $id;
        $this->service->services_name = $data['services_name'];
        $this->service->descriptions = $data['descriptions'];
        $this->service->isActive = isset($data['isActive']) ? 1 : 0;

        if (!empty($file['service_image']['name'])) {
            $targetDir = "assets/img/uploads/services/";
            $fileName = time() . "_" . basename($file['service_image']['name']);
            $targetFile = $targetDir . $fileName;
            move_uploaded_file($file['service_image']['tmp_name'], $targetFile);
            $this->service->service_image = $fileName;
        } else {
            $this->service->service_image = $service['service_image'];
        }

        $this->service->update();
        header("Location: index.php?route=services");
    }

    // Delete service
    public function delete($id) {
        $this->service->id = $id;
        $this->service->delete();
        header("Location: index.php?route=services");
    }
}
