<?php
function generatePassword(){
    $symbols = '!?&%$<>^+-*/()[]{}@#_=';
    $letters = 'abcdefghilmnopqrstuvwxyzjk';
    $upLetters = strtoupper($letters);
    $numbers = '0123456789';


    if (isset($_GET['passwordLength'])){
        $passwordlegth = $_GET['passwordLength'];
        //var_dump($passwordlegth);
        $newPassword='';

        while(strlen($newPassword)< $passwordlegth){

            $valoriDisponibili = $symbols.$letters.$upLetters.$numbers;
            $newCharacter = $valoriDisponibili[rand(0, strlen($valoriDisponibili)-1)];

            if(!strpos($newPassword,$newCharacter)){
                $newPassword .= $newCharacter;
               
            }
        }
        //var_dump($newPassword); 
        $_SESSION['password'] = $newPassword;
        header('Location: showPassword.php');
        die();
        
    }
   return false;
}
?>