<?php 
 class Functions {
    public static function dump(array $array)
    {
        return '<pre>'.
                print_r($array).
                '</pre>';
    }

   
  
 }