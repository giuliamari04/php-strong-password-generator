<?php
session_start();

include __DIR__.'/functions/function.php';

if (isset($_GET['passwordLength'])) {
    $password = generatePassword($_GET['passwordLength']);
    $_SESSION['password'] = $password;

    // Redirect alla pagina dedicata
    header('Location: showPassword.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>
</head>
<body>
    <!-- FORM GET PER LUGHEZZA PASSWORD || Milestone 1 -->
    <h1>Password Generator</h1>
    <form action="index.php" method="GET">
        <label for="passwordLength">Password Length:</label>
        <input type="number" name="passwordLength" id="passwordLength" min="6" max="20" required>
        <button type="submit">Generate Password</button>
    </form>
</body>
</html>
