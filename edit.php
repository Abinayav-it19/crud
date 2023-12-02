<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $file = 'user_details.txt';
    $lines = file($file, FILE_IGNORE_NEW_LINES);

    $userId = $_GET['id'];
    foreach ($lines as $line) {
        $user = explode('|', $line);
        if ($user[0] == $userId) {
            // Display a form to edit user details
            ?>
            <!DOCTYPE html>
            <html>
            <head>
                <title>Edit User Details</title>
            </head>
            <body>
                <h2>Edit User Details</h2>
                <form action="update.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $user[0]; ?>">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $user[1]; ?>" required><br><br>
                    
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" value="<?php echo $user[2]; ?>" required><br><br>
                    
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $user[3]; ?>" required><br><br>
                    
                    <label for="contact">Contact:</label>
                    <input type="text" id="contact" name="contact" value="<?php echo $user[4]; ?>" required><br><br>
                    
                    <input type="submit" name="submit" value="Update">
                </form>
            </body>
            </html>
            <?php
            break;
        }
    }
}
?>
