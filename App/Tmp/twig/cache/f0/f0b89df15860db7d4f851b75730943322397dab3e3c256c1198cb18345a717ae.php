<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* template.html */
class __TwigTemplate_f47e5859f36d6452a1c202024a827b013c0fbd55bf12ce86503b96dc16df35a1 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'script' => [$this, 'block_script'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!doctype html>
<html lang=\"pt-br\">
  <head>
    <!-- Required meta tags -->
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <link rel=\"shortcut icon\" href=\"#\" type=\"image/x-icon\">
    <!-- Bootstrap CSS -->
    <link rel=\"stylesheet\" href=\"App/Template/theme/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"App/Template/theme/css/template.css\">
    <title>Pilot | Self Menu</title>
  </head>
  <body>

    <div class=\"container mt-3\">
        <!-- Jumbotron Painel -->        
        <div class=\"jumbotron jumbotron-fluid\">
          <div class=\"container\">
            <h1 class=\"display-4\">Self Menu</h1>
            <p class=\"lead\">O que você gostaria de experimentar hoje?</p>
          </div>
        </div>
        
        <!-- Navbar -->
          <ul class=\"nav justify-content-center\">
            <li class=\"nav-item\">
                <!-- <button type=\"button\" class=\"btn btn-outline-info mr-3 active\">Items Menu</button> -->
                <a class=\"btn btn-outline-info mr-3\" onclick=\"load_page('index.php')\">Lista de Items</a>
            </li>
            <li class=\"nav-item\">
                <!-- <button type=\"button\" class=\"btn btn-outline-info mr-3\" data-action=\"?class=NewItemController\">Novo</button> -->
                <a class=\"btn btn-outline-info mr-3\" onclick=\"load_page('?class=ProdutoForm')\">Novo Item</a>
            </li>

            
            <li class=\"nav-item\">
                <a class=\"btn btn-outline-info mr-3\" onclick=\"load_page('?class=CategoriaList')\">Categoria</a> 
            </li>

          </ul>

        <!-- main content -->
        <div id=\"main\" class=\"main mt-5 mb-5\">
            <div class=\"main_dialog\"></div>
            ";
        // line 45
        $this->displayBlock('content', $context, $blocks);
        // line 46
        echo "        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type=\"text/javascript\" src=\"App/Template/theme/js/jquery-3.5.1.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js\" integrity=\"sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN\" crossorigin=\"anonymous\"></script>
    <script type=\"text/javascript\" src=\"App/Template/theme/js/bootstrap.js\"></script>
    <script type=\"text/javascript\" src=\"App/Template/theme/js/app.js\"></script>

    ";
        // line 57
        $this->displayBlock('script', $context, $blocks);
        // line 58
        echo "
  </body>
</html>";
    }

    // line 45
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 57
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " ";
    }

    public function getTemplateName()
    {
        return "template.html";
    }

    public function getDebugInfo()
    {
        return array (  114 => 57,  108 => 45,  102 => 58,  100 => 57,  87 => 46,  85 => 45,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!doctype html>
<html lang=\"pt-br\">
  <head>
    <!-- Required meta tags -->
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <link rel=\"shortcut icon\" href=\"#\" type=\"image/x-icon\">
    <!-- Bootstrap CSS -->
    <link rel=\"stylesheet\" href=\"App/Template/theme/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"App/Template/theme/css/template.css\">
    <title>Pilot | Self Menu</title>
  </head>
  <body>

    <div class=\"container mt-3\">
        <!-- Jumbotron Painel -->        
        <div class=\"jumbotron jumbotron-fluid\">
          <div class=\"container\">
            <h1 class=\"display-4\">Self Menu</h1>
            <p class=\"lead\">O que você gostaria de experimentar hoje?</p>
          </div>
        </div>
        
        <!-- Navbar -->
          <ul class=\"nav justify-content-center\">
            <li class=\"nav-item\">
                <!-- <button type=\"button\" class=\"btn btn-outline-info mr-3 active\">Items Menu</button> -->
                <a class=\"btn btn-outline-info mr-3\" onclick=\"load_page('index.php')\">Lista de Items</a>
            </li>
            <li class=\"nav-item\">
                <!-- <button type=\"button\" class=\"btn btn-outline-info mr-3\" data-action=\"?class=NewItemController\">Novo</button> -->
                <a class=\"btn btn-outline-info mr-3\" onclick=\"load_page('?class=ProdutoForm')\">Novo Item</a>
            </li>

            
            <li class=\"nav-item\">
                <a class=\"btn btn-outline-info mr-3\" onclick=\"load_page('?class=CategoriaList')\">Categoria</a> 
            </li>

          </ul>

        <!-- main content -->
        <div id=\"main\" class=\"main mt-5 mb-5\">
            <div class=\"main_dialog\"></div>
            {% block content %}{% endblock %}
        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type=\"text/javascript\" src=\"App/Template/theme/js/jquery-3.5.1.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js\" integrity=\"sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN\" crossorigin=\"anonymous\"></script>
    <script type=\"text/javascript\" src=\"App/Template/theme/js/bootstrap.js\"></script>
    <script type=\"text/javascript\" src=\"App/Template/theme/js/app.js\"></script>

    {% block script %} {% endblock %}

  </body>
</html>", "template.html", "/var/www/arq-sis-projeto01/App/Template/theme/template.html");
    }
}
