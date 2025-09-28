<?php include 'includes/headers.php' ?>
<?php require "middleware/admin.php"; ?>

<div class="p-6 max-w-4xl mx-auto bg-white rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-6">Update Contact Message</h2>
    <form action="index.php?route=contact_update&id=<?= htmlspecialchars($contact['id']); ?>" method="POST" class="space-y-4">
        
        <div>
            <label class="block mb-1 font-semibold">Full Name</label>
            <input type="text" name="fullname" value="<?= htmlspecialchars($contact['fullname']); ?>" required 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Email</label>
            <input type="email" name="email" value="<?= htmlspecialchars($contact['email']); ?>" required 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Mobile No</label>
            <input type="text" name="mobile_no" value="<?= htmlspecialchars($contact['mobile_no']); ?>" required 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Address</label>
            <textarea name="address" rows="3" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500"><?= htmlspecialchars($contact['address']); ?></textarea>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Message</label>
            <textarea name="message" rows="3"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500"><?= htmlspecialchars($contact['message']); ?></textarea>
        </div>

        <div>
            <button type="submit" 
                class="px-6 py-2 bg-fuchsia-600 text-black shadow-soft-lg rounded-lg hover:bg-fuchsia-700 transition">Update Contact Message</button>
            <a href="index.php?route=contact" 
                class="ml-4 px-6 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition">Cancel</a>
        </div>
    </form>
</div>

<?php include 'includes/footer.php' ?>
