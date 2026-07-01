<h1>Raw Form Data</h1>
<pre><?php print_r($_POST); ?></pre>

<h1>Form Input Values</h1>

<p>Your Name: <?= htmlspecialchars($_POST['visitor_name'] ?? '') ?></p>

<p>Password: <?= htmlspecialchars($_POST['password'] ?? '') ?></p>

<p><strong>Selected Features:</strong>
<?php
$options = $_POST['options'] ?? [];

if (!is_array($options)) {
    $options = [$options];
}

if (!empty($options)) {
    echo htmlspecialchars(implode(", ", $options));
} else {
    echo "None selected";
}
?>
</p>