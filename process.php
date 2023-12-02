<?php
// Function to sanitize user input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input
    $name = sanitize_input($_POST["name"]);
    $password = sanitize_input($_POST["password"]);
    $email = sanitize_input($_POST["email"]);
    $contact = sanitize_input($_POST["contact"]);
    
    // Create a unique identifier for the user (e.g., using time)
    $user_id = time();

    // File to store user details
    $file = 'user_details.txt';
    
    // Data to write to the file
    $data = "$user_id|$name|$password|$email|$contact\n";

    // Write data to the file
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

    // echo "<h2>User details saved successfully!</h2>";
    // echo "<p><a href='index.php'>Go back</a></p>";
}
?>
