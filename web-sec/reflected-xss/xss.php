<?php
// <<<< WARNING >>>>
// Don't do this!!
$user = $_GET['u']; // <-- LEADS TO REFLECTED XSS
// This is unsanitized and will results in any JS being passed in the URL to be added to the HTML.
// Try opening this page with u=Test<script>alert(1)</script>
// <<<< WARNING >>>>

// SANITIZE EVERYTHNG
// $user = filter_var($_GET['u'], FILTER_SANITIZE_STRING);

// Learn more about Reflected XSS @ https://blog.daniel-cobb.com/websec-reflected-xss
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relfected XSS Example</title>
</head>
<body>
    <h2>Referred by <?php echo $user?></h2>
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
</body>
</html>