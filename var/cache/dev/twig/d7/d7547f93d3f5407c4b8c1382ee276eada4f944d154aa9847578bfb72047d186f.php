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

<h4>Current Exchange Rates:</h4>
<ul class=\"curList\">
    ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["rates"]) || array_key_exists("rates", $context) ? $context["rates"] : (function () { throw new RuntimeError('Variable "rates" does not exist.', 6, $this->source); })()));
        foreach ($context['_seq'] as $context["key"] => $context["rate"]) {
            // line 7
            echo "
        <li class=\"cur\" id=\"";
            // line 8
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
        // line 11
        echo "</ul>
<p>Convert <input class=\"convertVal\" type=\"text\" name=\"val\" placeholder=\"1\"> UAH to
  <select class=\"cur\" name=\"cur\">

    ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["rates"]) || array_key_exists("rates", $context) ? $context["rates"] : (function () { throw new RuntimeError('Variable "rates" does not exist.', 15, $this->source); })()));
        foreach ($context['_seq'] as $context["key"] => $context["rate"]) {
            // line 16
            echo "
        <option value=\"";
            // line 17
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "</option>

    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['rate'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "  </select> :
<div class=\"result\"></div>
<script>


function convertCur(){
  var input = \$(\".convertVal\").val();
  var cur = \$( \".cur option:selected\" ).text();
  if (!\$.isNumeric(input)){
    \$(\".result\").html('');
    \$('.result').append(\"Please enter a number\");
    return false;
  }
  if (\$(\"#\" + cur)){
    var rate = \$(\"#\" + cur).text().split(\": \")[1];
    if (!\$.isNumeric(rate)){
      \$(\".result\").html('');
      \$('.result').append(\"Something wrong with the exchange rate value for this currency. Please try again later.\");
      return false;
    }
  } else {
    \$(\".result\").html('');
    \$('.result').append(\"And error occured while converting the value.\");
    return false;
  }
  var result = Number.parseFloat(input / rate).toFixed(2);
  \$(\".result\").html('');
  \$('.result').append(result);
  return true;
}



clearInterval(ratesAjax);

var source = \$('h2').attr('class');

\$('.convertVal').keyup(function(){
  convertCur();
});

\$(\".cur\").change(function() {
  convertCur();
});


getRates();

var ratesAjax = setInterval(function() {
  getRates();
}, 5000);

function getRates() {
  \$.ajax({
    url: '/api?rates=' + source,
    success: function(data) {
      updateRates(data);
      return true;
    },
    error: function(){
      console.log('Error fetching currency data. Please check the logs.');
      return false;
    }
  });
}

function updateRates(rates){
    for (var key in rates) {
        var value = key + ': ' + rates[key];
        var curClass = '#' + key;
        if (\$(curClass)[0]){
          \$(curClass).html('');
          \$(curClass).append(value);
        } else {
          if (rates[key]){
            var newCur = '<li id=\"' + key + '\" class=\"cur\">' + key + \": \" + rates[key] + \"</li>\";
            \$('.curList').append(newCur);
            \$('select').append('<option value=\"' + key + ' \">' + key + '</option>');
          } else {
            var newCur = '<li id=\"' + key + '\">' + key + \": Error occured while fetching the value. Check if it exists on source</li>\";
            \$('.curList').append(newCur);
          }
        }
    }
    return true;
}


</script>
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
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 1, $this->source); })()), "html", null, true);
        echo "<h2>";
        
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
        return array (  187 => 1,  91 => 20,  80 => 17,  77 => 16,  73 => 15,  67 => 11,  54 => 8,  51 => 7,  47 => 6,  41 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% block title %}<h2 class=\"{{ slug }}\">{{ title }}<h2>{% endblock %}


<h4>Current Exchange Rates:</h4>
<ul class=\"curList\">
    {% for key, rate in rates %}

        <li class=\"cur\" id=\"{{ key }}\">{{ key }}: {{ rate }}</li>

    {% endfor %}
</ul>
<p>Convert <input class=\"convertVal\" type=\"text\" name=\"val\" placeholder=\"1\"> UAH to
  <select class=\"cur\" name=\"cur\">

    {% for key, rate in rates %}

        <option value=\"{{ key }}\">{{ key }}</option>

    {% endfor %}
  </select> :
<div class=\"result\"></div>
<script>


function convertCur(){
  var input = \$(\".convertVal\").val();
  var cur = \$( \".cur option:selected\" ).text();
  if (!\$.isNumeric(input)){
    \$(\".result\").html('');
    \$('.result').append(\"Please enter a number\");
    return false;
  }
  if (\$(\"#\" + cur)){
    var rate = \$(\"#\" + cur).text().split(\": \")[1];
    if (!\$.isNumeric(rate)){
      \$(\".result\").html('');
      \$('.result').append(\"Something wrong with the exchange rate value for this currency. Please try again later.\");
      return false;
    }
  } else {
    \$(\".result\").html('');
    \$('.result').append(\"And error occured while converting the value.\");
    return false;
  }
  var result = Number.parseFloat(input / rate).toFixed(2);
  \$(\".result\").html('');
  \$('.result').append(result);
  return true;
}



clearInterval(ratesAjax);

var source = \$('h2').attr('class');

\$('.convertVal').keyup(function(){
  convertCur();
});

\$(\".cur\").change(function() {
  convertCur();
});


getRates();

var ratesAjax = setInterval(function() {
  getRates();
}, 5000);

function getRates() {
  \$.ajax({
    url: '/api?rates=' + source,
    success: function(data) {
      updateRates(data);
      return true;
    },
    error: function(){
      console.log('Error fetching currency data. Please check the logs.');
      return false;
    }
  });
}

function updateRates(rates){
    for (var key in rates) {
        var value = key + ': ' + rates[key];
        var curClass = '#' + key;
        if (\$(curClass)[0]){
          \$(curClass).html('');
          \$(curClass).append(value);
        } else {
          if (rates[key]){
            var newCur = '<li id=\"' + key + '\" class=\"cur\">' + key + \": \" + rates[key] + \"</li>\";
            \$('.curList').append(newCur);
            \$('select').append('<option value=\"' + key + ' \">' + key + '</option>');
          } else {
            var newCur = '<li id=\"' + key + '\">' + key + \": Error occured while fetching the value. Check if it exists on source</li>\";
            \$('.curList').append(newCur);
          }
        }
    }
    return true;
}


</script>
", "request.html.twig", "C:\\xampp\\htdocs\\converter\\templates\\request.html.twig");
    }
}
