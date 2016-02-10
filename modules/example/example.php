<?php

namespace example;

class example{
    
    public function __construct(){
        global $view;
        $view->addLocation(config('path.modules').'/example/view');
    }
    
    public function home(){
        global $db, $cache, $view;
        
        echo $view->make('ex', ['title' => 'EXAMPLE MODULE']);
        
    }
}