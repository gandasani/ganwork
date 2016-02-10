<?php

require_once config('path.base_path').'/app/core/session.php';

//load session class and start | $session
$session = new \App\Core\Session;
$session->start_session();