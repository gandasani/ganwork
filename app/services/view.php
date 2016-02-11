<?php

    /**
    * load view class
    * @var object $view
    */
    $view = new Philo\Blade\Blade(config('path.themes').'/'.config('app.theme'), config('path.storages').'/cache/views');
    $view = $view->view();