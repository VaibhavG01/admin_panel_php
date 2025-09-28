<?php include 'includes/headers.php' ?>
<?php require "middleware/admin.php"; ?>

<div class="p-6 max-w-lg mx-auto bg-white shadow-md rounded-xl">
    <h2 class="text-2xl font-bold mb-6">Update Review</h2>
    <form method="POST" action="index.php?route=reviews_update&id=<?= $review['id'] ?>" class="space-y-5">

        <!-- Name -->
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Name</label>
            <input type="text" name="name" value="<?= htmlspecialchars($review['name']); ?>" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <!-- Rating -->
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Rating</label>
            <select name="rating" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
                <option value="">Select rating</option>
                <?php for($i=1; $i<=5; $i++): ?>
                    <option value="<?= $i; ?>" <?= $review['rating'] == $i ? 'selected' : ''; ?>><?= $i; ?> Star<?= $i>1?'s':''; ?></option>
                <?php endfor; ?>
            </select>
        </div>

        <!-- Description -->
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Description</label>
            <textarea name="description" rows="4" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500"><?= htmlspecialchars($review['description']); ?></textarea>
        </div>

        <!-- Status -->
        <div class="flex items-center gap-2">
            <input type="checkbox" name="isActive" class="h-4 w-4" <?= $review['isActive'] ? 'checked' : ''; ?>>
            <label class="font-semibold text-gray-700">Active</label>
        </div>

        <!-- Submit -->
        <div>
            <button type="submit"
                class="px-6 py-2 w-32 bg-fuchsia-600 text-black shadow-soft-lg font-semibold rounded-lg hover:bg-fuchsia-700 transition">
                <i class="fa fa-save mr-2"></i> Update
            </button>
        </div>
    </form>
</div>


<?php include 'includes/footer.php' ?>