<?php
require_once 'connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if the email already exists in the database
    $stmt = $connect->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error_message = "Email already exists. Please try a different email.";
    } else {
        // Insert the new user into the database
        $stmt = $connect->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $password);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $success_message = "Registration successful! You can now log in.";
            // Redirect to the home page
            header("Location: homee.php");
            exit();
        } else {
            $error_message = "Error occurred while registering. Please try again.";
        }

        $stmt->close();
    }
}
?>

<!-- Include your HTML code for the sign-up form here -->
<!-- Display the success or error message if there is one -->
<?php if (isset($success_message)) { ?>
    <p class="success-message"><?php echo $success_message; ?></p>
    <!-- Redirecting to home page after successful registration -->
    <script>
        setTimeout(function() {
            window.location.href = 'homee.php';
        }, 3000); // Redirect after 3 seconds
    </script>
<?php } else if (isset($error_message)) { ?>
    <p class="error-message"><?php echo $error_message; ?></p>
<?php } ?>
