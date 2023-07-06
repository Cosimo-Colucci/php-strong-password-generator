<?php 
    function getRandomPassword ($passwordLenght){
        $caracters = 'qwertyuiopasdfghjklzxcvbnm';
        $numbers = '1234567890';
        $symbols = '!£$%&/@#*<>-_()[]{}:;"';
        
        $actualCharaters = strtoupper($caracters). $caracters. $numbers. $symbols;
        $newPassword = '';
        if($passwordLenght >= 6 && $passwordLenght <= 30 ){

            while(strlen($newPassword)< $passwordLenght){
                $randomIndex = rand(0, strlen($actualCharaters) - 1);
                $newPassword .= $actualCharaters[$randomIndex];
            }

            return $newPassword;
        } else {
            return false;
        }
    }
?>