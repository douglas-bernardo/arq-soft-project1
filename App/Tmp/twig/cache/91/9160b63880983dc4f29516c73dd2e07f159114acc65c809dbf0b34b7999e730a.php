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

/* produto-form.html */
class __TwigTemplate_1222bf881c279a1b2af437cad1926804e9f5c9f2e53fefd40630dd46a9a6f4de extends Template
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
        $this->parent = $this->loadTemplate("template.html", "produto-form.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<!-- ";
        echo twig_var_dump($this->env, $context, ...[0 => ($context["item"] ?? null)]);
        echo " -->
<div class=\"d-flex justify-content-center\">

  <div class=\"col align-self-center\" style=\"max-width: 700px;\">

    <form class=\"novo_item\" id=\"novo_item\" action=\"?class=ProdutoForm&method=create\" enctype=\"multipart/form-data\">

        ";
        // line 11
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "id", [], "any", false, false, false, 11)) {
            // line 12
            echo "          <input type=\"hidden\" name=\"id\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "id", [], "any", false, false, false, 12), "html", null, true);
            echo "\">
        ";
        }
        // line 14
        echo "
        <div class=\"form-group\">
          <label for=\"exampleFormControlSelect1\">Categoria</label>
          <select class=\"form-control\" id=\"exampleFormControlSelect1\">
            <option value=\"0\" disabled selected>Selecione uma categoria</option>
            ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 20
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 20), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "descricao", [], "any", false, false, false, 20), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "          </select>
        </div>
        
        <div class=\"form-group\">
          <label for=\"exampleFormControlInput1\">Nome do item</label>
          <input type=\"text\" class=\"form-control\" name=\"nome\" value=\"";
        // line 27
        ((twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "nome", [], "any", false, false, false, 27)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "nome", [], "any", false, false, false, 27), "html", null, true))) : (print ("")));
        echo "\" id=\"exampleFormControlInput1\">
        </div>
        
        <div class=\"form-group\">
          <label for=\"exampleFormControlTextarea1\">Descrição</label>
          <textarea class=\"form-control\" name=\"descricao\" id=\"exampleFormControlTextarea1\" rows=\"3\">";
        // line 32
        ((twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "descricao", [], "any", false, false, false, 32)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "descricao", [], "any", false, false, false, 32), "html", null, true))) : (print ("")));
        echo "</textarea>
        </div>

        ";
        // line 35
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "id", [], "any", false, false, false, 35), false))) {
            // line 36
            echo "        <div class=\"form-group\">
            <div class=\"custom-file\">
              <label class=\"custom-file-label text-truncate\" for=\"customFile\">Escolha uma foto de no (";
            // line 38
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "max_size", [], "any", false, false, false, 38), "html", null, true);
            echo ")</label>
              <input type=\"file\" class=\"custom-file-input\" id=\"customFile\" name=\"image\" lang=\"pt-br\">
            </div>        
        </div>
        ";
        }
        // line 43
        echo "        
        <div class=\"d-flex justify-content-end\">
          <button type=\"submit\" class=\"btn btn-info\">Salvar Item</button>
        </div>      

      </form>
      
  </div>

</div>

";
    }

    // line 56
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " 
  <script src=\"App/View/js/produto_form.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "produto-form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 56,  127 => 43,  119 => 38,  115 => 36,  113 => 35,  107 => 32,  99 => 27,  92 => 22,  81 => 20,  77 => 19,  70 => 14,  64 => 12,  62 => 11,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"template.html\" %}

{% block content %}
<!-- {{ dump(item) }} -->
<div class=\"d-flex justify-content-center\">

  <div class=\"col align-self-center\" style=\"max-width: 700px;\">

    <form class=\"novo_item\" id=\"novo_item\" action=\"?class=ProdutoForm&method=create\" enctype=\"multipart/form-data\">

        {% if item.id %}
          <input type=\"hidden\" name=\"id\" value=\"{{ item.id }}\">
        {% endif %}

        <div class=\"form-group\">
          <label for=\"exampleFormControlSelect1\">Categoria</label>
          <select class=\"form-control\" id=\"exampleFormControlSelect1\">
            <option value=\"0\" disabled selected>Selecione uma categoria</option>
            {% for category in categories %}
            <option value=\"{{category.id}}\">{{category.descricao}}</option>
            {% endfor %}
          </select>
        </div>
        
        <div class=\"form-group\">
          <label for=\"exampleFormControlInput1\">Nome do item</label>
          <input type=\"text\" class=\"form-control\" name=\"nome\" value=\"{{ item.nome ? item.nome : '' }}\" id=\"exampleFormControlInput1\">
        </div>
        
        <div class=\"form-group\">
          <label for=\"exampleFormControlTextarea1\">Descrição</label>
          <textarea class=\"form-control\" name=\"descricao\" id=\"exampleFormControlTextarea1\" rows=\"3\">{{ item.descricao ? item.descricao : '' }}</textarea>
        </div>

        {% if item.id == false %}
        <div class=\"form-group\">
            <div class=\"custom-file\">
              <label class=\"custom-file-label text-truncate\" for=\"customFile\">Escolha uma foto de no ({{ item.max_size }})</label>
              <input type=\"file\" class=\"custom-file-input\" id=\"customFile\" name=\"image\" lang=\"pt-br\">
            </div>        
        </div>
        {% endif %}
        
        <div class=\"d-flex justify-content-end\">
          <button type=\"submit\" class=\"btn btn-info\">Salvar Item</button>
        </div>      

      </form>
      
  </div>

</div>

{% endblock %}

{% block script %} 
  <script src=\"App/View/js/produto_form.js\"></script>
{% endblock %}", "produto-form.html", "/var/www/arq-sis-projeto01/App/View/produto-form.html");
    }
}
