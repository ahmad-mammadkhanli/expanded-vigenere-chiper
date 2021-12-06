<?php

include "./helper/custom_helper.php";
  
class Vigenere 
{
    
    public function __construct()
    {

    }

    public function encrypte()
    {
        include "view/index.php";
    }
    
    private function getASCII()
    {
        $ascii = array();

        for ($i = 32; $i < 127; $i++) {
            array_push($ascii, chr($i));
        }

        return $ascii;
    }
}

$obj = new Vigenere();
$obj->encrypte();

?>