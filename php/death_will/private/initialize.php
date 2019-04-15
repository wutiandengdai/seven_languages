<?php 
    /**
     * Constant setup OS Path
     * __FILE__ current OS path to this file
     * dirname()  return parent path
     */
    define ('PRIVATE_PATH', dirname(__FILE__));
    define ('PROJECT_PATH', dirname(PRIVATE_PATH));
    define ('PUBLIC_PATH', PROJECT_PATH.'/public');
    define ('SHARED_PATH', PRIVATE_PATH.'/shared');

    /**
     * Constant setup URL
     * _SERVER['SCRIPT_NAME'] url path of current php script
     * Set public directory as URL root
     */
    $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
    $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
    define('WWW_ROOT', $doc_root);
 
    require_once('functions.php');
    require_once('db_crud.php');

    $db = db_connect();
?>
