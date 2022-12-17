<!DOCTYPE html>
<html lang="pl">

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/ebcb7e8a33.js" crossorigin="anonymous"></script>
    <title>ADD offer</title>
</head>

<body>
    <div class="container-main-page">
        <header>
            <nav>
                <div class="logo-nav">
                    <img src="public/img/logo.svg" alt="logo">
                </div>
                <div class="nav-links">
                    <a href="offers">offery</a>
                    <a href="addOffer">dodaj ogłoszenie</a>
                    <a href="login">zaloguj</a>
                </div>
            </nav>
        </header>
        <div class="form-container">
            <h1>Dodaj ogłoszenie</h1>
            <div class="message">
                <?php if (isset($messages)) {
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <form class="offer-form" action="addOffer" method="POST" ENCTYPE="multipart/form-data">
                <div>
                    <p>Tytuł ogłoszenia</p>
                    <input name="title" type="text" placeholder="wpisz"></input>
                </div>
                <div>
                    <p>Lokalizacja</p>
                    <input name="localization" type="text" placeholder="wpisz"></input>
                </div>
                <div>
                    <p>Opieka nad</p>
                    <div class="requirements-add">
                        <div>
                            <i class="fa-solid fa-paw"></i>
                            <input type="checkbox" name="animals" value="tak">
                        </div>
                        <div>
                            <i class="fa-solid fa-seedling"></i>
                            <input type="checkbox" name="plants" value="tak">
                        </div>
                        <div>
                            <i class="fa-solid fa-broom"></i>
                            <input type="checkbox" name="cleaning" value="tak">
                        </div>
                        <div>
                            <i class="fa-solid fa-house-chimney-user"></i>
                            <input type="checkbox" name="houseCare" value="tak">
                        </div>
                    </div>
                </div>
                <div>
                    <p>Lokalizacja</p>
                    <div class="available">
                        <p>od</p>
                        <input name="availableFrom" type="text" placeholder="wpisz"></input>
                        <p>do</p>
                        <input name="availableTo" type="text" placeholder="wpisz"></input>
                    </div>
                </div>
                <div class="description">
                    <p>Opis</p>
                    <textarea name="offerDescription" rows="5" placeholder="opis"></textarea>
                </div>
                <div>
                    <p>Dodaj zdjecia</p>
                    <div class="addImgBox"></div>
                    <input name="file" type="file" placeholder="dodaj zdjecie"></input>
                </div>
                <button class="medium-color-button" type="submit">Dodaj</button>
            </form>
        </div>
    </div>
</body>

</html>