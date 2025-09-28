<?php include 'includes/headers.php' ?>
<?php require "middleware/admin.php"; ?>

    <div class="p-6 max-w-lg mx-auto bg-white shadow-md rounded-xl">
    <h2 class="text-2xl font-bold text-slate-800 capitalize mb-6">
        Add New SEO
    </h2>
    <form method="POST" action="index.php?route=seo_store" class="space-y-6">
        <div>
            <label for="meta_tags" class="block text-sm font-semibold text-slate-700 mb-2">Meta Tags</label>
            <input type="text" name="meta_tags" id="meta_tags" placeholder="Enter meta tags" required
                class="w-full px-4 py-2 text-sm text-slate-700 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:border-fuchsia-500 transition-all">
        </div>

        <div>
            <label for="meta_descriptions" class="block text-sm font-semibold text-slate-700 mb-2">Meta Descriptions</label>
            <textarea name="meta_descriptions" id="meta_descriptions" rows="4" placeholder="Enter meta descriptions" required
                class="w-full px-4 py-2 text-sm text-slate-700 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:border-fuchsia-500 transition-all"></textarea>
        </div>

        <div>
            <label class="flex items-center">
                <input type="checkbox" name="isActive" checked
                    class="h-4 w-4 text-fuchsia-600 border-gray-300 rounded focus:ring-fuchsia-500">
                <span class="ml-2 text-sm font-semibold text-slate-700">Active</span>
            </label>
        </div>

        <div>
            <button type="submit"
                    class="w-32 my-2 px-4 py-2 text-sm font-semibold text-black bg-fuchsia-600 hover:bg-fuchsia-700 rounded-lg transition-all ease-soft-in shadow-soft-md">
                <i class="fa fa-save mr-2"></i> Save SEO
            </button>
        </div>
    </form>
</div>


<?php include 'includes/footer.php' ?>