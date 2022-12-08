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

/* registerUser.html */
class __TwigTemplate_f8d7a9c597c3ab22785353f963f990376b7f9992b3658b7d2442b919d3633300 extends Template
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
    <link rel=\"stylesheet\" href=\"http://localhost/my/crud_php_login_dashboard/assets/css/registerUser.css\">
    <title>Cadastro</title>
</head>

<body>
    <main>
        <div id=\"form_cadastro\">
            <div>
                <h2>Cadastro</h2>
            </div>
            <form action=\"http://localhost/my/crud_php_login_dashboard/RegisterUser/check\" method=\"post\">
                <section>
                    <label for=\"name\" >Nome:</label>
                    <input required type=\"text\" id=\"name\" name=\"name\" placeholder=\"Digite seu nome aqui\">

                    <label for=\"email\" >Email:</label>
                    <input required type=\"email\" id=\"email\" name=\"email\" placeholder=\"Digite seu email aqui\">
                
                    <label for=\"password\">Senha:</label>
                    <input required type=\"password\" id=\"password\" name=\"password\" placeholder=\"Digite sua senha aqui\">
                    
                    <label for=\"password_comparativo\">Repetir Senha:</label>
                    <input required type=\"password\" id=\"password_comparativo\" name=\"password_comparativo\" placeholder=\"Digite sua senha novamente aqui\">
                    
                </section>
                <aside id=\"msg_aviso\">
                    ";
        // line 38
        if ((($context["msg"] ?? null) != "")) {
            // line 39
            echo "                        <h3>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["msg"] ?? null), "msg", [], "any", false, false, false, 39), "html", null, true);
            echo " <i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i></h3>
                    ";
        }
        // line 41
        echo "                </aside>
                <section id=\"section_btns\">
                    <a href=\"http://localhost/my/crud_php_login_dashboard/\" id=\"btn_voltar_login\">Logar</a>
                    <button onclick=\"loadingRegisterUser()\" id=\"btn_cadastar\">Cadastrar-se</button>
                </section>
            </form>
        </div>
    </main>
    <script src=\"http://localhost/my/crud_php_login_dashboard/assets/js/registerUser.js\"></script>
</body>

</html>";
    }

    public function getTemplateName()
    {
        return "registerUser.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 41,  78 => 39,  76 => 38,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "registerUser.html", "C:\\xampp\\htdocs\\my\\crud_php_login_dashboard\\app\\view\\registerUser.html");
    }
}
