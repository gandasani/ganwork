<?php

    require_once config('path.base_path').'/app/core/routes.php';
    
    /**
     * Create Route
     * for add routes use $router in every modules
     * @var object $router
     */
    
    $router = new AltoRouter();
    
    /**
     * Load Module Path for router
     * @var object $loadroutes
     */
    $loadroutes = new \App\Core\LoadRoutes;
    $loadroutes->path(config('path.modules'));