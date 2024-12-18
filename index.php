<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starboba-Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Registration</h1>
        
        <?php
        // Include processing script
        require_once 'process_registration.php';
        
        // Display errors if any
        if (!empty($errors)) {
            echo '<div class="error">';
            foreach ($errors as $error) {
                echo "<p>$error</p>";
            }
            echo '</div>';
        }
        
        // Display success message
        if (!empty($success)) {
            echo "<div class='success'>$success</div>";
        }
        ?>
        
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" 
                       value="<?php echo htmlspecialchars($username ?? ''); ?>" 
                       required minlength="4" maxlength="50">
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" 
                       value="<?php echo htmlspecialchars($email ?? ''); ?>" 
                       required>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" 
                       required minlength="8" maxlength="100">
            </div>
            
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" 
                       required minlength="8" maxlength="100">
            </div>
            
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" 
                       value="<?php echo htmlspecialchars($first_name ?? ''); ?>" 
                       maxlength="50">
            </div>
            
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" 
                       value="<?php echo htmlspecialchars($last_name ?? ''); ?>" 
                       maxlength="50">
            </div>
            
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" 
                       value="<?php echo htmlspecialchars($age ?? ''); ?>" 
                       required min="10" max="120">
            </div>
            
            <div class="form-group">
                <input type="submit" value="Register">
            </div>
        </form>
    </div>
    <script src="boba.js"></script>
</body>
</html>