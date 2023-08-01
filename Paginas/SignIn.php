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
                    <div class="div-main title">
                        <h1>Faça aqui seu cadastro</h1>
                    </div>
                    <div class="div-main form">
                        <form action="" method="POST" class="form-main">
                            <label class="label" for="name">Insira seu nome completo:</label><br>
                            <input class="input" type="text" id="name" name="name"><br><br>
                            <label class="label" for="email">Insira seu e-mail:</label><br>
                            <input class="input" type="email" id="email" name="email"><br><br>
                            <label class="label" for="address">Insira seu endereço:</label><br>
                            <input class="input" type="address" id="address" name="address"><br><br>
                            <label class="label" for="number">Insira seu número de telefone:</label><br>
                            <input class="input" type="tel" id="number" name="phonenumber"><br>
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
</body>
</html>