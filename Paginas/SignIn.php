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
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="SignIn.css">
</head>
<body>
    <nav class="nav">
        <section class="section section-nav">
            <div class="div-nav">
                <form action="" method="GET" class="form-nav">
                    <select name="colorblind" id="colorblind" class="select">
                        <option value="Nenhum" id="none">Nenhum</option>
                        <option value="Deuteranopia" id="deuteranopia">Deuteranopia</option>
                        <option value="Protanopia" id="protanopia">Protanopia</option>
                        <option value="Tritanopia" id="tritanopia">Tritanopia</option>
                        <option value="Protanomalia" id="protanomalia">Protanomalia</option>
                        <option value="Deuteranomalia" id="deuteranomalia">Deuteranomalia</option>
                        <option value="Tritanomalia" id="tritanomalia">Tritanomalia</option>
                        <option value="Acromatomalia" id="acromatomalia">Acromatomalia</option>
                        <option value="Acromatopsia" id="acromatopsia">Acromatopsia</option>
                    </select>
                </form>
            </div>
            <div class="div-nav">
                <div class="div-list">
                    <ul class="nav-list">
                        <a href="index.php">   
                            <div class="div-card">
                                <li class="list-element">Início</li>
                            </div>
                        </a>
                        <a href="SignIn.php">
                            <div class="div-card">
                                <li class="list-element">Sign in</li>
                            </div>
                        </a>
                        <a href="LogIn.php">
                            <div class="div-card">
                                <li class="list-element">Log in</li>
                            </div>
                        </a>
                    </ul>
                </div>
            </div>
        </section>
    </nav>
    <main class="main">
        <section class="saction section-main">
            <div class="div-empty">

            </div>
            <div class="div-main">
                <div class="div-card-main">
                    <div class="title">
                        <h1>Faça aqui seu cadastro:</h1>
                    </div>
                    <div class="form">
                        <form action="" method="POST" class="form-main" onsubmit="passwordValidate(pass1, pass2, validate)">
                            <label class="label" for="name">Insira seu nome completo:</label><br>
                            <input class="input" type="text" id="name" name="name"><br><br>
                            <label class="label" for="email">Insira seu e-mail:</label><br>
                            <input class="input" type="email" id="email" name="email"><br><br>
                            <label class="label" for="address">Insira seu endereço:</label><br>
                            <input class="input" type="address" id="address" name="address"><br><br>
                            <label class="label" for="number">Insira seu número de telefone:</label><br>
                            <input class="input" type="tel" id="number" name="phonenumber"><br><br>
                            <label class="label" for="pass1">Insira sua senha:</label><br>
                            <input class="input" type="password" id="pass1" name="pass1"><br><br>
                            <label class="label" for="pass2">Confirme sua senha:</label><br>
                            <input class="input" type="password" id="pass2" name="pass2"><br><br>
                            <label class="label" for="username">Insira seu nome de usuário:</label><br>
                            <input class="input" type="text" id="username" name="username"><br><br>
                            <input class="submit" type="submit">
                        </form>
                    </div>
                </div>
            </div>
            <div class="div-empty">

            </div>
        </section>
    </main>
    <script>
        let pass1 = document.getElementById('pass1');
        let pass2 = document.getElementById('pass2');

        let validate = pattern(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,36}$/, pass1)

        function passwordValidate(pass1, pass2, validate) {
            if(!validate && pass1 !== pass2) {
                document.write('Ambas as senhas devem ser iguais; A senha deve conter pelo menos 8 caracteres e no máximo 36; A senha deve conter pelo menos uma letra maiúscula e uma letra minúscula; A senha deve conter pelo menos um número; A senha deve conter pelo menos um símbolo.');
            }
        }
    </script>
</body>
</html>