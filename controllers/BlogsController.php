<?php
require_once "models/Blogs.php";

class BlogsController {
    private $db;
    private $blogs;

    public function __construct($db) {
        $this->db = $db;
        $this->blog = new Blogs($db);
    }

    // List all blogs
    public function index() {
        $result = $this->blog->getAll();
        include "views/blogs/blogs.php";
    }

    // Show create form
    public function create() {
        include "views/blogs/create.php";
    }

    // Store blog
    public function store($data, $file) {
        $this->blog->blog_name = $data['blog_name'];
        $this->blog->descriptions = $data['descriptions'];
        $this->blog->isActive = isset($data['isActive']) ? 1 : 0;
        $this->blog->tags = $data['tags'];
        $this->blog->author = $data['author'];

        // Handle image upload
        if (!empty($file['blog_image']['name'])) {
            $targetDir = "assets/img/uploads/blogs/";
            if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
            $fileName = time() . "_" . basename($file['blog_image']['name']);
            $targetFile = $targetDir . $fileName;
            move_uploaded_file($file['blog_image']['tmp_name'], $targetFile);
            $this->blog->blog_image = $fileName;
        }

        $this->blog->create();
        header("Location: index.php?route=blogs");
    }

    // Show edit form
    public function edit($id) {
        $blog = $this->blog->getById($id);
        include "views/blogs/update.php";
    }

    // Update blog
    public function update($id, $data, $file) {
        $blog = $this->blog->getById($id);

        $this->blog->id = $id;
        $this->blog->blog_name = $data['blog_name'];
        $this->blog->descriptions = $data['descriptions'];
        $this->blog->isActive = isset($data['isActive']) ? 1 : 0;
        $this->blog->tags = $data['tags'];
        $this->blog->author = $data['author'];

        // Handle image upload
        if (!empty($file['blog_image']['name'])) {
            $targetDir = "assets/img/uploads/blogs/";
            $fileName = time() . "_" . basename($file['blog_image']['name']);
            $targetFile = $targetDir . $fileName;
            move_uploaded_file($file['blog_image']['tmp_name'], $targetFile);
            $this->blog->blog_image = $fileName;
        } else {
            $this->blog->blog_image = $blog['blog_image'];
        }

        $this->blog->update();
        header("Location: index.php?route=blogs");
    }

    // Delete blog
    public function delete($id) {
        $this->blog->id = $id;
        $this->blog->delete();
        header("Location: index.php?route=blogs");
    }
}
