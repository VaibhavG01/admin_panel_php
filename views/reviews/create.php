<?php include 'includes/headers.php' ?>
<?php require "middleware/admin.php"; ?>

<div class="p-6 max-w-lg mx-auto bg-white shadow-md rounded-xl">
    <h2 class="text-2xl font-bold mb-6">Add New Review</h2>
    <form method="POST" action="index.php?route=reviews_store" class="space-y-5">

        <!-- Name -->
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Name</label>
            <input type="text" name="name" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <!-- Rating -->
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Rating</label>
            <select name="rating" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
                <option value="">Select rating</option>
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
            </select>
        </div>

        <!-- Description -->
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Description</label>
            <textarea name="description" rows="4" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500 mysummernote"></textarea>
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
                <i class="fa fa-save mr-2"></i> Create
            </button>
        </div>
    </form>
</div>

    <script>
      $('.mysummernote').summernote({
        placeholder: 'Descriptions',
        tabsize: 2,
        height: 100
      });
    </script>


<?php include 'includes/footer.php' ?>