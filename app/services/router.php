<?php

    /**
     * Create Route
     * for add routes use $router in every modules
     * @var object $router
     */
    require_once config('path.base_path').'/app/core/routes.php';
    
    //create route
    $router = new AltoRouter();
    $router->setBasePath('/');
    
    //load routes
    $loadroutes = new \App\Core\LoadRoutes;
    $loadroutes->path(config('path.modules'));
    
    /*!
     * use $loadroutes->all(); for load all
     * $loadroutes->load([array]); for load only you need
     */
    $loadroutes->all();
    $loadroutes = '';