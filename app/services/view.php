<?php

//load blade view | $view
$view = new Philo\Blade\Blade(config('path.themes').'/'.config('app.theme'), config('path.storages').'/cache/views');
$view = $view->view();