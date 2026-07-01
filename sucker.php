<?php
$name       = trim($_POST['name'] ?? ''); 
$section    = trim($_POST['section'] ?? ''); 
$cardnumber = trim($_POST['cardnumber'] ?? ''); 
$cardtype   = trim($_POST['cardtype'] ?? ''); 

$line = $name . ';' . $section . ';' . $cardnumber . ';' . $cardtype . "\n"; 

file_put_contents('suckers.html', $line, FILE_APPEND); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buy a Grade - Confirmation</title>
    <link rel="stylesheet" href="index.css"> 
</head>
<body>

    <h1>Thanks, Sucker!</h1>
    <p>Your information has been recorded.</p>
    
    <hr>

    <h2>The current database contains:</h2> 
    <pre><?php 
        $all = file_get_contents('suckers.html'); 
        echo htmlspecialchars($all);
    ?></pre> 

</body>
</html>