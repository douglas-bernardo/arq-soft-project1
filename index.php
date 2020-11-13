<?php

use Library\Aspect\ApplicationAspectKernel;

require __DIR__ . '/vendor/autoload.php';

// Initialize an application aspect container
$applicationAspectKernel = ApplicationAspectKernel::getInstance();
$applicationAspectKernel->init([
    'debug'        => true, // use 'false' for production mode
    'appDir'       =>  __DIR__ . '/', // Application root directory
    'cacheDir'     =>  __DIR__ . '/Library/Cache', // Cache directory
    'includePaths' => [ // Include paths restricts the directories where aspects should be applied, or empty for all source files
        __DIR__ . '/App/Controller'
    ]
]);

$content = '';

//default controller
$class = 'ProdutoList';

// parse url
if (isset($_GET['class'])){
    $class = $_GET['class'];
}

if (class_exists('App\Controller\\' . $class)) {
    $class = 'App\Controller\\' . $class;
} else {
    header("Location: ?class=NotFound");
}

try {
    $page = new $class;
    ob_start();
    ($_GET) ? $page->run() : $page->index();
    $content = ob_get_contents();
    ob_end_clean();
} catch (\Exception $e) {
    $content = $e->getMessage();
}   

echo $content;