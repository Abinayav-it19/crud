<!DOCTYPE html>
<html>
<head>
    <title>CRUD Operations</title>
</head>
<body>
    <h2>User Details</h2>
    <form action="process.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" required><br><br>
        
        <input type="submit" name="submit" value="Submit">
    </form>

    <h2>Users</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Actions</th>
        </tr>
        <?php
        // Read user details from file and display in a table
        $file = 'user_details.txt';
        $lines = file($file, FILE_IGNORE_NEW_LINES);

        foreach ($lines as $line) {
            $user = explode('|', $line);
            echo "<tr>";
            echo "<td>{$user[1]}</td>";
            echo "<td>{$user[3]}</td>";
            echo "<td>{$user[4]}</td>";
            echo "<td><a href='edit.php?id={$user[0]}'>Edit</a> | <a href='delete.php?id={$user[0]}'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
