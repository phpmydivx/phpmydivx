<?php

if (!file_exists(__DIR__.'/config.php')) {
    exit('Missing config file!');
}

require_once __DIR__.'/config.php';

ini_set('default_charset', ENCODING);
ini_set('php.input_encoding', ENCODING);
ini_set('php.internal_encoding', ENCODING);
ini_set('php.output_encoding', ENCODING);
date_default_timezone_set(TIMEZONE);

// Folders informations
define('BASE_DIR', realpath(__DIR__));

function loader($class)
{
    $class = str_replace('PhpMyDivx\\', '', $class);
    $class = str_replace('\\', '/', $class);
    $file = BASE_DIR.'/'.strtolower($class).'.php';
    try {
        if (file_exists($file)) {
            require_once $file;
        }
    } catch (Exception $e) {
        echo 'Exception : ',  $e->getMessage(), "\n";
    }
}

spl_autoload_register('loader');

$app = new PhpMyDivx\Engine\App();