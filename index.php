<?php
require_once "db/config.php";
require_once "controllers/AuthController.php";
require_once "controllers/BannerController.php";
require_once "controllers/ServicesController.php";
require_once "controllers/FeaturesController.php";
require_once "controllers/DepartmentsController.php";
require_once "controllers/BlogsController.php";
require_once "controllers/ImagesController.php";
require_once "controllers/VideosController.php";
require_once "controllers/ProfileController.php";
require_once "controllers/EmpanelmentsController.php";
require_once "controllers/SeosController.php";
require_once 'controllers/SocialMediaController.php';
require_once 'controllers/TestimonialController.php';
require_once 'controllers/ReviewController.php';
require_once 'controllers/UsersController.php';
require_once "controllers/AppointmentController.php";
require_once "controllers/ContactController.php";

$authController = new AuthController();

$database = new Database();
$db = $database->getConnection();

$bannercontroller = new BannerController($db);
$servicesController = new ServicesController($db);
$featuresController = new FeaturesController($db);
$departmentsController = new DepartmentsController($db);
$blogsController = new BlogsController($db);
$imagesController = new ImagesController($db);
$videosController = new VideosController($db);
$profileController = new ProfileController($db);
$empanelmentsController = new EmpanelmentController($db);
$seosController = new SeosController($db);
$socialmediaController = new SocialMediaController($db);
$testimonialController = new TestimonialController($db);
$reviewController = new ReviewController($db);
$usersController = new UsersController($db);
$appointmentsController = new AppointmentController($db);
$contactController = new ContactController($db);
    

