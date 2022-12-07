<?php

class Nettoyer{

    public static function nettoyer_string($string){
        $string = trim($string);
        $string = stripslashes($string);
        $string = htmlspecialchars($string);
        return $string;
    }
}

?>
