<?php include 'includes/headers.php' ?>
<?php require "middleware/admin.php"; ?>

    <div class="p-6 max-w-4xl mx-auto bg-white rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-6">Edit Feature</h2>
        <form action="index.php?route=features_update&id=<?php echo $feature['id']; ?>" 
            method="POST" enctype="multipart/form-data" class="space-y-4">
            <div>
                <label class="block mb-1 font-semibold">Feature Name</label>
                <input type="text" name="features_name" required 
                    value="<?php echo htmlspecialchars($feature['features_name']); ?>"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
            </div>
            <div>
                <label class="block mb-1 font-semibold">Description</label>
                <textarea name="descriptions" rows="4" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500 mysummernote"><?php echo htmlspecialchars($feature['descriptions']); ?></textarea>
            </div>
            <div>
                <label class="block mb-1 font-semibold">Feature Image</label>
                <input type="file" name="feature_image"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
                <?php if (!empty($feature['feature_image'])): ?>
                    <img src="./assets/img/uploads/features/<?php echo htmlspecialchars($feature['feature_image']); ?>" 
                        class="mt-2 h-24 w-32 object-cover rounded-md" alt="Feature Image">
                <?php endif; ?>
            </div>
            <div class="flex items-center gap-2">
                <input type="checkbox" name="isActive" value="1" <?php echo $feature['isActive'] ? 'checked' : ''; ?> class="h-4 w-4">
                <label class="font-semibold">Active</label>
            </div>
            <div>
                <button type="submit" 
                    class="px-6 py-2 bg-fuchsia-600 text-black shadow-soft-lg rounded-lg hover:bg-fuchsia-700 transition">Update Feature</button>
                <a href="index.php?route=features" 
                    class="ml-4 px-6 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition">Cancel</a>
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