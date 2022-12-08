<?php

session_start();

    require_once "vendor/autoload.php";

    require_once "app/core/Core.php";
    require_once "app/controller/LoginController.php";
    require_once "app/model/UserDao.php";
    require_once "lib/Database/Connection.php";
    require_once "app/controller/DashboardController.php";
    require_once "app/controller/RegisterUserController.php";
    require_once "app/controller/RecoveryPasswordController.php";
    require_once "lib/Email/Email.php";

$core = new Core;
echo $core->start($_GET);
