<?php include 'includes/headers.php' ?>
<?php require "middleware/admin.php"; ?>

    <div class="p-6 max-w-lg mx-auto bg-white shadow-md rounded-xl">
    <h2 class="text-2xl font-bold mb-6">Add New Social Media</h2>
    <form method="POST" action="index.php?route=social_media_store" class="space-y-4">
        <div>
            <label class="block mb-1 font-semibold">Name</label>
            <input type="text" name="name" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>
        <div>
            <label class="block mb-1 font-semibold">URL</label>
            <input type="url" name="url" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>
        <div>
            <label class="block mb-1 font-semibold">Icon</label>
            <input type="text" name="icon" placeholder="e.g. fa fa-facebook" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>
        <div class="flex items-center gap-2">
            <input type="checkbox" name="isActive" checked class="h-4 w-4">
            <label class="font-semibold">Active</label>
        </div>
        <div>
            <button type="submit"
                class="px-6 py-2 bg-fuchsia-600 text-black rounded-lg hover:bg-fuchsia-700 transition">Create</button>
        </div>
    </form>
</div>


<?php include 'includes/footer.php' ?>