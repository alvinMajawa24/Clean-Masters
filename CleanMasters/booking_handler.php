<?php
require_once 'connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $service_type = $_POST['service_type'];
    $booking_date = $_POST['booking_date'];
    $booking_time = $_POST['booking_time'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Insert the booking into the database
    $stmt = $connect->prepare("INSERT INTO bookings (service_type, booking_date, booking_time, name, email, phone) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $service_type, $booking_date, $booking_time, $name, $email, $phone);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $success_message = "Booking successful! We will contact you shortly.";
    } else {
        $error_message = "Error occurred while booking. Please try again.";
    }

    $stmt->close();
}
?>

<!-- Include your HTML code for the booking form here -->
<!-- Display the success or error message if there is one -->
<?php if (isset($success_message)) { ?>
    <p class="success-message"><?php echo $success_message; ?></p>
<?php } else if (isset($error_message)) { ?>
    <p class="error-message"><?php echo $error_message; ?></p>
<?php } ?>