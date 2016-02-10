<?php namespace App\Core;

class LoadConfig {    
    
    //set config path
    public function path($path){
        $this->config_path = $path;
    }
    
    /*!
     * create()
     * load all config in config path
     * return config in array 
     */
    public function create(){
        foreach (glob($this->config_path.'/*.php') as $config_file) {
            include_once $config_file;
            $config_filename = str_replace($this->config_path.'/', '', $config_file);
            $config_filename = str_replace('.php', '', $config_filename);
            foreach($CONFIG as $con => $val){
                $config_set[$config_filename.'.'.$con] = $val;
            }
        }
        return $config_set;
    }
}