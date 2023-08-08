<?php
    $dbtype = 'mysql';
    $dbname = 'projeto-frontend';
    $user = 'root';
    $servername = 'localhost';
    $password = '';
    $options = [
        PDO::ATTR_PERSISTENT => TRUE,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
    ];

    $pdoConnection = $dbtype . ':host=' . $servername . ';dbname=' . $dbname;

    if(isset($_POST['submit'])) {
        try {
            $conn = new PDO($pdoConnection, $user, $password, $options);
        } catch(PDOException $e) {
            echo 'Conexão falhou!' . $e->getMessage();
        }

        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phonenumber = $_POST['phonenumber'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        $username = $_POST['username'];

        if(!preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,36}$/', $pass1) && $pass1 !== $pass2) {
            die('
                Ambas as senhas devem ser iguais;
                A senha deve conter pelo menos 8 caracteres e no máximo 36;
                A senha deve conter pelo menos uma letra maiúscula e uma letra minúscula;
                A senha deve conter pelo menos um número;
                A senha deve conter pelo menos um símbolo.
            ');
        }

        $sql = "
            INSERT INTO
                `profiles`(`name`,`email`,`address`,`phonenumber`,`password`,`username`)
            VALUES
                ('$name','$email','$address','$phonenumber','$pass1','$username')
        ";

        $verify = "
            SELECT
                (`email`,`username`)
            FROM
                `profiles`
            WHERE
                `email`='$email' AND `username`='$username'
        ";

        $verifyQuery = $conn->prepare($verify);

        $executeVerify = $conn->query($verifyQuery);

        if($executeVerify) {
            die('Insira um email ou nome de usuário diferente.');
        }

        $query = $conn->prepare($sql);

        $execute = $conn->query($query);

        if($execute) {
            echo('Dados salvos com sucesso!');
        } else {
            die('Erro ao salvar.');
        }
    }
?>