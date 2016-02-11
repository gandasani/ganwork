<?php

    /**
    * Preload file
    * This file loaded before app loaded
    */
    
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
    * start session
    */
    $session->start_session();
    
    /**
     * Add Preload Below
     */