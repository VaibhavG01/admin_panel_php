<?php include 'includes/headers.php' ?>
<?php require "middleware/admin.php"; ?>



<div class="p-6 max-w-lg mx-auto bg-white shadow-md rounded-xl">
    
    <h2 class="text-2xl font-bold text-slate-800 capitalize mb-6">
        Edit Videos
    </h2>
    <form method="POST" action="index.php?route=videos_update&id=<?= $videos['id'] ?>" enctype="multipart/form-data" class="space-y-6">
        <div>
            <label for="title" class="block text-sm font-semibold text-slate-700 mb-2">Videos Title</label>
            <input type="text" name="title" id="title" value="<?= $videos['title'] ?>" required
            class="w-full px-4 py-2 text-sm text-slate-700 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:border-fuchsia-500 transition-all">
        </div>
        <div>
            <label for="url" class="block text-sm font-semibold text-slate-700 mb-2">Video URL</label>
            <input type="text" name="url" id="url" value="<?= $videos['url'] ?>" required
            class="w-full px-4 py-2 text-sm text-slate-700 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:border-fuchsia-500 transition-all">
        </div>

        <div>
            <video src="assets/img/uploads/videos/<?= $videos['videos'] ?>" width="120" controls></video><br>
        </div>
        <div>
            <label for="videos" class="block text-sm font-semibold text-slate-700 mt-2">Videos</label>
            <input type="file" name="videos" id="videos" 
                class="w-full px-4 py-2 text-sm text-slate-700 bg-gray-50 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-fuchsia-50 file:text-fuchsia-600 hover:file:bg-fuchsia-100 transition-all">
        </div>
        <div>
            <label class="flex items-center">
            <input type="checkbox" name="isActive" <?= $videos['isActive'] ? "checked" : "" ?>
                    class="h-4 w-4 text-fuchsia-600 border-gray-300 rounded focus:ring-fuchsia-500">
            <span class="ml-2 text-sm font-semibold text-slate-700">Active</span>
            </label>
        </div>
        <div>
            <button type="submit"
                    class="w-32 my-2 px-4 py-2 text-sm font-semibold text-black bg-fuchsia-600 hover:bg-fuchsia-700 rounded-lg transition-all ease-soft-in shadow-soft-md">
            <i class="fa fa-save mr-2"></i> Update Videos
            </button>
        </div>
        </form>
    </div>

<?php include 'includes/footer.php' ?>