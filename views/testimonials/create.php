<?php include 'includes/headers.php' ?>
<?php require "middleware/admin.php"; ?>

    <div class="p-6 max-w-lg mx-auto bg-white shadow-md rounded-xl">
    <h2 class="text-2xl font-bold mb-6">Add New Testimonial</h2>

    <form method="POST" action="index.php?route=testimonial_store" enctype="multipart/form-data" class="space-y-5">

        <!-- Media Type -->
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Media Type</label>
            <select name="mediaType" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
                <option value="">Select Media Type</option>
                <option value="image">Image</option>
                <option value="video">Video</option>
            </select>
        </div>

        <!-- Media File -->
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Media File</label>
            <input type="file" name="mediaFile" required
                class="w-full px-4 py-2 border rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-fuchsia-50 file:text-fuchsia-600 hover:file:bg-fuchsia-100 transition-all">
        </div>

        <!-- Title -->
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Title</label>
            <input type="text" name="title" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <!-- Description -->
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Description</label>
            <textarea name="descriptions" rows="4" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500"></textarea>
        </div>

        <!-- Status -->
        <div class="flex items-center gap-2">
            <input type="checkbox" name="isActive" checked class="h-4 w-4">
            <label class="font-semibold text-gray-700">Active</label>
        </div>

        <!-- Submit -->
        <div>
            <button type="submit"
                class="px-6 py-2 w-32 bg-fuchsia-600 text-black shadow-soft-lg font-semibold rounded-lg hover:bg-fuchsia-700 transition">
                <i class="fa fa-save mr-2"></i> Create Testimonial
            </button>
        </div>
    </form>
</div>


<?php include 'includes/footer.php' ?>