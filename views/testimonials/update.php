<?php include 'includes/headers.php' ?>
<?php require "middleware/admin.php"; ?>

   <div class="p-6 max-w-lg mx-auto bg-white shadow-md rounded-xl">
    <h2 class="text-2xl font-bold mb-6">Edit Testimonial</h2>

    <form method="POST" action="index.php?route=testimonial_update&id=<?= $testimonial['id'] ?>" enctype="multipart/form-data" class="space-y-5">

        <!-- Title -->
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Title</label>
            <input type="text" name="title" required value="<?= htmlspecialchars($testimonial['title']) ?>"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <!-- Media Type -->
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Media Type</label>
            <select name="mediaType" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
                <option value="">Select Type</option>
                <option value="image" <?= $testimonial['mediaType'] === 'image' ? 'selected' : '' ?>>Image</option>
                <option value="video" <?= $testimonial['mediaType'] === 'video' ? 'selected' : '' ?>>Video</option>
            </select>
        </div>

        <!-- Media File -->
        <div>
            <?php if (!empty($testimonial['mediaFile'])) : ?>
                <?php if ($testimonial['mediaType'] === 'image') : ?>
                    <img src="./assets/img/uploads/testimonials/<?= htmlspecialchars($testimonial['mediaFile']) ?>" 
                        class="h-24 w-32 object-cover rounded-md mb-2">
                <?php elseif ($testimonial['mediaType'] === 'video') : ?>
                    <video width="200" controls class="mb-2">
                        <source src="./assets/img/uploads/testimonials/<?= htmlspecialchars($testimonial['mediaFile']) ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                <?php endif; ?>
            <?php endif; ?>

            <label class="block mb-1 font-semibold text-gray-700">Upload New Media</label>
            <input type="file" name="mediaFile" accept="image/*,video/*"
                class="w-full px-4 py-2 border rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-fuchsia-50 file:text-fuchsia-600 hover:file:bg-fuchsia-100 transition-all">
        </div>

        <!-- Description -->
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Description</label>
            <textarea name="descriptions" rows="4"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500"><?= htmlspecialchars($testimonial['descriptions']) ?></textarea>
        </div>

        <!-- Active Checkbox -->
        <div class="flex items-center gap-2">
            <input type="checkbox" name="isActive" <?= $testimonial['isActive'] ? 'checked' : '' ?> class="h-4 w-4">
            <label class="font-semibold">Active</label>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit"
                class="px-6 py-2 w-32 bg-fuchsia-600 text-black shadow-soft-lg font-semibold rounded-lg hover:bg-fuchsia-700 transition">
                <i class="fa fa-save mr-2"></i> Update Testimonial
            </button>
        </div>
    </form>
</div>


    
<?php include 'includes/footer.php' ?>