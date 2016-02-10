<?php namespace App\Core;

class LoadRoutes {
    
    //set module path
    public function path($path){
        $this->module_path = $path;
    }
    
    /* function all()
     * include all modules in folder module
     */
    
    public function all(){
        
        global $router;
        
        $modules = scandir($this->module_path);
        
        foreach($modules as $module){
            
            if($module != '.' || $modules != '..'){
                if(is_dir($this->module_path.'/'.$module) && file_exists($this->module_path.'/'.$module.'/routes.php')){
                    include_once $this->module_path.'/'.$module.'/routes.php';
                }
            }
            
        }
        
        
    }
    
    
    /* function load()
     * include all modules in array given
     */
    public function load($modules = []){
        
        global $router;
        
        foreach($modules as $module){
            if(file_exists($this->module_path.'/'.$module.'/routes.php')){
                include_once $this->module_path.'/'.$module.'/routes.php';
            }
        }
    }
}