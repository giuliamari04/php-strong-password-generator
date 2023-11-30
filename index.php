<?php
session_start();
function generatePassword($passwordLength){
    $symbols = '!?&%$<>^+-*/()[]{}@#_=';
    $letters = 'abcdefghilmnopqrstuvwxyzjk';
    $upLetters = strtoupper($letters);
    $numbers = '0123456789';

    $newPassword = '';

    while(strlen($newPassword) < $passwordLength) {
        $valoriDisponibili = $symbols.$letters.$upLetters.$numbers;
        $newCharacter = $valoriDisponibili[rand(0, strlen($valoriDisponibili)-1)];

        if(!strpos($newPassword, $newCharacter)) {
            $newPassword .= $newCharacter;
        }
    }

    return $newPassword;
}
if (isset($_GET['passwordLength'])) {
    $password = generatePassword($_GET['passwordLength']);
  
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

    <h1>Your Generated Password:</h1>
    <p><?php echo $password; ?></p>
</body>
</html>
