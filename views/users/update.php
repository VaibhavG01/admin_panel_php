<?php include 'includes/headers.php' ?>
<?php require "middleware/admin.php"; ?>

<div class="p-6 max-w-lg mx-auto bg-white shadow-md rounded-xl">
    <h2 class="text-2xl font-bold mb-6">Update User</h2>
    <form method="POST" action="index.php?route=user_update&id=<?= $user['id'] ?>" enctype="multipart/form-data" class="space-y-4">

        <div>
            <label class="block mb-1 font-semibold">Username</label>
            <input type="text" name="username" value="<?= htmlspecialchars($user['username']); ?>" required
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Occupation</label>
            <input type="text" name="occupation" value="<?= htmlspecialchars($user['occupation']); ?>"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Speciality</label>
            <input type="text" name="speciality" value="<?= htmlspecialchars($user['speciality']); ?>"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <div>
            <label class="block mb-1 font-semibold">About</label>
            <textarea name="about" rows="3"
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500"><?= htmlspecialchars($user['about']); ?></textarea>
        </div>

        <div>
            <label class="block mb-1 font-semibold">User Image</label>
            <?php if (!empty($user['user_image'])): ?>
                <img src="assets/img/uploads/users/<?= htmlspecialchars($user['user_image']); ?>" width="120" class="mb-2">
            <?php endif; ?>
            <input type="file" name="user_image" class="w-full px-4 py-2 border rounded-lg">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Timing</label>
            <input type="text" name="timing" value="<?= htmlspecialchars($user['timing']); ?>"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Social Media Title</label>
            <input type="text" name="social_media_title" value="<?= htmlspecialchars($user['social_media_title']); ?>"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Social Media Links (comma separated)</label>
            <input type="text" name="social_media_links" value="<?= htmlspecialchars($user['social_media_links']); ?>"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Posts</label>
            <input type="text" name="post" value="<?= htmlspecialchars($user['post']); ?>"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" name="isActive" <?= $user['isActive'] ? "checked" : ""; ?> class="h-4 w-4">
            <label class="font-semibold">Active</label>
        </div>

        <div>
            <button type="submit"
                    class="px-6 py-2 bg-fuchsia-600 text-black shadow-soft-lg rounded-lg hover:bg-fuchsia-700 transition">
                <i class="fa fa-save mr-2"></i> Update
            </button>
        </div>
    </form>
</div>

<?php include 'includes/footer.php' ?>