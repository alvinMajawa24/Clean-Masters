<?php
session_start();

// Include the database connection file
require_once 'connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the database to check if the user exists
    $stmt = $connect->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Login successful
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name']; // Store the user's name in the session
            header("Location: homee.php"); // Redirect to the home page
            exit();
        } else {
            $error_message = "Invalid email or password.";
        }
    } else {
        $error_message = "Invalid email or password.";
    }

    $stmt->close();
}
?>

<!-- Include your HTML code for the login form here -->
<!-- Display the error message if there is one -->
<?php if (isset($error_message)) { ?>
    <p class="error-message"><?php echo $error_message; ?></p>
<?php } ?>