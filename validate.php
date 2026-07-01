<?php

$required = ['visitor_name', 'password'];

foreach ($required as $field) {
    if (!isset($_POST[$field]) || trim($_POST[$field]) === '') {
        echo '<h1>Sorry</h1>';
        echo '<p>You did not fill out the form completely. <a href="debug.php">Try again?</a></p>';
        exit;
    }
}

// Optional: handle multi-select safely
$options = $_POST['options'] ?? [];

if (!is_array($options)) {
    $options = [$options];
}

?>