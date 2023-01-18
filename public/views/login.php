<!DOCTYPE html>
<html lang="pl">

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>LOGIN PAGE</title>
</head>

<body>
    <div class="container">
        <div class="left-side">
            <a href="/">
                <div class="logo-nav">
                    <img src="public/img/logo.svg" alt="logo">
                </div>
            </a>
        </div>
        <div class="right-side">
            <form class="login-form" action="login" method="POST">
                <p class="log-in-p">Zaloguj się</p>
                <div class="message">
                    <?php if (isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <div class="input-with-title">
                    <p class="upper-label">Login</p>
                    <input class="log-in-input" name="email" type="text" placeholder="email@email.com">
                </div>
                <div class="input-with-title">
                    <p class="upper-label">Hasło</p>
                    <input class="log-in-input" name="password" type="password" placeholder="password">
                </div>
                <button class="log-in-button" type="submit">Zaloguj się</button>
                <div class="register-with-link">
                    <p>Nie masz konta?</p>
                    <a href="">Zarejestruj sie</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>