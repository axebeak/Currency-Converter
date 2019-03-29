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

/* request.html.twig */
class __TwigTemplate_c17472e473fa74b54a0072c277c142d82c388e314bb336d330e5c9fcad6d4621 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "request.html.twig"));

        // line 1
        $this->displayBlock('title', $context, $blocks);
        // line 2
        echo "
<p>Make request to ";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["request"]) || array_key_exists("request", $context) ? $context["request"] : (function () { throw new RuntimeError('Variable "request" does not exist.', 3, $this->source); })()), "html", null, true);
        echo "</p>

<h4>Current Exchange Rates:</h4>
<ul>
    ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["rates"]) || array_key_exists("rates", $context) ? $context["rates"] : (function () { throw new RuntimeError('Variable "rates" does not exist.', 7, $this->source); })()));
        foreach ($context['_seq'] as $context["key"] => $context["rate"]) {
            // line 8
            echo "
        <li>";
            // line 9
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo ": ";
            echo twig_escape_filter($this->env, $context["rate"], "html", null, true);
            echo "</li>

    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['rate'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "</ul>

<h2>Convert UAH to other currencies:</h2>

    ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["rates"]) || array_key_exists("rates", $context) ? $context["rates"] : (function () { throw new RuntimeError('Variable "rates" does not exist.', 16, $this->source); })()));
        foreach ($context['_seq'] as $context["key"] => $context["rate"]) {
            // line 17
            echo "
        <form><input type=\"text\" name=\"";
            // line 18
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\" class=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\" placeholder=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\"></p><div class=\"result-";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\"></div></form>

    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['rate'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 1
    public function block_title($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo twig_escape_filter($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 1, $this->source); })()), "html", null, true);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "request.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 1,  82 => 18,  79 => 17,  75 => 16,  69 => 12,  58 => 9,  55 => 8,  51 => 7,  44 => 3,  41 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% block title %}{{ title }}{% endblock %}

<p>Make request to {{ request }}</p>

<h4>Current Exchange Rates:</h4>
<ul>
    {% for key, rate in rates %}

        <li>{{ key }}: {{ rate }}</li>

    {% endfor %}
</ul>

<h2>Convert UAH to other currencies:</h2>

    {% for key, rate in rates %}

        <form><input type=\"text\" name=\"{{ key }}\" class=\"{{ key }}\" placeholder=\"{{ key }}\"></p><div class=\"result-{{ key }}\"></div></form>

    {% endfor %}
", "request.html.twig", "C:\\xampp\\htdocs\\converter\\templates\\request.html.twig");
    }
}
