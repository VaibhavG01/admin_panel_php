<?php include 'includes/headers.php' ?>
<?php require "middleware/admin.php"; ?>

<div class="p-4 sm:p-6 w-full mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-slate-800 capitalize">
            <?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Contact Messages'; ?>
        </h2>
        <a href="index.php?route=contact_create"
           class="inline-flex items-center px-4 py-2 text-sm font-semibold text-black bg-fuchsia-600 hover:bg-fuchsia-700 rounded-lg transition-all ease-soft-in shadow-soft-lg">
            <i class="fa fa-plus mr-2"></i> Add New Contact
        </a>
    </div>
    <div class="overflow-x-auto bg-white shadow-sm rounded-lg">
        <table class="w-full divide-y divide-gray-200 table">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">ID</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Full Name</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Email</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Mobile No</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Address</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Message</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3 text-sm text-slate-700"><?php echo htmlspecialchars($row['id']); ?></td>
                    <td class="px-4 py-3 text-sm text-slate-700"><?php echo htmlspecialchars($row['fullname']); ?></td>
                    <td class="px-4 py-3 text-sm text-slate-700"><?php echo htmlspecialchars($row['email']); ?></td>
                    <td class="px-4 py-3 text-sm text-slate-700"><?php echo htmlspecialchars($row['mobile_no']); ?></td>
                    <td class="px-4 py-3 text-sm text-slate-700 break-words max-w-xs"><?php echo htmlspecialchars($row['address']); ?></td>
                    <td class="px-4 py-3 text-sm text-slate-700 break-words max-w-xs"><?php echo htmlspecialchars($row['message']); ?></td>

                    <!-- Actions -->
                    <td class="px-4 py-3 text-sm flex items-center space-x-3">
                        <!-- Edit -->
                        <a href="index.php?route=contact_edit&id=<?php echo htmlspecialchars($row['id']); ?>" 
                           class="text-fuchsia-600 hover:text-fuchsia-800 font-semibold">Edit</a>
                        
                        <!-- Delete -->
                        <a href="index.php?route=contact_delete&id=<?php echo htmlspecialchars($row['id']); ?>" 
                           onclick="return confirm('Are you sure you want to delete this message?')" 
                           class="text-red-600 hover:text-red-800 font-semibold">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php' ?>
