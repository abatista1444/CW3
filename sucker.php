<?php
// --- EXERCISE 5: SERVER-SIDE VALIDATION ---
$required = ['name', 'section', 'cardnumber', 'cardtype']; 

foreach ($required as $field) { 
    if (!isset($_POST[$field]) || trim($_POST[$field]) === '') { 
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Submission Error</title>
            <link rel="stylesheet" href="index.css">
        </head>
        <body>
            <h1>Sorry</h1>
            <p>You did not fill out the form completely. <a href="buyagrade.html">Try again?</a></p>
        </body>
        </html>'; 
        exit; 
    }
}

// --- EXERCISE 4: PROCESS AND SAVE DATA ---
$name       = trim($_POST['name'] ?? ''); 
$section    = trim($_POST['section'] ?? ''); 
$cardnumber = trim($_POST['cardnumber'] ?? ''); 
$cardtype   = trim($_POST['cardtype'] ?? ''); 

// Format text exactly matching the target: Name; Section; CardNumber; CardType
$line = $name . ';' . $section . ';' . $cardnumber . ';' . $cardtype . "\n"; 

// Save the entry safely onto the server database file
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
    
    <p><strong>Your Name:</strong> <?= htmlspecialchars($name) ?></p> 
    <p><strong>Section:</strong> <?= htmlspecialchars($section) ?></p> 
    <p><strong>Card Number:</strong> <?= htmlspecialchars($cardnumber) ?></p> 
    <p><strong>Card Type:</strong> <?= htmlspecialchars($cardtype) ?></p> 
    
    <hr>

    <h2>The current database contains:</h2>
    <pre><?php 
        $all = file_get_contents('suckers.html'); 
        echo htmlspecialchars($all); 
    ?></pre>

</body>
</html>
