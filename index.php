<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
        .success {
            color: green;
            font-size: 1em;
            margin-bottom: 15px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>User Registration</h2>
    
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
                   required min="13" max="120">
        </div>
        
        <div class="form-group">
            <input type="submit" value="Register">
        </div>
    </form>
</body>
</html>