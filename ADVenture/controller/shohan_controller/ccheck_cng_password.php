<?php 

session_start();
require_once '../../model/usermodel1.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_REQUEST['user_id']; // Assuming user ID is passed as a parameter
    $current_password = trim($_POST['current_password']);
    $new_password = trim($_POST['new_password']);
    $confirm_new_password = trim($_POST['confirm_new_password']);

    // Ensure all fields are filled
    if (empty($current_password) || empty($new_password) || empty($confirm_new_password)) {
        echo "Each field must be filled!";
        exit();
    }

    // Validate if user exists
    if (!$user_id) {
        echo "Invalid user.";
        exit();
    }

    $user = getUserById($user_id);

    // If user is not found
    if (!$user) {
        echo "User not found.";
        exit();
    }

    // Get the stored password from the database (assumes password is hashed)
    $stored_password = $user['password'];

    // Verify current password (assuming hashed passwords in database)
    if (!password_verify($current_password, $stored_password)) {
        echo "Your current password is incorrect.";
        exit();
    }

    // Check if new password is at least 6 characters long
    if (strlen($new_password) < 6) {
        echo "New password must be at least 6 characters long.";
        exit();
    }

    // Check if new password and confirm password match
    if ($new_password !== $confirm_new_password) {
        echo "New passwords do not match.";
        exit();
    }

    // Encrypt the new password
    $hashed_new_password = password_hash($new_password, PASSWORD_BCRYPT);

    // Update password in the database
    $result = updateUserPassword($user_id, $hashed_new_password);

    // Provide feedback
    if ($result) {
        echo "<h3>Your password has been successfully changed!</h3>";
    } else {
        echo "Failed to update the password. Please try again later.";
    }
} else {
    // If the request method is not POST, redirect to the password change page
    header("Location: ../view/changepassword_admin.html");
    exit();
}

// Functions to interact with the database
function getUserById($user_id) {
    // Query the database for the user
    // Ensure your user query fetches the password (hashed) correctly
    $conn = getConnection();
    $sql = "SELECT * FROM users WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function updateUserPassword($user_id, $new_password) {
    $conn = getConnection();
    $sql = "UPDATE users SET password = '$new_password' WHERE user_id = '$user_id'";
    return mysqli_query($conn, $sql);
}
?>
