<?php include 'includes/headers.php' ?>
<?php require "middleware/admin.php"; ?>

<?php 
    $totalAppointments = $appointmentsController->getCount(); 
    $totalContacts = $contactController->getCount();
    $totalBanners = $bannerController->getCount();
    $totalServices = $servicesController->getCount();
    $totalBlogs = $blogsController->getCount();
    $totalImages = $imagesController->getCount();
    $totalVideos = $videosController->getCount();
    $totalEmpanelments = $empanelmentsController->getCount();
    $totalSEOs = $seosController->getCount();
    $totalSocialMedia = $socialmediaController->getCount();
    $totalTestimonial = $testimonialController->getCount();
    $totalReview = $reviewController->getCount();
    $totalUsers = $usersController->getCount();
    $totalDepartments = $departmentsController->getCount();
    $totalFeatures = $featuresController->getCount();
?>

    <!-- row 1 -->
    <h5 class="mb-0 font-bold">Enquiry</h5>
    <div class="flex flex-wrap -mx-3 my-2">
        
        <!-- Appointments -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">
                                    Appointments
                                </p>
                                <h5 class="mb-0 font-bold">
                                    <?= htmlspecialchars($totalAppointments); ?>
                                </h5>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                    <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!-- Contact -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">
                                    Contacts
                                </p>
                                <h5 class="mb-0 font-bold">
                                    <?= htmlspecialchars($totalContacts); ?>
                                </h5>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                    <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!-- Reviews -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">
                                    Reviews
                                </p>
                                <h5 class="mb-0 font-bold">
                                    <?= htmlspecialchars($totalReview); ?>
                                </h5>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                    <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

    </div>

    <!-- row 2 -->
    <h5 class="mb-0 font-bold">Media's</h5>
    <div class="flex flex-wrap -mx-3 my-2">

        <!-- Banners -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">
                                    Banners
                                </p>
                                <h5 class="mb-0 font-bold">
                                    <?= htmlspecialchars($totalBanners); ?>
                                </h5>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                    <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!-- Images -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">
                                    Images
                                </p>
                                <h5 class="mb-0 font-bold">
                                    <?= htmlspecialchars($totalImages); ?>
                                </h5>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                    <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!-- Videos -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">
                                    Videos
                                </p>
                                <h5 class="mb-0 font-bold">
                                    <?= htmlspecialchars($totalVideos); ?>
                                </h5>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                    <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!-- Blogs -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">
                                    Blogs
                                </p>
                                <h5 class="mb-0 font-bold">
                                    <?= htmlspecialchars($totalBlogs); ?>
                                </h5>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                    <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!-- Testimonials -->
        <div class="w-full my-2 max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">
                                    Testimonials
                                </p>
                                <h5 class="mb-0 font-bold">
                                    <?= htmlspecialchars($totalTestimonial); ?>
                                </h5>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                    <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        

    </div>

    <!-- row 3 -->
    <h5 class="mb-0 font-bold">Services</h5>
    <div class="flex flex-wrap -mx-3 my-2">

        <!-- Services -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">
                                    Services
                                </p>
                                <h5 class="mb-0 font-bold">
                                    <?= htmlspecialchars($totalServices); ?>
                                </h5>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                    <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!-- Departments -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">
                                    Departments
                                </p>
                                <h5 class="mb-0 font-bold">
                                    <?= htmlspecialchars($totalDepartments); ?>
                                </h5>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                    <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!-- Features -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">
                                    Features
                                </p>
                                <h5 class="mb-0 font-bold">
                                    <?= htmlspecialchars($totalFeatures); ?>
                                </h5>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                    <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!-- Empanelments -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">
                                    Empanelments
                                </p>
                                <h5 class="mb-0 font-bold">
                                    <?= htmlspecialchars($totalEmpanelments); ?>
                                </h5>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                    <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

    </div>
    
    <!-- row 4 -->
    <h5 class="mb-0 font-bold">SEOs</h5>
    <div class="flex flex-wrap -mx-3 my-2">

        

        <!-- Social Media -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">
                                    Social Media
                                </p>
                                <h5 class="mb-0 font-bold">
                                    <?= htmlspecialchars($totalSocialMedia); ?>
                                </h5>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                    <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!-- SEOs -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">
                                    SEOs
                                </p>
                                <h5 class="mb-0 font-bold">
                                    <?= htmlspecialchars($totalSEOs); ?>
                                </h5>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                    <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

    </div>

    <!-- row 5 -->
    <h5 class="mb-0 font-bold">Users</h5>
    <div class="flex flex-wrap -mx-3 my-2">

        <!-- Users -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">
                                    Users
                                </p>
                                <h5 class="mb-0 font-bold">
                                    <?= htmlspecialchars($totalUsers); ?>
                                </h5>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                    <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

    </div>
        
<?php include 'includes/footer.php' ?>