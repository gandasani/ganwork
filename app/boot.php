<?php

//load config | $config
require_once __DIR__.'/core/config.php';
$config = new \App\Core\LoadConfig;
$config->path(__DIR__.'/../config');
$config = $config->create();

//load helper
require_once __DIR__.'/core/helper.php';

//autoload tools
require_once config('path.vendor').'/autoload.php';

foreach (glob(__DIR__.'/services/*.php') as $service_file) {
    include_once $service_file;
}

//include preload file
include_once __DIR__.'/preload.php';

//get match router
$router_match = $router->match();

//load router file if is_string
if(is_string($router_match['target'])){
    /*!
     * Get module folder [/] folder name or filename (with the last is class name and filename, before it is folder and namespace) [@] function
     * for load function in routes
     */
    $route_controller = explode('@', $router_match['target']);
    
    //include controller file
    include_once config('path.modules').'/'.$route_controller[0].'.php';
    
    //run class function
    $app = new $route_controller[0];
    $app->$route_controller[1]();
}