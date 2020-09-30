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

/* produto-list.html */
class __TwigTemplate_1d6e1bef0a106dd8ccda79bfadd0a91c52d5ab6820d8f604b26c860692d5fd50 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'script' => [$this, 'block_script'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "template.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("template.html", "produto-list.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 6
            echo "
<div class=\"container-fluid\">
    <div class=\"row\" id=\"item\">
        <div class=\"col-12 mt-3\">
            <div class=\"card\">
                <div class=\"card-horizontal\" style=\"display: flex; float: 1 1 auto;\">
                    <div class=\"img-square-wrapper\">
                        <img class=\"\" src=\"";
            // line 13
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, false, 13), "html", null, true);
            echo "\" alt=\"Card image cap\">
                    </div>
                    <div class=\"card-body\">
                        <h4 class=\"card-title\">";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "nome", [], "any", false, false, false, 16), "html", null, true);
            echo "</h4>
                        <p class=\"card-text\">";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "descricao", [], "any", false, false, false, 17), "html", null, true);
            echo "</p>
                        <button type=\"button\" class=\"btn btn-info btn-sm\" onclick=\"load_page('?class=ProdutoForm&method=update&id=";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 18), "html", null, true);
            echo "')\">Alterar</button>
                        <button type=\"button\" class=\"btn btn-danger btn-sm\" id=\"delete_item\" data-action='?class=ProdutoList&method=delete' data-id='";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 19), "html", null, true);
            echo "'>Excluir</button>
                    </div>
                </div>
                <div class=\"card-footer\">
                    <small class=\"text-muted\">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>
    </div>
</div>

";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "
";
    }

    // line 34
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " 
  <script src=\"App/View/js/produto_list.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "produto-list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 34,  103 => 31,  85 => 19,  81 => 18,  77 => 17,  73 => 16,  67 => 13,  58 => 6,  54 => 5,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"template.html\" %}

{% block content %}

{% for item in products %}

<div class=\"container-fluid\">
    <div class=\"row\" id=\"item\">
        <div class=\"col-12 mt-3\">
            <div class=\"card\">
                <div class=\"card-horizontal\" style=\"display: flex; float: 1 1 auto;\">
                    <div class=\"img-square-wrapper\">
                        <img class=\"\" src=\"{{item.url}}\" alt=\"Card image cap\">
                    </div>
                    <div class=\"card-body\">
                        <h4 class=\"card-title\">{{item.nome}}</h4>
                        <p class=\"card-text\">{{item.descricao}}</p>
                        <button type=\"button\" class=\"btn btn-info btn-sm\" onclick=\"load_page('?class=ProdutoForm&method=update&id={{item.id}}')\">Alterar</button>
                        <button type=\"button\" class=\"btn btn-danger btn-sm\" id=\"delete_item\" data-action='?class=ProdutoList&method=delete' data-id='{{item.id}}'>Excluir</button>
                    </div>
                </div>
                <div class=\"card-footer\">
                    <small class=\"text-muted\">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>
    </div>
</div>

{% endfor %}

{% endblock %}

{% block script %} 
  <script src=\"App/View/js/produto_list.js\"></script>
{% endblock %}", "produto-list.html", "/var/www/arq-sis-projeto01/App/View/produto-list.html");
    }
}