// Get the route safely, default to signin
$route = $_GET['route'] ?? 'signin';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // POST requests

    // Auth POST Routes
    if ($route === 'signup') {
        $authController->signup($_POST);
    } elseif ($route === 'signin') {
        $authController->signin($_POST);
    } 
    
    // Banner POST Routes
    elseif($route === 'banner_store'){
        $bannercontroller->store($_POST, $_FILES);
    } elseif($route === 'banner_update'){
        $bannercontroller->update($_GET['id'], $_POST, $_FILES);
    }

    // Servcies POST Routes
    elseif($route === 'service_store'){
        $servicesController->store($_POST, $_FILES);
    } elseif($route === 'service_update'){
        $servicesController->update($_GET['id'], $_POST, $_FILES);
    }

    // Features POST Routes
    elseif($route === 'features_store'){
        $featuresController->store($_POST, $_FILES);
    } elseif($route === 'features_update'){
        $featuresController->update($_GET['id'], $_POST, $_FILES);
    }

    // Departments POST Routes
    elseif($route === 'departments_store'){
        $departmentsController->store($_POST, $_FILES);
    } elseif($route === 'departments_update'){
        $departmentsController->update($_GET['id'], $_POST, $_FILES);
    }

    // Blogs POST Routes
    elseif($route === 'blogs_store'){
        $blogsController->store($_POST, $_FILES);
    } elseif($route === 'blogs_update'){
        $blogsController->update($_GET['id'], $_POST, $_FILES);
    }

    // Images POST Routes
    elseif($route === 'images_store'){
        $imagesController->store($_POST, $_FILES);
    } elseif($route === 'images_update'){
        $imagesController->update($_GET['id'], $_POST, $_FILES);
    }

    // Videos POST Routes
    elseif($route === 'videos_store'){
        $videosController->store($_POST, $_FILES);
    } elseif($route === 'videos_update'){
        $videosController->update($_GET['id'], $_POST, $_FILES);
    }

    // Profile POST Routes
    elseif($route === 'profile_store'){
        $profileController->store($_POST, $_FILES);
    } elseif($route === 'profile_update'){
        $profileController->update($_GET['id'], $_POST, $_FILES);
    }

    // Empanelments POST Routes
    elseif($route === 'empanelment_store'){
        $empanelmentsController->store($_POST, $_FILES);
    } elseif($route === 'empanelment_update'){
        $empanelmentsController->update($_GET['id'], $_POST, $_FILES);
    }

    // SEOs POST Routes
    elseif($route === 'seo_store'){
        $seosController->store($_POST, $_FILES);
    } elseif($route === 'seo_update'){
        $seosController->update($_GET['id'], $_POST, $_FILES);
    }

    // Socaial Media POST Routes
    elseif($route === 'social_media_store'){
        $socialmediaController->store($_POST, $_FILES);
    } elseif($route === 'social_media_update'){
        $socialmediaController->update($_GET['id'], $_POST, $_FILES);
    }

    // Testimonials Media POST Routes
    elseif($route === 'testimonial_store'){
        $testimonialController->store($_POST, $_FILES);
    } elseif($route === 'testimonial_update'){
        $testimonialController->update($_GET['id'], $_POST, $_FILES);
    }

    // Reviews Media POST Routes
    elseif($route === 'reviews_store'){
        $reviewController->store($_POST, $_FILES);
    } elseif($route === 'reviews_update'){
        $reviewController->update($_GET['id'], $_POST, $_FILES);
    }

    // Users Media POST Routes
    elseif($route === 'user_store'){
        $usersController->store($_POST, $_FILES);
    } elseif($route === 'user_update'){
        $usersController->update($_GET['id'], $_POST, $_FILES);
    }

    // Appointments  POST Routes
    elseif($route === 'appointments_store'){
        $appointmentsController->store($_POST, $_FILES);
    } elseif($route === 'appointments_update'){
        $appointmentsController->update($_GET['id'], $_POST, $_FILES);
    }

    // Contact  POST Routes
    elseif($route === 'contact_store'){
        $contactController->store($_POST, $_FILES);
    } elseif($route === 'contact_update'){
        $contactController->update($_GET['id'], $_POST, $_FILES);
    }

} else {
    // GET requests
    if ($route === 'signup') {
        require "views/auth/signup.php";
    } elseif ($route === 'signin') {
        require "views/auth/signin.php";
    } elseif ($route === 'user_dashboard') {
        require "views/dashboard/user.php";
    } elseif ($route === 'admin_dashboard') {
        require "views/dashboard/admin.php";
    }   
    
    // Banners Routes GET 
    elseif ($route === 'banners') {
        $bannercontroller->index();
    }
    elseif ($route === 'banner_create') {
        $bannercontroller->create();
    }  
    elseif($route === 'banner_edit'){
        $bannercontroller->edit($_GET['id']);
    } 
    elseif($route === 'banner_delete'){
        $bannercontroller->delete($_GET['id']);
    }

    // Services Routes GET 
    elseif ($route === 'services') {
        $servicesController->index();
    }
    elseif ($route === 'service_create') {
        $servicesController->create();
    }  
    elseif($route === 'service_edit'){
        $servicesController->edit($_GET['id']);
    } 
    elseif($route === 'service_delete'){
        $servicesController->delete($_GET['id']);
    }

    // Features Routes GET 
    elseif ($route === 'features') {
        $featuresController->index();
    }
    elseif ($route === 'feature_create') {
        $featuresController->create();
    }  
    elseif($route === 'features_edit'){
        $featuresController->edit($_GET['id']);
    } 
    elseif($route === 'features_delete'){
        $featuresController->delete($_GET['id']);
    }

    // Departments Routes GET 
    elseif ($route === 'departments') {
        $departmentsController->index();
    }
    elseif ($route === 'departments_create') {
        $departmentsController->create();
    }  
    elseif($route === 'departments_edit'){
        $departmentsController->edit($_GET['id']);
    } 
    elseif($route === 'departments_delete'){
        $departmentsController->delete($_GET['id']);
    }

    // Blogs Routes GET 
    elseif ($route === 'blogs') {
        $blogsController->index();
    }
    elseif ($route === 'blogs_create') {
        $blogsController->create();
    }  
    elseif($route === 'blogs_edit'){
        $blogsController->edit($_GET['id']);
    } 
    elseif($route === 'blogs_delete'){
        $blogsController->delete($_GET['id']);
    }

    // Images Routes GET 
    elseif ($route === 'images') {
        $imagesController->index();
    }
    elseif ($route === 'image_create') {
        $imagesController->create();
    }  
    elseif($route === 'image_edit'){
        $imagesController->edit($_GET['id']);
    } 
    elseif($route === 'image_delete'){
        $imagesController->delete($_GET['id']);
    }

    // Videos Routes GET 
    elseif ($route === 'videos') {
        $videosController->index();
    }
    elseif ($route === 'video_create') {
        $videosController->create();
    }  
    elseif($route === 'video_edit'){
        $videosController->edit($_GET['id']);
    } 
    elseif($route === 'video_delete'){
        $videosController->delete($_GET['id']);
    }

    // Profile Routes GET 
    elseif ($route === 'profile') {
        $profileController->index();
    }
    elseif ($route === 'profile_create') {
        $profileController->create();
    }  
    elseif($route === 'profile_edit'){
        $profileController->edit($_GET['id']);
    } 
    elseif($route === 'profile_delete'){
        $profileController->delete($_GET['id']);
    }
    
    // Empanelments Routes GET 
    elseif ($route === 'empanelments') {
        $empanelmentsController->index();
    }
    elseif ($route === 'empanelment_create') {
        $empanelmentsController->create();
    }  
    elseif($route === 'empanelment_edit'){
        $empanelmentsController->edit($_GET['id']);
    } 
    elseif($route === 'empanelment_delete'){
        $empanelmentsController->delete($_GET['id']);
    }

    // SEOs Routes GET 
    elseif ($route === 'seos') {
        $seosController->index();
    }
    elseif ($route === 'seos_create') {
        $seosController->create();
    }  
    elseif($route === 'seos_edit'){
        $seosController->edit($_GET['id']);
    } 
    elseif($route === 'seos_delete'){
        $seosController->delete($_GET['id']);
    }

     // Social Media Routes GET 
    elseif ($route === 'social_media') {
        $socialmediaController->index();
    }
    elseif ($route === 'social_media_create') {
        $socialmediaController->create();
    }  
    elseif($route === 'social_media_edit'){
        $socialmediaController->edit($_GET['id']);
    } 
    elseif($route === 'social_media_delete'){
        $socialmediaController->delete($_GET['id']);
    }

    // Testimonial Routes GET 
    elseif ($route === 'testimonials') {
        $testimonialController->index();
    }
    elseif ($route === 'testimonial_create') {
        $testimonialController->create();
    }  
    elseif($route === 'testimonial_edit'){
        $testimonialController->edit($_GET['id']);
    } 
    elseif($route === 'testimonial_delete'){
        $testimonialController->delete($_GET['id']);
    }

     // Review Routes GET 
    elseif ($route === 'reviews') {
        $reviewController->index();
    }
    elseif ($route === 'review_create') {
        $reviewController->create();
    }  
    elseif($route === 'review_edit'){
        $reviewController->edit($_GET['id']);
    } 
    elseif($route === 'review_delete'){
        $reviewController->delete($_GET['id']);
    }

    // Users Routes GET 
    elseif ($route === 'users') {
        $usersController->index();
    }
    elseif ($route === 'user_create') {
        $usersController->create();
    }  
    elseif($route === 'user_edit'){
        $usersController->edit($_GET['id']);
    } 
    elseif($route === 'user_delete'){
        $usersController->delete($_GET['id']);
    }

    // Appointments Routes GET
    elseif ($route === 'appointments') {
        $appointmentsController->index();
    }
    elseif ($route === 'appointments_create') {
        $appointmentsController->create();
    }  
    elseif($route === 'appointments_edit'){
        $appointmentsController->edit($_GET['id']);
    } 
    elseif($route === 'appointments_delete'){
        $appointmentsController->delete($_GET['id']);
    }

     // Contact Routes GET
    elseif ($route === 'contact') {
        $contactController->index();
    }
    elseif ($route === 'contact_create') {
        $contactController->create();
    }  
    elseif($route === 'contact_edit'){
        $contactController->edit($_GET['id']);
    } 
    elseif($route === 'contact_delete'){
        $contactController->delete($_GET['id']);
    }

    // Logout Route
    elseif ($route === 'logout') {
        $authController->logout();
    } else {
        require "views/auth/signin.php";
    }
}

?>