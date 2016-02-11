<?php

require_once config('path.base_path').'/app/core/session.php';

    /**
    * start session class
    * @var object $session
    */
    $session = new \App\Core\Session;
    $session->start_session();