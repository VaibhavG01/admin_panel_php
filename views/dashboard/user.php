<?php require "middleware/user.php"; ?>
<?php $pageTitle = "User Dashboard" ?>
<h2>User Dashboard</h2>
<p>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>!</p>
<a href="index.php?route=logout">Logout</a>
