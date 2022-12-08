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

/* recoveryPassword.html */
class __TwigTemplate_1405d35e6fb1335153ab2c876c5516857acae2a92a4edadb889cc81302bf30a4 extends Template
{
    private $source;
    private $macros = [];

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
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"pt-br\">

<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <link rel=\"icon\" type=\"image/jpg\" href=\"assets/img/icon.ico\"/>
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css\"
        integrity=\"sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"http://localhost/my/crud_php_login_dashboard/assets/css/reset.css\">
    <link rel=\"stylesheet\" href=\"http://localhost/my/crud_php_login_dashboard/assets/css/recoveryPassword.css\">
    <title>Recuperar Senha</title>
</head>

<body>
    <main>
        <div id=\"form_recovery\">
            <div>
                <h2>Recuperar Senha</h2>
            </div>
            <form action=\"http://localhost/my/crud_php_login_dashboard/recoveryPassword/check\" method=\"post\">
                <section>
                    <label for=\"email\" >Email:</label>
                    <input required type=\"email\" id=\"email\" name=\"email\" placeholder=\"Digite seu email aqui\">
                </section>
                <aside id=\"msg_aviso\">
                    ";
        // line 28
        if ((($context["msg"] ?? null) != "")) {
            // line 29
            echo "                        <h3>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["msg"] ?? null), "msg", [], "any", false, false, false, 29), "html", null, true);
            echo " <i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i></h3>
                    ";
        }
        // line 31
        echo "                </aside>
                <section id=\"section_btns\">
                    <a href=\"http://localhost/my/crud_php_login_dashboard/\" id=\"btn_voltar_login\">Voltar ao Login</a>
                    <button onclick=\"loadingSendEmail()\" id=\"btn_enviar_email\">Enviar email</button>
                </section>
            </form>
        </div>
    </main>
    <script src=\"http://localhost/my/crud_php_login_dashboard/assets/js/recoveryPassword.js\"></script>
</body>

</html>";
    }

    public function getTemplateName()
    {
        return "recoveryPassword.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 31,  68 => 29,  66 => 28,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "recoveryPassword.html", "C:\\xampp\\htdocs\\my\\crud_php_login_dashboard\\app\\view\\recoveryPassword.html");
    }
}
