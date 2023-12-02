<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $file = 'user_details.txt';
    $lines = file($file, FILE_IGNORE_NEW_LINES);

    $userId = $_GET['id'];
    $output = '';

    foreach ($lines as $line) {
        $user = explode('|', $line);
        if ($user[0] != $userId) {
            $output .= $line . "\n";
        }
    }

    file_put_contents($file, $output);
    header("Location: index.php");
    exit();
}
?>
