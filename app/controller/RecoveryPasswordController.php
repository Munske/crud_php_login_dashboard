<?php

    class RecoveryPasswordController{

        public function index(){

            //Utilizando a dependência Twig para renderizar o template com parâmetros mais facilmente caso houver...
            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader, [
                'cache' => 'path/to/compilation_cache',
                'auto_reload' => true ]);
            $template = $twig->load('recoveryPassword.html');
                $parameters['msg'] = $_SESSION['msg_warning'] ?? null;

            return $template->render($parameters);
        }

        public function check(){
            try{
                $user = new UserDao;
                $user->setEmail($_POST['email']);
                $user->sendRecoveryEmail();
                header('Location: http://localhost/my/crud_php_login_dashboard/recoveryPassword');
            
            } catch (\Exception $e) {
                $_SESSION['msg_warning'] = array('msg' => $e->getMessage(), 'count' => 0);
                header('Location: http://localhost/my/crud_php_login_dashboard/recoveryPassword');
            }
        }

    }