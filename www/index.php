<?php

session_start();

define('REL_URL', '/');
define('APP_NAME', '');

define('CONTROLLERS', '_app/controllers/');
define('VIEWS', '_app/views/');
define('MODELS', '_app/models/');
define('HELPERS', '_system/helpers/');
define('TEMPLATES', '_app/templates/');
define('WEBFILES', REL_URL.'_webfiles/');

require_once('_system/system.php');
require_once('_system/controller.php');
require_once('_system/model.php');
require_once(CONTROLLERS.'appController.php');

function __autoload($file) {
    if (file_exists(MODELS . $file . '.php')):
        require_once(MODELS . $file . '.php');
    elseif (file_exists(HELPERS . $file . '.php')):
        require_once(HELPERS . $file . '.php');
    else:
        die("Model ou Helper nao encontrado.");
    endif;
}

$start = new System;
$start->run();

