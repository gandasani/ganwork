<?php

    /**
    * load config class and set to $config var
    * @var array $config
    */
    require_once __DIR__.'/core/config.php';
    $config = new \App\Core\LoadConfig;
    $config->path(__DIR__.'/../config');
    $config = $config->create();

    /**
    * load helper function
    */
    require_once __DIR__.'/core/helper.php';

    /**
    * load autoload.php in vendor to load all class from composer 
    */
    require_once config('path.vendor').'/autoload.php';

    /**
    * load all services in app/services folder
    */
    foreach (glob(__DIR__.'/services/*.php') as $service_file) {
        include_once $service_file;
    }

    /**
    * include preload.php
    * preload.php will run before your app run
    */
    include_once __DIR__.'/preload.php';


    /**
    * load match route then run it
    */
    $router_match = $router->match();
    
    if( is_string($router_match['target']) ){
        
        /**
         * Get module folder [/] folder name or filename (with the last is class name and filename, before it is folder and namespace) [@] function
         * for load function in routes
         * @var array $route_controller
         */
        $route_controller = explode('@', $router_match['target']);
        
        //include controller file
        include_once config('path.modules').'/'.$route_controller[0].'.php';
        
        //run class function
        $app = new $route_controller[0];
        $app->$route_controller[1]();
    
    }  elseif( $router_match && is_callable( $router_match['target'] ) ) {
        
        //call function
        call_user_func_array( $router_match['target'], $router_match['params'] );
        
    } elseif( !$router_match ){
        
        //die and show not found page
        die( $view->make('404') );
        
    }