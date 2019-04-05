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
        echo " ";
        $this->displayBlock('title', $context, $blocks);
        // line 2
        echo "
<div class=\"container row\">
    <div class=\"col\">
    <h4>Current Exchange Rates:</h4>
    <ul class=\"curList\">
        ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["rates"]) || array_key_exists("rates", $context) ? $context["rates"] : (function () { throw new RuntimeError('Variable "rates" does not exist.', 7, $this->source); })()));
        foreach ($context['_seq'] as $context["key"] => $context["rate"]) {
            // line 8
            echo "
            <li class=\"cur\" id=\"";
            // line 9
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\">";
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
        echo "    </ul>
    </div>

    <div class=\"col converter text-center\">
        <h4>Converter</h4> 
        <div class=\"row\">
            <div class=\"col\">
            <div class=\"m-more\">
            <div><em>The currency I want to convert:</em></div>
            <select class=\"toConvert\" name=\"cur\">
                <option value=\"UAH\">UAH</option>


                ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["rates"]) || array_key_exists("rates", $context) ? $context["rates"] : (function () { throw new RuntimeError('Variable "rates" does not exist.', 25, $this->source); })()));
        foreach ($context['_seq'] as $context["key"] => $context["rate"]) {
            // line 26
            echo "
                    <option value=\"";
            // line 27
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "</option>

                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['rate'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "            </select>
            </div>
            <div class=\"m-more\">
            <div><em>Amount to convert:</em></div>
            <div class=\"d-flex justify-content-center\"><input class=\"convertVal\" type=\"text\" name=\"val\" placeholder=\"100\"></div>
            </div>
        </div>
        <div class=\"col\">
            <div class=\"m-more\">
            <div><em>The currency to convert into:</em></div>
            <select class=\"cur\" name=\"cur\">
                ";
        // line 41
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["rates"]) || array_key_exists("rates", $context) ? $context["rates"] : (function () { throw new RuntimeError('Variable "rates" does not exist.', 41, $this->source); })()));
        foreach ($context['_seq'] as $context["key"] => $context["rate"]) {
            // line 42
            echo "
                    <option value=\"";
            // line 43
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "</option>

                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['rate'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "                <option value=\"UAH\">UAH</option>
            </select>
            </div>
            <div class=\"m-more\">
            <div><em>Convertion result:</em></div>
            <div class=\"d-flex justify-content-center\"><input class=\"result\" disabled></div>
            </div>
        </div>
        </div>
    </div>
</div>
<script src=\"js/converter.js\"></script>
<script src=\"js/rates-ajax.js\"></script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 1
    public function block_title($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "<h2 class=\"";
        echo twig_escape_filter($this->env, (isset($context["slug"]) || array_key_exists("slug", $context) ? $context["slug"] : (function () { throw new RuntimeError('Variable "slug" does not exist.', 1, $this->source); })()), "html", null, true);
        echo "\" style=\"display:none;\">";
        echo twig_escape_filter($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 1, $this->source); })()), "html", null, true);
        echo "</h2>";
        
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
        return array (  153 => 1,  133 => 46,  122 => 43,  119 => 42,  115 => 41,  102 => 30,  91 => 27,  88 => 26,  84 => 25,  69 => 12,  56 => 9,  53 => 8,  49 => 7,  42 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source(" {% block title %}<h2 class=\"{{ slug }}\" style=\"display:none;\">{{ title }}</h2>{% endblock %}

<div class=\"container row\">
    <div class=\"col\">
    <h4>Current Exchange Rates:</h4>
    <ul class=\"curList\">
        {% for key, rate in rates %}

            <li class=\"cur\" id=\"{{ key }}\">{{ key }}: {{ rate }}</li>

        {% endfor %}
    </ul>
    </div>

    <div class=\"col converter text-center\">
        <h4>Converter</h4> 
        <div class=\"row\">
            <div class=\"col\">
            <div class=\"m-more\">
            <div><em>The currency I want to convert:</em></div>
            <select class=\"toConvert\" name=\"cur\">
                <option value=\"UAH\">UAH</option>


                {% for key, rate in rates %}

                    <option value=\"{{ key }}\">{{ key }}</option>

                {% endfor %}
            </select>
            </div>
            <div class=\"m-more\">
            <div><em>Amount to convert:</em></div>
            <div class=\"d-flex justify-content-center\"><input class=\"convertVal\" type=\"text\" name=\"val\" placeholder=\"100\"></div>
            </div>
        </div>
        <div class=\"col\">
            <div class=\"m-more\">
            <div><em>The currency to convert into:</em></div>
            <select class=\"cur\" name=\"cur\">
                {% for key, rate in rates %}

                    <option value=\"{{ key }}\">{{ key }}</option>

                {% endfor %}
                <option value=\"UAH\">UAH</option>
            </select>
            </div>
            <div class=\"m-more\">
            <div><em>Convertion result:</em></div>
            <div class=\"d-flex justify-content-center\"><input class=\"result\" disabled></div>
            </div>
        </div>
        </div>
    </div>
</div>
<script src=\"js/converter.js\"></script>
<script src=\"js/rates-ajax.js\"></script>
", "request.html.twig", "C:\\xampp\\htdocs\\converter\\templates\\request.html.twig");
    }
}
