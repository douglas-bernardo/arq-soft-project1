<?php

require __DIR__ . '/vendor/autoload.php';

$content = '';

$class = 'ProdutoList';

if (isset($_GET['class'])){
    $class = $_GET['class'];
}

if (class_exists($class)) {
    try {
        $page = new $class;
        ob_start();
        ($_GET) ? $page->run() : $page->index();
        $content = ob_get_contents();
        ob_end_clean();
    } catch (\Exception $e) {
        $content = $e->getMessage();
    }   
} else {
    header("Location: ?class=NotFound");
}

echo $content;