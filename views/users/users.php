<?php include 'includes/headers.php' ?>
<?php require "middleware/admin.php"; ?>

   <div class="p-6 max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-slate-800 capitalize">
            <?= isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Users'; ?>
        </h2>
        <a href="index.php?route=user_create"
           class="inline-flex items-center px-4 py-2 text-sm font-semibold text-black bg-fuchsia-600 hover:bg-fuchsia-700 rounded-lg transition-all ease-soft-in shadow-soft-lg">
            <i class="fa fa-plus mr-2"></i> Add New User
        </a>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-xl">
        <table class="w-full divide-y divide-gray-200 table">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Username</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Occupation</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Speciality</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">About</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">User Image</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Timing</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Social Media</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Posts</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) : ?>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-sm text-slate-700"><?= htmlspecialchars($row['id']); ?></td>
                    <td class="px-6 py-4 text-sm text-slate-700"><?= htmlspecialchars($row['username']); ?></td>
                    <td class="px-6 py-4 text-sm text-slate-700"><?= htmlspecialchars($row['occupation']); ?></td>
                    <td class="px-6 py-4 text-sm text-slate-700"><?= htmlspecialchars($row['speciality']); ?></td>
                    <td class="px-6 py-4 text-sm text-slate-700 break-words max-w-xs"><?= htmlspecialchars($row['about']); ?></td>

                    <!-- User Image -->
                    <td class="px-6 py-4">
                        <?php if (!empty($row['user_image'])): ?>
                            <img src="./assets/img/uploads/users/<?= htmlspecialchars($row['user_image']); ?>" 
                                 alt="<?= htmlspecialchars($row['username']); ?>" 
                                 class="w-16 h-16 object-cover rounded-lg border">
                        <?php else: ?>
                            <span class="text-gray-400 italic">No Image</span>
                        <?php endif; ?>
                    </td>

                    <td class="px-6 py-4 text-sm text-slate-700"><?= htmlspecialchars($row['timing']); ?></td>

                    <!-- Social Media -->
                    <td class="px-6 py-4 text-sm text-slate-700 break-words max-w-xs">
                        <strong><?= htmlspecialchars($row['social_media_title']); ?>:</strong> 
                        <?= htmlspecialchars($row['social_media_links']); ?>
                    </td>

                    <td class="px-6 py-4 text-sm text-slate-700"><?= htmlspecialchars($row['post']); ?></td>

                    <!-- Status -->
                    <td class="px-6 py-4 text-sm">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full <?= $row['isActive'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
                            <?= $row['isActive'] ? 'Active' : 'Inactive'; ?>
                        </span>
                    </td>

                    <!-- Actions -->
                    <td class="px-6 py-4 text-sm">
                        <a href="index.php?route=user_edit&id=<?= htmlspecialchars($row['id']); ?>" 
                           class="text-fuchsia-600 hover:text-fuchsia-800 font-semibold mr-3">Edit</a>
                        <a href="index.php?route=user_delete&id=<?= htmlspecialchars($row['id']); ?>" 
                           onclick="return confirm('Are you sure you want to delete this user?')" 
                           class="text-red-600 hover:text-red-800 font-semibold">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>




<?php include 'includes/footer.php' ?>