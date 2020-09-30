<?php

namespace Library\Control;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * Pattern: Page Controller
 * 
 */
abstract class Page
{
    
    protected $template;
    protected $twig;

    public function __construct() {
        $loader = new FilesystemLoader([
            'App/Template/theme',
            'App/View/fragments',
            'App/View'
        ]);
        $this->twig = new Environment(
                $loader, 
                [
                    "debug" => true,
                    "auto_reload" => true, 
                    "cache" => false
                ]
            );
        $this->twig->addExtension(new \Twig\Extension\DebugExtension());
    }

    public function run()
    {
        if ($_GET) {
            $class  = isset($_GET['class']) ? $_GET['class'] : null;
            $method = isset($_GET['method']) ? $_GET['method'] : "index";
            $data   = (!empty($_POST)) ? $_POST : $_GET;
            if ($class) {
                $object = ($class == get_class($this)) ? $this : new $class;
                if (method_exists($object, $method)) {
                    call_user_func( [ $object, $method ], $data );
                } else {
                    header("Location: ?class=NotFound");
                }
            }
        }
    }
}
