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

/* home.html.twig */
class __TwigTemplate_1d45f386ad02aec0bc369c7a4979530c9477424f7452c156283dcddae7001292 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home.html.twig"));

        // line 1
        echo "<div class=\"continer home-text\">
  <h5 class=\"text-center h5-home\">Description</h5>
  <p>This is a converter script created with Symfony 4 that allows you to add/manage different currencies, their exchange rates, etc. in one interface.
    The currencies are calculated based on their 'buy' rate relative to UAH.</p>
  <p>The currencies available in the script are defined in the <span class=\"variable\">CURRENCIES</span> variable (the currencies' names must be separated by commas) in the .env file in the root of the application.</p>
  <p>It's not neccessary to define new currencies in the .env file manually. You can let this script add them for you by simply submitting the new ones via the 'Settings' menu (it will regenerate the .env file based on the input - provided that the input is valid).</p>
  <p>The rates on pages of different methods are updated every 5 seconds via Ajax, so there is no need to refresh to see the new currency added or the old value updated - you can just wait for several seconds.</p>
  <h5 class=\"text-center\">Local File</h5>
  <p>The local file source is using the values defined in the .env file as exchange rates for the currencies. So, for example, if you have <span class=\"variable\">CURRENCIES</span> set to <span class=\"variable\">USD,EUR</span>, you'll need to define <span class=\"variable\">USD</span> and <span class=\"variable\">EUR</span> variables as well. Otherwise, the FileHelper class will throw an exception. The 'Settings' menu allows you to define the values for new currencies as well.</p>
  <h5 class=\"text-center\">External API</h5>
  <p>This method fetches the currency exchange rates from API. By default, it uses a PrivatBank API for this. The API is defined in <span class=\"variable\">API_LINK</span> variable in the .env file. Currently, the API link is ";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["API_LINK"]) || array_key_exists("API_LINK", $context) ? $context["API_LINK"] : (function () { throw new RuntimeError('Variable "API_LINK" does not exist.', 11, $this->source); })()), "html", null, true);
        echo ".</p>
  <h5 class=\"text-center\">Random</h5>
  <p class=\"mb-4\">This type randomizes the exchange rates for the currencies set in <span class=\"variable\">CURRENCIES</span> variable in the .env file. The random values for the currencies are stored in cookies with expiration set to 15 seconds. After the cookie expires, the new values are randomly generated.</p>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 11,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"continer home-text\">
  <h5 class=\"text-center h5-home\">Description</h5>
  <p>This is a converter script created with Symfony 4 that allows you to add/manage different currencies, their exchange rates, etc. in one interface.
    The currencies are calculated based on their 'buy' rate relative to UAH.</p>
  <p>The currencies available in the script are defined in the <span class=\"variable\">CURRENCIES</span> variable (the currencies' names must be separated by commas) in the .env file in the root of the application.</p>
  <p>It's not neccessary to define new currencies in the .env file manually. You can let this script add them for you by simply submitting the new ones via the 'Settings' menu (it will regenerate the .env file based on the input - provided that the input is valid).</p>
  <p>The rates on pages of different methods are updated every 5 seconds via Ajax, so there is no need to refresh to see the new currency added or the old value updated - you can just wait for several seconds.</p>
  <h5 class=\"text-center\">Local File</h5>
  <p>The local file source is using the values defined in the .env file as exchange rates for the currencies. So, for example, if you have <span class=\"variable\">CURRENCIES</span> set to <span class=\"variable\">USD,EUR</span>, you'll need to define <span class=\"variable\">USD</span> and <span class=\"variable\">EUR</span> variables as well. Otherwise, the FileHelper class will throw an exception. The 'Settings' menu allows you to define the values for new currencies as well.</p>
  <h5 class=\"text-center\">External API</h5>
  <p>This method fetches the currency exchange rates from API. By default, it uses a PrivatBank API for this. The API is defined in <span class=\"variable\">API_LINK</span> variable in the .env file. Currently, the API link is {{ API_LINK }}.</p>
  <h5 class=\"text-center\">Random</h5>
  <p class=\"mb-4\">This type randomizes the exchange rates for the currencies set in <span class=\"variable\">CURRENCIES</span> variable in the .env file. The random values for the currencies are stored in cookies with expiration set to 15 seconds. After the cookie expires, the new values are randomly generated.</p>
</div>
", "home.html.twig", "C:\\xampp\\htdocs\\converter\\templates\\home.html.twig");
    }
}
