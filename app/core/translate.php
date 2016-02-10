<?php namespace App\Core;

class Translate {
    
    public function file($file){
        if(file_exists($file)){
            include_once $file;
            foreach($TRANSLATE as $text_key => $val){
                $this->translate[$text_key] = $val;
            }
        }
    }
    
    public function set($text_key, $val){
        $this->translate[$text_key] = $val;
    }
    
    public function get($text_key){
        if($this->translate[$text_key]){
            return $this->translate[$text_key];
        } else {
            return $text_key;
        }
    }
    
}