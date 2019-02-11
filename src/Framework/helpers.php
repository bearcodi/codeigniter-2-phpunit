<?php
function autoloadCiSubfolderControllers($class) {
    foreach (glob(APPPATH.'controllers/**/'.strtolower($class).'.php') as $controller) {
        require_once $controller;
    }
}


/*
 *---------------------------------------------------------------
 * OVERRIDE FUNCTIONS
 *---------------------------------------------------------------
 *
 * This will "override" later functions meant to be defined
 * in core\Common.php, so they throw erros instead of output strings
 */
function show_error($message, $status_code = 500, $heading = 'An Error Was Encountered')
{
	throw new PHPUnit_Framework_Exception($message, $status_code);
}

function show_404($page = '', $log_error = TRUE)
{
	show_error($page, 404);
}