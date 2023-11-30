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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Password Generator</title>
</head>
<body>
   
   

    <main style="height: 100vh" class="my-bg-blue">
<div class="container d-flex justify-content-center flex-column align-items-center pt-5 ">
    <h1 class="my-text-grey">Strong Password Generator</h1>
    <h2 class="text-light">Genera una password sicura</h2>
    <div class="d-flex flex-column bg-light p-4 rounded-2 w-50">
    <h4>Your Generated Password</h4>
    <p>Ecco la tua password lunga <?php echo strlen($password); ?> caratteri: </p>
    <p><?php echo $password; ?></p>

    </div>
    

</div>
</main>
</body>
</html>
