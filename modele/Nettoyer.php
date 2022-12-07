<?php

class Nettoyer{

    private string $str1;

    public static function nettoyer_string($string){
        
        $str1 = filter_var($string,FILTER_SANITIZE_STRING);
        echo $str1;
    }
}

?>
