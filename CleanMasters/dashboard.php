<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Retrieve the user's name from the session
$user_name = $_SESSION['user_name'];
?>

<!-- Include your HTML code for the dashboard here -->
<h2>Welcome, <?php echo $user_name; ?>!</h2>
<!-- Display user-specific information or functionality here -->