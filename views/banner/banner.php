<?php include 'includes/headers.php' ?>
<?php require "middleware/admin.php"; ?>


    <div class="p-6 max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-slate-800 capitalize">
            <?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Banners'; ?>
            </h2>
            <a href="index.php?route=banner_create"
            class="inline-flex items-center px-4 py-2 text-sm font-semibold text-black bg-fuchsia-600 hover:bg-fuchsia-700 rounded-lg transition-all ease-soft-in shadow-soft-lg">
            <i class="fa fa-plus mr-2"></i> Add New Banner
            </a>
        </div>
        <div class="overflow-x-auto bg-white shadow-md rounded-xl">
            <table class="w-full divide-y divide-gray-200 table">
            <thead class="bg-gray-50">
                <tr>
                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Title</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Image</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 w-full">
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700"><?php echo htmlspecialchars($row['id']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700"><?php echo htmlspecialchars($row['title']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap">
                    <img src="./assets/img/uploads/banners/<?php echo htmlspecialchars($row['banner_image']); ?>" 
                        class="h-16 w-24 object-cover rounded-md" alt="Banner Image">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                    <span class="px-2 py-1 text-xs font-semibold rounded-full <?php echo $row['isActive'] ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?>">
                        <?php echo $row['isActive'] ? 'Active' : 'Inactive'; ?>
                    </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                    <a href="index.php?route=banner_edit&id=<?php echo htmlspecialchars($row['id']); ?>" 
                        class="text-fuchsia-600 hover:text-fuchsia-800 font-semibold mr-4">Edit</a>
                    <a href="index.php?route=banner_delete&id=<?php echo htmlspecialchars($row['id']); ?>" 
                        onclick="return confirm('Are you sure you want to delete this banner?')" 
                        class="text-red-600 hover:text-red-800 font-semibold">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            </table>
        </div>
    </div>

<?php include 'includes/footer.php' ?>