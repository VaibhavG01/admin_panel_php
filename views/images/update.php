<?php include 'includes/headers.php' ?>
<?php require "middleware/admin.php"; ?>



<div class="p-6 max-w-lg mx-auto bg-white shadow-md rounded-xl">
    
    <h2 class="text-2xl font-bold text-slate-800 capitalize mb-6">
        Edit Images
    </h2>
    <form method="POST" action="index.php?route=images_update&id=<?= $images['id'] ?>" enctype="multipart/form-data" class="space-y-6">
        <div>
            <label for="title" class="block text-sm font-semibold text-slate-700 mb-2">Images Title</label>
            <input type="text" name="title" id="title" value="<?= $images['title'] ?>" required
            class="w-full px-4 py-2 text-sm text-slate-700 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:border-fuchsia-500 transition-all">
        </div>
        <div>
            <img src="assets/img/uploads/images/<?= $images['images'] ?>" width="120"><br>
        </div>
        <div>
            <label for="images" class="block text-sm font-semibold text-slate-700 mt-2">Images</label>
            <input type="file" name="images" id="images" 
                class="w-full px-4 py-2 text-sm text-slate-700 bg-gray-50 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-fuchsia-50 file:text-fuchsia-600 hover:file:bg-fuchsia-100 transition-all">
        </div>
        <div>
            <label class="flex items-center">
            <input type="checkbox" name="isActive" <?= $images['isActive'] ? "checked" : "" ?>
                    class="h-4 w-4 text-fuchsia-600 border-gray-300 rounded focus:ring-fuchsia-500">
            <span class="ml-2 text-sm font-semibold text-slate-700">Active</span>
            </label>
        </div>
        <div>
            <button type="submit"
                    class="w-32 my-2 px-4 py-2 text-sm font-semibold text-black bg-fuchsia-600 hover:bg-fuchsia-700 rounded-lg transition-all ease-soft-in shadow-soft-md">
            <i class="fa fa-save mr-2"></i> Update Images
            </button>
        </div>
        </form>
    </div>

<?php include 'includes/footer.php' ?>