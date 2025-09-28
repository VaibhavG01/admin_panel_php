<?php include 'includes/headers.php' ?>
<?php require "middleware/admin.php"; ?>

    <div class="p-6 max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-slate-800 capitalize">
            <?= isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Testimonials'; ?>
        </h2>
        <a href="index.php?route=testimonial_create"
           class="inline-flex items-center px-4 py-2 text-sm font-semibold text-black bg-fuchsia-600 hover:bg-fuchsia-700 rounded-lg transition-all ease-soft-in shadow-soft-lg">
            <i class="fa fa-plus mr-2"></i> Add New Testimonial
        </a>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-xl">
        <table class="w-full divide-y divide-gray-200 table">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Media Type</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Media</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) : ?>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-sm text-slate-700"><?= htmlspecialchars($row['id']); ?></td>
                    <td class="px-6 py-4 text-sm text-slate-700 capitalize"><?= htmlspecialchars($row['mediaType']); ?></td>

                    <!-- ✅ Show media (image/video) -->
                    <td class="px-6 py-4 text-sm text-slate-700">
                        <?php if ($row['mediaType'] === 'image') : ?>
                            <img src="./assets/img/uploads/testimonials/<?= htmlspecialchars($row['mediaFile']); ?>" 
                                 alt="<?= htmlspecialchars($row['title']); ?>" 
                                 class="w-16 h-16 object-cover rounded-lg border">
                        <?php elseif ($row['mediaType'] === 'video') : ?>
                            <video class="w-32 rounded-lg border" controls>
                                <source src="./assets/img/uploads/testimonials//<?= htmlspecialchars($row['mediaFile']); ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        <?php else: ?>
                            <span class="text-gray-400 italic">No media</span>
                        <?php endif; ?>
                    </td>

                    <td class="px-6 py-4 text-sm text-slate-700"><?= htmlspecialchars($row['title']); ?></td>
                    <td class="px-6 py-4 text-sm text-slate-700 break-words max-w-xs">
                        <?= htmlspecialchars($row['descriptions']); ?>
                    </td>
                    <td class="px-6 py-4 text-sm">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full <?= $row['isActive'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
                            <?= $row['isActive'] ? 'Active' : 'Inactive'; ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm">
                        <a href="index.php?route=testimonial_edit&id=<?= htmlspecialchars($row['id']); ?>" 
                           class="text-fuchsia-600 hover:text-fuchsia-800 font-semibold mr-3">Edit</a>
                        <a href="index.php?route=testimonial_delete&id=<?= htmlspecialchars($row['id']); ?>" 
                           onclick="return confirm('Are you sure you want to delete this testimonial?')" 
                           class="text-red-600 hover:text-red-800 font-semibold">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>



<?php include 'includes/footer.php' ?>