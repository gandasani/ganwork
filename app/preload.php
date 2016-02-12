<?php

    /**
    * Preload file
    * This file loaded before app loaded
    */
    
    /**
    * start db with caching
    * @global Object $dbc
    */
    $dbc = new DbCacheService;
    $dbc->connection($db, $cache);
    
    /**
    * set router base path
    */
    $router->setBasePath('/');
    
    /**
     * use $loadroutes->all(); for load all
     * $loadroutes->load([array]); for load only you need
     */
    $loadroutes->all();
    
    /**
     * Add Preload Below
     */