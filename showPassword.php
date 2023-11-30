<?php
session_start();

if (isset($_SESSION['password'])) {
    $password = $_SESSION['password'];
    unset($_SESSION['password']); // Rimuove la password dalla sessione
} else {
    // Se non c'è alcuna password nella sessione, reindirizza alla pagina principale
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generated</title>
</head>
<body>
    <h1>Your Generated Password:</h1>
    <p>Ecco la tua password lunga <?php echo strlen($password); ?> caratteri </p>
    <p><?php echo $password; ?></p>
   
</body>
</html>
