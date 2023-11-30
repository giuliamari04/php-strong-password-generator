<?php
function generatePassword($options) {
    $symbols = '!?&%$<>^+-*/()[]{}@#_=';
    $letters = 'abcdefghilmnopqrstuvwxyzjk';
    $upLetters = strtoupper($letters);
    $numbers = '0123456789';

    $valoriDisponibili = '';
    if ($options['useNumbers']) {
        $valoriDisponibili .= $numbers;
    }
    if ($options['useLetters']) {
        $valoriDisponibili .= $letters;
        $valoriDisponibili .= $upLetters;
    }
    if ($options['useSymbols']) {
        $valoriDisponibili .= $symbols;
    }

    if (empty($valoriDisponibili)) {
        return 'Errore';
    }

    $newPassword = '';
    $usedCharacters = [];

    while (strlen($newPassword) < $options['length']) {
        $newCharacter = $valoriDisponibili[rand(0, strlen($valoriDisponibili) - 1)];

        if ($options['allowDuplicates'] && !in_array($newCharacter, $usedCharacters)) {
          
            $newPassword .= $newCharacter;
            $usedCharacters[] = $newCharacter;
        } else {
            
             // Ignora caratteri duplicati
        }
    }

    return $newPassword;
}


?>
