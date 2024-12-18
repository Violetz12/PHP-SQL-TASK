<?php
// Include database connection
require_once 'db_connection.php';

// Initialize error and success messages
$errors = [];
$success = '';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);

    // Validation checks
    if (empty($username)) {
        $errors[] = "Username is required";
    } elseif (strlen($username) < 4) {
        $errors[] = "Username must be at least 4 characters long";
    }

    // Check if username already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $errors[] = "Username is already taken";
    }
    $stmt->close();

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $errors[] = "Email is already registered";
    }
    $stmt->close();

    if (empty($password)) {
        $errors[] = "Password is required";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match";
    }

    if ($age === false || $age < 10 || $age > 120) {
        $errors[] = "Please enter a valid age";
    }

    // If no errors, insert data into database
    if (empty($errors)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, first_name, last_name, age, created_at) VALUES (?, ?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("sssssi", $username, $email, $hashed_password, $first_name, $last_name, $age);

        if ($stmt->execute()) {
            $success = "Registration successful! You can now log in.";
            // Clear form inputs after successful registration
            $username = $email = $first_name = $last_name = $age = '';
        } else {
            $errors[] = "Error in registration: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>