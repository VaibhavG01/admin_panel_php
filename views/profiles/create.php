<?php include 'includes/headers.php' ?>
<?php require "middleware/admin.php"; ?>

    <div class="p-6 max-w-4xl mx-auto bg-white rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-6">Add / Update Profile</h2>
    <form action="index.php?route=profile_store" method="POST" enctype="multipart/form-data" class="space-y-4">
        
        <!-- Name -->
        <div>
            <label class="block mb-1 font-semibold">Name</label>
            <input type="text" name="name" required 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <!-- Logo Image -->
        <div>
            <label class="block mb-1 font-semibold">Logo Image</label>
            <input type="file" name="logo_image" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <!-- Email -->
        <div>
            <label class="block mb-1 font-semibold">Email</label>
            <input type="email" name="email" required 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <!-- Mobile No -->
        <div>
            <label class="block mb-1 font-semibold">Mobile Number</label>
            <input type="text" name="mobile_no" required 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </div>

        <!-- Address -->
        <div>
            <label class="block mb-1 font-semibold">Address</label>
            <textarea name="address" rows="3" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500"></textarea>
        </div>

        <!-- About (replacing description) -->
        <div>
            <label class="block mb-1 font-semibold">About</label>
            <textarea name="about" rows="4" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-500 mysummernote"></textarea>
        </div>

        <!-- Active Checkbox -->
        <div class="flex items-center gap-2">
            <input type="checkbox" name="isActive" checked class="h-4 w-4">
            <label class="font-semibold">Active</label>
        </div>

        <!-- Buttons -->
        <div>
            <button type="submit" 
                class="px-6 py-2 bg-fuchsia-600 text-black shadow-soft-lg rounded-lg hover:bg-fuchsia-700 transition">
                Save Profile
            </button>
            <a href="index.php?route=profile" 
                class="ml-4 px-6 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition">Cancel</a>
        </div>
    </form>
</div>

<script>
  $('.mysummernote').summernote({
    placeholder: 'Write about the profile...',
    tabsize: 2,
    height: 120
  });
</script>


<?php include 'includes/footer.php' ?>