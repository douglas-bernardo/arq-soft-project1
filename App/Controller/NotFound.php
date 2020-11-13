<?php
namespace App\Controller;

use Library\Control\Page;

class NotFound extends Page
{

    public function __construct() 
    {
        parent::__construct();
        $this->template = $this->twig->load('404.html');
    }

    public function index()
    {
        echo $this->template->render();
    }

}