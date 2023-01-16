<!DOCTYPE html>
<html lang="pl">

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>REGISTER PAGE</title>
</head>

<body>
    <div class="container">
        <div class="left-side">
            <div class="logo">
                <img src="public/img/logo.svg" alt="logo">
            </div>
        </div>
        <div class="right-side">
            <form class="login-form" action="register" method="POST">
                <p class="log-in-p">Zarejestruj się</p>
                <div class="message">
                    <?php if (isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <div class="input-with-title">
                    <p class="upper-label">Imie</p>
                    <input class="log-in-input" name="name" type="text">
                </div>
                <div class="input-with-title">
                    <p class="upper-label">Nazwisko</p>
                    <input class="log-in-input" name="surname" type="text">
                </div>
                <div class="input-with-title">
                    <p class="upper-label">Login</p>
                    <input class="log-in-input" name="email" type="text" placeholder="email@email.com">
                </div>
                <div class="input-with-title">
                    <p class="upper-label">Hasło</p>
                    <input class="log-in-input" name="password" type="password">
                </div>
                <div class="input-with-title">
                    <p class="upper-label">Potwierdz haslo</p>
                    <input class="log-in-input" name="confirmedPassword" type="password">
                </div>
                <button class="log-in-button" type="submit">Zarejestruj się</button>
            </form>
        </div>
    </div>
</body>

</html>