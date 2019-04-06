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

/* settings.html.twig */
class __TwigTemplate_dc39380893979566fa837e35aa00dbc3174cb19da20bb42e446f6144a7834d5a extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "settings.html.twig"));

        // line 1
        echo "<div class=\"container text-center w-50\">
<h4>Settings</h4>
<div class=\"currencies\">
";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["rates"]) || array_key_exists("rates", $context) ? $context["rates"] : (function () { throw new RuntimeError('Variable "rates" does not exist.', 4, $this->source); })()));
        foreach ($context['_seq'] as $context["key"] => $context["rate"]) {
            // line 5
            echo "
    <div class=\"d-flex\">
        <input class=\"cur\" type=\"text\" name=\"";
            // line 7
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\" placeholder=\"Currency\">
        <input class=\"curVal ml-4\" type=\"text\" name=\"";
            // line 8
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $context["rate"], "html", null, true);
            echo "\" placeholder=\"Value for 'Local File'\">
        <i class=\"fa fa-times\" aria-hidden=\"true\"></i>
    </div>
    
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['rate'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "</div>
<div class=\"d-flex\">
    <input type=\"text\" class=\"cur\" placeholder=\"Currency\">
    <input class=\"ml-4 curVal\" type=\"text\" placeholder=\"Value for 'Local File'\">
    <i class=\"ml-2 fa fa-times\" aria-hidden=\"true\"></i>
</div>
<div>
<span style=\"display:inline-block;\">
<i class=\"fas fa-plus settings-icon\"></i>
<i class=\"fas fa-check settings-icon\"></i>
</span>
<div class=\"lds-ellipsis\"><div></div><div></div><div></div><div></div></div>
</div>
<div class=\"output mt-3\"></div>
</div>
<script>
    
    function outputResponse(response){
        \$(\".output\").append(response);
        \$(\".output\").css(\"opacity\", 0);
        \$(\".output\").css(\"top\", \"50px\");
        \$(\".output\").animate({
            opacity: 1,
            top: \"0px\",
            }, 1000, function() {
                return true;
        });
    }
    
    if (ratesAjax){
    clearInterval(ratesAjax);
    }
    
    \$(document).on('click','.fa-times',function(){
         var parent = \$(this).parent();
         \$(parent).remove();
    });
    
    \$('.fa-plus').click(function(){
        var newCur = '<div class=\"d-flex\"><input type=\"text\" class=\"cur\" placeholder=\"Currency\"><input class=\"ml-4 curVal\" type=\"text\" placeholder=\"Value for \\'Local File\\'\"><i class=\"ml-2 fa fa-times\" aria-hidden=\"true\"></i></div>';
        \$('.currencies').append(newCur);
    });
    
    \$('button').click(function(){
        var currencies = [];
        var values = [];
        
        var curVals = {};
        
        \$('.cur').each(function(){
            \$(\".output\").html('');
            \$('input').css(\"border-bottom\", \"1px solid #f7911d\");
            var thisVal = \$(this).val();
            if (!thisVal){
                currencies.push(\"PASSTHIS\");
            } else {
                currencies.push(thisVal);
            }
        });
        
        \$('.curVal').each(function(){
            var thisVal = \$(this).val();
            values.push(thisVal);
        });
        
        for (i = 0; i < values.length; i++){
            curVals[currencies[i]] = values[i];
        }
        
        for (var cur in curVals) {
            if (cur == 'PASSTHIS') {
                delete curVals[cur];
                continue;
            }
            if (!\$.isNumeric(curVals[cur])){
                outputResponse(\"<div class='alert alert-danger'>ERROR! The currency value must be numeric!</div>\");
                return false;
            }
        } 

        var vals = JSON.stringify(curVals);
        \$('.lds-ellipsis').show();
        \$('button').hide();
        \$.ajax({
            url: '/api?currencies=' + vals,
            success: function(data) {
                \$('button').show();
                \$('.lds-ellipsis').hide();
                outputResponse(\"<div class='alert alert-info'>Currencies succesfully updated. It may take several seconds for the updates to be displayed.</div>\");
            },
        });
    });
    
    
</script>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "settings.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 13,  57 => 8,  51 => 7,  47 => 5,  43 => 4,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"container text-center w-50\">
<h4>Settings</h4>
<div class=\"currencies\">
{% for key, rate in rates %}

    <div class=\"d-flex\">
        <input class=\"cur\" type=\"text\" name=\"{{ key }}\" value=\"{{ key }}\" placeholder=\"Currency\">
        <input class=\"curVal ml-4\" type=\"text\" name=\"{{ key }}\" value=\"{{ rate }}\" placeholder=\"Value for 'Local File'\">
        <i class=\"fa fa-times\" aria-hidden=\"true\"></i>
    </div>
    
{% endfor %}
</div>
<div class=\"d-flex\">
    <input type=\"text\" class=\"cur\" placeholder=\"Currency\">
    <input class=\"ml-4 curVal\" type=\"text\" placeholder=\"Value for 'Local File'\">
    <i class=\"ml-2 fa fa-times\" aria-hidden=\"true\"></i>
</div>
<div>
<span style=\"display:inline-block;\">
<i class=\"fas fa-plus settings-icon\"></i>
<i class=\"fas fa-check settings-icon\"></i>
</span>
<div class=\"lds-ellipsis\"><div></div><div></div><div></div><div></div></div>
</div>
<div class=\"output mt-3\"></div>
</div>
<script>
    
    function outputResponse(response){
        \$(\".output\").append(response);
        \$(\".output\").css(\"opacity\", 0);
        \$(\".output\").css(\"top\", \"50px\");
        \$(\".output\").animate({
            opacity: 1,
            top: \"0px\",
            }, 1000, function() {
                return true;
        });
    }
    
    if (ratesAjax){
    clearInterval(ratesAjax);
    }
    
    \$(document).on('click','.fa-times',function(){
         var parent = \$(this).parent();
         \$(parent).remove();
    });
    
    \$('.fa-plus').click(function(){
        var newCur = '<div class=\"d-flex\"><input type=\"text\" class=\"cur\" placeholder=\"Currency\"><input class=\"ml-4 curVal\" type=\"text\" placeholder=\"Value for \\'Local File\\'\"><i class=\"ml-2 fa fa-times\" aria-hidden=\"true\"></i></div>';
        \$('.currencies').append(newCur);
    });
    
    \$('button').click(function(){
        var currencies = [];
        var values = [];
        
        var curVals = {};
        
        \$('.cur').each(function(){
            \$(\".output\").html('');
            \$('input').css(\"border-bottom\", \"1px solid #f7911d\");
            var thisVal = \$(this).val();
            if (!thisVal){
                currencies.push(\"PASSTHIS\");
            } else {
                currencies.push(thisVal);
            }
        });
        
        \$('.curVal').each(function(){
            var thisVal = \$(this).val();
            values.push(thisVal);
        });
        
        for (i = 0; i < values.length; i++){
            curVals[currencies[i]] = values[i];
        }
        
        for (var cur in curVals) {
            if (cur == 'PASSTHIS') {
                delete curVals[cur];
                continue;
            }
            if (!\$.isNumeric(curVals[cur])){
                outputResponse(\"<div class='alert alert-danger'>ERROR! The currency value must be numeric!</div>\");
                return false;
            }
        } 

        var vals = JSON.stringify(curVals);
        \$('.lds-ellipsis').show();
        \$('button').hide();
        \$.ajax({
            url: '/api?currencies=' + vals,
            success: function(data) {
                \$('button').show();
                \$('.lds-ellipsis').hide();
                outputResponse(\"<div class='alert alert-info'>Currencies succesfully updated. It may take several seconds for the updates to be displayed.</div>\");
            },
        });
    });
    
    
</script>", "settings.html.twig", "/home/convertertest/public_html/templates/settings.html.twig");
    }
}
