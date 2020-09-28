<?php

require __DIR__ . '/vendor/autoload.php';

$content = '';

//$template = file_get_contents('App/Template/template.html');
$class = 'ProdutoList';

if (isset($_GET['class'])){
    $class = $_GET['class'];
}

if (class_exists($class)) {
    try {
        $page = new $class;
        ob_start();
        ($_GET) ? $page->index() : $page->home();
        $content = ob_get_contents();
        ob_end_clean();
    } catch (\Exception $e) {
        $content = $e->getMessage();
    }   
} else {
    header("Location: ?class=NotFound");
}

echo $content;

// $output = str_replace('{content}', $content, $template);

//echo $output;