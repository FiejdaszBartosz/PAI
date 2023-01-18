<!DOCTYPE html>
<html lang="pl">

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="./public/js/logOut.js" defer></script>
    <title>MAIN PAGE</title>
</head>

<body>
<script>

</script>
<div class="container-main-page">
    <header>
        <nav>
            <a href="/">
                <div class="logo-nav">
                    <img src="public/img/logo.svg" alt="logo">
                </div>
            </a>
            <div class="nav-links">
                <a href="offers">oferty</a>
                <a href="addOffer">dodaj ogłoszenie</a>
                <?php
                if (!isset($_COOKIE['user_name'])) {
                    echo "<a href='login'>zaloguj</a>";
                }
                ?>
                <?php
                if (isset($_COOKIE['user_name'])) {
                    echo "<a href='' onClick='deleteAllCookies()'>wyloguj</a>";
                }
                ?>
            </div>
        </nav>
        <div class="basic-info-background">
            <section class="basic-info">
                <h1>Spędz z nami wspaniałe wakacje w zamian za opiekę nad domem</h1>
                <p>Zwiedzaj świat opiekując się domami, pupilami czy też roślinami nieobecnych właścicieli. Połącz
                    dobry uczynek z chwilami przyjemności i to wszytsko za damo!</p>
                <button class="medium-color-button">Dowiedz się więcej</button>
            </section>
        </div>
    </header>
    <section id="how-it-works" class="how-it-works">
        <h1>Jak to działa?</h1>
        <div class="how-it-works-container">
            <div class="user-types">
                <h2>Wystawiający</h2>
                <img src="public/img/Rectangle 32.png" alt="wystawiający">
                <p>Jedziesz na jakiś wyjazd i martwisz się kto zajmie się twoim domem? Kto wyprowadzi towjego psa? A
                    może nie wiesz kto zadba o twoje roślinki? Użyj Homly! Wystaw swój dom, określ co jest do
                    zrobenia i w jakim terminie i gotowe.</p>
                <button class="small-button">Załóż konto</button>
            </div>
            <div class="user-types">
                <h2>Szukający</h2>
                <img src="public/img/Rectangle 33.png" alt="szukający">
                <p>Chciałbyś gdzieś wyjechać ale masz ograniczony budżet? Trafiłeś we właściwe miejsce! Homly pomoże
                    ci znaleźć miejsce wzamian za jedynie wykonywanie prostych domowych czynności. Połącz wypoczynek
                    z robieniem czegoś dobrego dla innych. </p>
                <button class="small-button">Załóż konto</button>
            </div>
        </div>
    </section>
    <section id="who-we-are" class="who-we-are">
        <h1>Kim jesteśmy?</h1>
        <p>Homly to strona która łączy ludzi którzy poszukują miejsca na wypoczynek z ludźmi którzy potrzebują
            znaleźć osobę która zajmie się ich domem podczas ich nieobecności </p>
    </section>
</div>
</body>

</html>