<?php

use Illuminate\Support\Facades\Log;

if(!function_exists('censorName')){
    function censorName($name){
        try{
            $censoredName = substr($name, 0, 1);
    
            for($i = 1; $i < strlen($name); $i++){
                if(substr($name, $i, 1) == ' '){
                    $censoredName .= ' ';
                }else{
                    $censoredName .= '*';
                }
            }
            
            return $censoredName;
        }catch(\Exception $e){
            Log::error('Error fetching censorName: ' . $e->getMessage());
            return []; // Mengembalikan array kosong jika terjadi error
        }
    }
}