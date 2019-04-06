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

/* base.html.twig */
class __TwigTemplate_e0bd13542d76872bcb6ec92585eb4e96568e5fed36ff1e7eedde4a78646041d1 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 12
        echo "    </head>
    <body>
      <header class=\"col\">
        <nav class=\"row navbar d-flex text-center\">
          <li id=\"home-item\" class=\"nav-item\"><a class=\"nav-link\" href=\"javascript:void(0)\"><i class=\"fas fa-home\"></i> Home</a></li>
          <li id=\"local-file-item\" class=\"nav-item\"><a class=\"nav-link\" href=\"javascript:void(0)\">Local File</a></li>
          <li id=\"external-api-item\" class=\"nav-item\"><a class=\"nav-link\" href=\"javascript:void(0)\">External API</a></li>
          <li id=\"random-item\" class=\"nav-item\"><a class=\"nav-link\" href=\"javascript:void(0)\">Random</a></li>
          <li id=\"settings-item\" class=\"nav-item\"><a class=\"nav-link\" href=\"javascript:void(0)\"><i class=\"fas fa-cog\"></i> Settings</a></li>
        </nav>
        <span class=\"row selector\"></div>
      </header>
      <main class=\"container\">
      <div class=\"lds-ring\"><div></div><div></div><div></div><div></div></div>
      <div id=\"main\">
        Currency converter. Please select an option above;
      </div>
      </main>
        ";
        // line 30
        $this->displayBlock('javascripts', $context, $blocks);
        // line 34
        echo "    </body>
</html>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Currency Converter";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 7
        echo "          <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css\" integrity=\"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm\" crossorigin=\"anonymous\">
          <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.8.1/css/all.css\" integrity=\"sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf\" crossorigin=\"anonymous\">
          <link rel=\"stylesheet\" href=\"css/style.css\">
          <link rel=\"stylesheet\" href=\"css/loading.css\">
        ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 30
    public function block_javascripts($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 31
        echo "           <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
           <script src=\"js/menu.js\"></script>
        ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  119 => 31,  113 => 30,  102 => 7,  96 => 6,  84 => 5,  75 => 34,  73 => 30,  53 => 12,  51 => 6,  47 => 5,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>{% block title %}Currency Converter{% endblock %}</title>
        {% block stylesheets %}
          <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css\" integrity=\"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm\" crossorigin=\"anonymous\">
          <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.8.1/css/all.css\" integrity=\"sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf\" crossorigin=\"anonymous\">
          <link rel=\"stylesheet\" href=\"css/style.css\">
          <link rel=\"stylesheet\" href=\"css/loading.css\">
        {% endblock %}
    </head>
    <body>
      <header class=\"col\">
        <nav class=\"row navbar d-flex text-center\">
          <li id=\"home-item\" class=\"nav-item\"><a class=\"nav-link\" href=\"javascript:void(0)\"><i class=\"fas fa-home\"></i> Home</a></li>
          <li id=\"local-file-item\" class=\"nav-item\"><a class=\"nav-link\" href=\"javascript:void(0)\">Local File</a></li>
          <li id=\"external-api-item\" class=\"nav-item\"><a class=\"nav-link\" href=\"javascript:void(0)\">External API</a></li>
          <li id=\"random-item\" class=\"nav-item\"><a class=\"nav-link\" href=\"javascript:void(0)\">Random</a></li>
          <li id=\"settings-item\" class=\"nav-item\"><a class=\"nav-link\" href=\"javascript:void(0)\"><i class=\"fas fa-cog\"></i> Settings</a></li>
        </nav>
        <span class=\"row selector\"></div>
      </header>
      <main class=\"container\">
      <div class=\"lds-ring\"><div></div><div></div><div></div><div></div></div>
      <div id=\"main\">
        Currency converter. Please select an option above;
      </div>
      </main>
        {% block javascripts %}
           <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
           <script src=\"js/menu.js\"></script>
        {% endblock %}
    </body>
</html>
", "base.html.twig", "/home/convertertest/public_html/templates/base.html.twig");
    }
}
