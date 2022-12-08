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

/* login.html */
class __TwigTemplate_5354864827107a33266c019755903cbbb82ff934d3bcc1be1e79847dab085fd6 extends Template
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
    <link rel=\"stylesheet\" href=\"http://localhost/my/crud_php_login_dashboard/assets/css/login.css\">
    <title>Login</title>
</head>

<body>
    <main>
        <div id=\"form_login\">
            <div>
                <h2>Login</h2>
            </div>
            <form action=\"http://localhost/my/crud_php_login_dashboard/login/check\" method=\"post\">
                <section>
                    <label for=\"email\" >Email:</label>
                    <section id=\"inputEmail\">
                        <input required type=\"email\" id=\"email\" name=\"email\" placeholder=\"Digite seu email aqui\">
                    </section>
                    <label for=\"password\">Senha:</label>
                    <section id=\"inputPassword\">
                        <input required type=\"password\" id=\"password\" name=\"password\" placeholder=\"Digite sua senha aqui\">
                        <i id=\"eyePassword\" onclick=\"eyeClick()\" class=\"fa fa-eye\" aria-hidden=\"true\"></i>
                    </section>
                    <a href=\"http://localhost/my/crud_php_login_dashboard/recoveryPassword\">Esqueceu sua senha?</a>
                </section>
                <aside id=\"msg_aviso\">
                    ";
        // line 36
        if ((($context["msg"] ?? null) != "")) {
            // line 37
            echo "                        <h3>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["msg"] ?? null), "msg", [], "any", false, false, false, 37), "html", null, true);
            echo " <i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i></h3>
                    ";
        }
        // line 39
        echo "                </aside>
                <section id=\"section_btns\">
                    <a href=\"http://localhost/my/crud_php_login_dashboard/registerUser\" id=\"btn_cadastrar\">Cadastrar-se</a>
                    <button id=\"btn_logar\">Logar</button>
                </section>
            </form>
        </div>
    </main>
    <script src=\"http://localhost/my/crud_php_login_dashboard/assets/js/login.js\"></script>
</body>

</html>";
    }

    public function getTemplateName()
    {
        return "login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 39,  76 => 37,  74 => 36,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "login.html", "C:\\xampp\\htdocs\\my\\crud_php_login_dashboard\\app\\view\\login.html");
    }
}
