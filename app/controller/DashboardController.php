<?php

    class DashboardController{
    
        public function index(){
            echo 'Logado com sucesso <a href="http://localhost/my/crud_php_login_dashboard/dashboard/logout">Fazer Logout</a>';
        }

        public function logout(){
            unset($_SESSION['usr']);
            session_destroy();
            header('Location: http://localhost/my/crud_php_login_dashboard');
        }
    }