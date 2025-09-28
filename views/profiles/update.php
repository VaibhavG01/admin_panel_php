<?php include 'includes/headers.php' ?>
<?php require "middleware/admin.php"; ?>

   <div class="p-6 max-w-4xl mx-auto bg-white rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-6">Edit Profile</h2>
    <form action="index.php?route=profile_update&id=<?php echo $profile['id']; ?>" 
        method="POST" enctype="multipart/form-data" class="space-y-4">
        
        <!-- Name -->
        <div>
            <label class="block mb-1 font-semibold">Name</label>
            <input type="text" name="name" required 
                value="<?php echo htmlspecialchars($profile['name']); ?>"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <!-- About -->
        <div>
            <label class="block mb-1 font-semibold">About</label>
            <textarea name="about" rows="4" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500 mysummernote"><?php echo htmlspecialchars($profile['about']); ?></textarea>
        </div>

        <!-- Logo Image -->
        <div>
            <label class="block mb-1 font-semibold">Logo Image</label>
            <input type="file" name="logo_image"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
            <?php if (!empty($profile['logo_image'])): ?>
                <img src="./assets/img/uploads/profile/<?php echo htmlspecialchars($profile['logo_image']); ?>" 
                    class="mt-2 h-24 w-32 object-cover rounded-md" alt="Logo">
            <?php endif; ?>
        </div>

        <!-- Address -->
        <div>
            <label class="block mb-1 font-semibold">Address</label>
            <input type="text" name="address" required
                value="<?php echo htmlspecialchars($profile['address']); ?>"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <!-- Mobile No -->
        <div>
            <label class="block mb-1 font-semibold">Mobile No.</label>
            <input type="text" name="mobile_no" required
                value="<?php echo htmlspecialchars($profile['mobile_no']); ?>"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <!-- Email -->
        <div>
            <label class="block mb-1 font-semibold">Email</label>
            <input type="email" name="email" required
                value="<?php echo htmlspecialchars($profile['email']); ?>"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <!-- Status -->
        <div class="flex items-center gap-2">
            <input type="checkbox" name="isActive" value="1" 
                <?php echo $profile['isActive'] ? 'checked' : ''; ?> 
                class="h-4 w-4">
            <label class="font-semibold">Active</label>
        </div>

        <!-- Buttons -->
        <div>
            <button type="submit" 
                class="px-6 py-2 bg-fuchsia-600 text-black shadow-soft-lg rounded-lg hover:bg-fuchsia-700 transition">Update Profile</button>
            <a href="index.php?route=profiles" 
                class="ml-4 px-6 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition">Cancel</a>
        </div>
    </form>
</div>

<script>
  $('.mysummernote').summernote({
    placeholder: 'Write about profile...',
    tabsize: 2,
    height: 100
  });
</script>



<?php include 'includes/footer.php' ?>