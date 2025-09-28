<?php include 'includes/headers.php' ?>
<?php require "middleware/admin.php"; ?>

<div class="p-6 max-w-lg mx-auto bg-white shadow-md rounded-xl">
    <h2 class="text-2xl font-bold mb-6">Add New User</h2>
    <form method="POST" action="index.php?route=user_store" enctype="multipart/form-data" class="space-y-4">

        <div>
            <label class="block mb-1 font-semibold">Username</label>
            <input type="text" name="username" required
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Occupation</label>
            <input type="text" name="occupation"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Speciality</label>
            <input type="text" name="speciality"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <div>
            <label class="block mb-1 font-semibold">About</label>
            <textarea name="about" rows="3"
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500"></textarea>
        </div>

        <div>
            <label class="block mb-1 font-semibold">User Image</label>
            <input type="file" name="user_image" class="w-full px-4 py-2 border rounded-lg">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Timing</label>
            <input type="text" name="timing"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Social Media Title</label>
            <input type="text" name="social_media_title"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Social Media Links (comma separated)</label>
            <input type="text" name="social_media_links"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Posts</label>
            <input type="text" name="post"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" name="isActive" checked class="h-4 w-4">
            <label class="font-semibold">Active</label>
        </div>

        <div>
            <button type="submit"
                    class="px-6 py-2 bg-fuchsia-600 text-black shadow-soft-lg rounded-lg hover:bg-fuchsia-700 transition">
                <i class="fa fa-save mr-2"></i> Create
            </button>
        </div>
    </form>
</div>
<?php include 'includes/footer.php' ?>