<?php
session_start();

include __DIR__ . '/functions/function.php';

if (isset($_GET['passwordLength'])) {
    $passwordOptions = [
        'length' => $_GET['passwordLength'],
        'useNumbers' => isset($_GET['useNumbers']),
        'useLetters' => isset($_GET['useLetters']),
        'useSymbols' => isset($_GET['useSymbols']),
        'allowDuplicates' => isset($_GET['allowDuplicates']),
    ];
    $password = generatePassword($passwordOptions);
    if ($password === 'Errore') {
        $error = 'Errore : Seleziona almeno una opzione per generare la password.';
    } else {
        $_SESSION['password'] = $password;

        // Redirect alla pagina dedicata
        header('Location: showPassword.php');
        exit();
    }
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
    <?php if (!empty($error)) { ?>
        <div class="alert alert-info w-50">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form action="index.php" method="GET" class="d-flex flex-column bg-light p-4 rounded-2 w-50">
        <div class="d-flex align-items-end justify-content-between ">
            <div>
                  <label for="passwordLength" class="form-label">Lunghezza Password: (min: 6 - max: 10 character):</label>
            </div>
           <div>
             <input type="number" name="passwordLength" id="passwordLength" min="6" max="10" class="form-control w-100" required>
           </div>
           
        </div>
       
        <div class="d-flex">
            <label>Consenti ripetizioni di uno o più caratteri:</label>
            <div class="d-flex flex-column w-100 align-items-end">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="allowDuplicates" value="1" checked> Yes
                </label>
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="allowDuplicates" value="0"> No
                </label>
            </div>

        </div>
        <div class=" d-flex flex-column w-100 align-items-end">
            <div class="d-flex flex-column">
                <label>
                    <input type="checkbox" class="form-check-input" name="useNumbers"> Use Numbers
                </label>

                <label>
                    <input type="checkbox" class="form-check-input" name="useLetters"> Use Letters
                </label>

                <label>
                    <input type="checkbox" class="form-check-input" name="useSymbols"> Use Symbols
                </label>
            </div>

        </div>

        <div>
            <button type="submit" class="btn btn-primary ">Invia</button>
            <button type="reset" class="btn btn-secondary ">Annulla</button>
        </div>

    </form>
</div>
</main>

</body>

</html>