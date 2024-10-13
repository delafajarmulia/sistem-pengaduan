<?php

if(!function_exists('censorName')){
    function censorName($name){
        $censoredName = substr($name, 0, 1);

        for($i = 1; $i < strlen($name); $i++){
            if(substr($name, $i, 1) == ' '){
                $censoredName .= ' ';
            }else{
                $censoredName .= '*';
            }
        }
        
        return $censoredName;
    }
}