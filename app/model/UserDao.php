<?php

    class UserDao{

        private $id;
        private $name;
        private $email;
        private $password;

    public function validateLogin(){
        if($this->email == '' || $this->email == null || 
            $this->password == '' || $this->password == null){
            throw new \Exception('Preencha todos os campos');
        } else {
            try{
                $conn = Connection::getConn();
                $sql = 'SELECT * FROM users WHERE email = :email';
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':email', $this->email);
                $stmt->execute();
            } catch (\Exception $e){
                throw new \Exception('Sistema fora do ar');
            }
            if ($stmt->rowCount()) {
                $result = $stmt->fetch();
                $passwordMD5 = md5($this->password);
                if ($result['password'] === $passwordMD5) {
                    $_SESSION['usr'] = $result['id'];
                    return true;
                }
            }    
        }
        throw new \Exception('Login Inválido');
    }

    public function registerUser(){
        if($this->name == '' || $this->name == null ||
            $this->email == '' || $this->email == null || 
            $this->password == '' || $this->password == null){
            throw new \Exception('Preencha todos os campos');
        } else {
            try{
                $conn = Connection::getConn();
                $sql = "SELECT * FROM users WHERE email = :email";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':email', $this->email);
                $stmt->execute();
            }catch (\Exception $e){
                throw new \Exception('Sistema fora do ar');
            }
        }
        if ($stmt->rowCount() == 0) {
            if ($this->password === $_POST['password_comparativo']) {
                $passwordMD5 = md5($this->password);
            } else {
                throw new \Exception('As senhas não estão iguais');
            }
            try{
                $cod_confirmation_account = bin2hex(openssl_random_pseudo_bytes(4));
                $sql = "INSERT INTO users (name, email, password, cod_confirmation_account, account_confirmation) 
                VALUES (:name, :email, :passwordMD5, :cod_confirmation_account	, :account_confirmation);";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':name', $this->name);
                $stmt->bindValue(':email', $this->email);
                $stmt->bindValue(':passwordMD5', $passwordMD5);
                $stmt->bindValue(':cod_confirmation_account', $cod_confirmation_account);
                $stmt->bindValue(':account_confirmation', false);
                $stmt->execute();
            } catch (\Exception $e){
                throw new \Exception('Erro ao cadastrar novo usuário');
            }
            try{
                $LinkConfirmation = "http://localhost/my/crud_php_login_dashboard/registerUser/confirmAccount/".$cod_confirmation_account;
                $emailDest = $this->email;
                $titulo = "Confirme sua conta";
                $msgHtml = "<p>Olá! Segue abaixo o link de confimação do seu cadastro:</p>
                            <h3><a href='$LinkConfirmation'>Clique Aqui para confirmar sua conta</a></h3>
                            <p>Atenciosamente,</p>
                            <p>Sistema de Login</p>";
                $msgText = " - Atenciosamente, Sistema de Login"; // Corpo da mensagem caso o recipiente não suporte HTML
                $email = new Email();
                $email->enviarEmail($emailDest, $titulo, $msgHtml, $msgText);
                $_SESSION['msg_warning'] = array('msg' => "Resgistrado com Sucesso", 'count' => 0);
                return true;
            } catch(\Exception $e){
                throw new \Exception('Erro ao enviar Código de confirmação');
            }
        }  
    }

    public function confirmAccountUser($codConfimation){
        try{
            //Consulta se existe um |código| de verificação e se a conta não estiver |ativa|...
            $conn = Connection::getConn();
            $sql = "SELECT * FROM users WHERE 
            cod_confirmation_account = :codConfimation and 
            account_confirmation = :account_confirmation";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':codConfimation', $codConfimation);
            $stmt->bindValue(':account_confirmation', false);
            $stmt->execute();
        } catch (\Exception $e){
            throw new \Exception('Esta conta não existe');
        }
        try{
            //Ativar a conta no banco...
            $sql = "UPDATE users SET account_confirmation = :account_confirmation WHERE cod_confirmation_account = :cod_confirmation_account";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':account_confirmation', true);
            $stmt->bindValue(':cod_confirmation_account', $codConfimation);
            $stmt->execute();
        } catch (\Exception $e){
            throw new \Exception('Erro ao ativar a conta');
        }
        try{
            //Consultando o email pelo código de confirmação para informar o usuário da ativação de sua conta...
            $conn = Connection::getConn();
            $sql = "SELECT email FROM users WHERE 
            cod_confirmation_account = :codConfimation";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':codConfimation', $codConfimation);
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach($result as $values){
                $this->email = $values['email'];
            }
            //Enviar Email de confirmação da ativação da conta...
            $email = new Email;
            $LinkSite = "http://localhost/my/crud_php_login_dashboard/";
            $emailDest = $this->email;
            $titulo = "Conta Confirmada";
            $msgHtml = "<p>Olá! Sua conta foi confirmada com sucesso</p>
                        <h3><a href='$LinkSite'>Clique Aqui para acessar nosso site</a></h3>
                        <p>Atenciosamente,</p>
                        <p>Sistema de Login</p>";
            $msgText = "Olá! Sua conta foi confirmada com sucesso, 
                        clique no link para acessar nosso site http://localhost/my/crud_php_login_dashboard/ 
                        - Atenciosamente, Sistema de Login";
            $email->enviarEmail($emailDest, $titulo, $msgHtml, $msgText);
            
            $_SESSION['msg_warning'] = array('msg' => "Conta ativada com sucesso", 'count' => 0);
            
            return true;
        } catch (\Exception $e){
            throw new \Exception('Erro ao confirmar a conta');
        }
    }

    public function sendRecoveryEmail(){
        if($this->email == '' || $this->email == null){
            throw new \Exception('Preencha o campo acima');
        } else {
            try{
                $conn = Connection::getConn();
                $sql = "SELECT * FROM users WHERE email = :email";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':email', $this->email);
                $stmt->execute();
            }catch (\Exception $e){
                throw new \Exception('Sistema fora do ar');
            }
        }
        if ($stmt->rowCount()) {
            $newPassword = bin2hex(openssl_random_pseudo_bytes(4));
            $passwordMD5 = md5($newPassword);
            $sql = "UPDATE users SET password = '$passwordMD5' WHERE email = '$this->email'";
            $stmt = $conn->prepare($sql);
            if ($stmt->execute() === true) {
                try{
                    //Executar o email
                    $emailDest = $this->email;
                    $titulo = "Nova senha para o Sistema de Login";
                    $msgHtml = "<p>Olá! Segue a nova senha para você utilizar o nosso site:</p>
                                <h3>$newPassword</h3>
                                <p>Atenciosamente,</p>
                                <p>Sistema de Login</p>";
                    $msgText = "Olá! Segue a nova senha para você utilizar o nosso site: $newPassword 
                                - Atenciosamente, Sistema de Login"; // Corpo da mensagem caso o recipiente não suporte HTML
                    $email = new Email();
                    $email->enviarEmail($emailDest, $titulo, $msgHtml, $msgText);
                    $_SESSION['msg_warning'] = array('msg' => "Email enviado com Sucesso", 'count' => 0);
                    return true;
                } catch(\Exception $e){
                    throw new \Exception('Erro ao enviar email');
                }
            }
        }
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getConfirmPassword()
    {
        return $this->confirm_password;
    }
    public function setConfirmPassword($confirm_password)
    {
        $this->confirm_password = $confirm_password;
    }
}
