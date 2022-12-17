<!DOCTYPE html>
<html lang="pl">

<head>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/offers.css">
    <script src="https://kit.fontawesome.com/ebcb7e8a33.js" crossorigin="anonymous"></script>
    <title>offerS</title>
</head>

<body>
    <div class="container-main-page">
        <nav>
            <div class="logo-nav">
                <img src="public/img/logo.svg" alt="logo">
            </div>
        </nav>
        <form class="filter">
            <div class="dropdown-with-title">
                <p>Lokalizacja</p>
                <input name="lokalizacja" type="text" placeholder="wpisz"></input>
            </div>
            <div class="dropdown-with-title">
                <p>Termin</p>
                <input name="termin" type="text" placeholder="wpisz"></input>
            </div>
            <div class="dropdown-with-title">
                <p>Opieka nad</p>
                <select name="opioekaNad">
                    <option value=" "></option>
                </select>
            </div>
        </form>
        <section class="offers-grid">
            <div id="single-offer1">
                <img src="public/img/offer.jpg" alt="img">
                <div>
                    <h1>Some title</h1>
                    <div class="single-offer-activities">
                        <i class="fa-solid fa-paw"></i>
                        <i class="fa-solid fa-seedling"></i>
                        <i class="fa-solid fa-broom"></i>
                        <i class="fa-solid fa-house-chimney-user"></i>
                    </div>
                </div>
            </div>
            <div id="single-offer2">
                <img src="public/uploads/<?= $offer->getImage() ?>" alt="img">
                <div>
                    <h1><?= $offer->getTitle() ?></h1>
                    <div class="single-offer-activities">
                        <i class="fa-solid fa-paw"></i>
                        <i class="fa-solid fa-seedling"></i>
                        <i class="fa-solid fa-broom"></i>
                        <i class="fa-solid fa-house-chimney-user"></i>
                    </div>
                </div>
            </div>
            <div id="single-offer3">
                <img src="public/img/offer.jpg" alt="img">
                <div>
                    <h1>Some title</h1>
                    <div class="single-offer-activities">
                        <i class="fa-solid fa-paw"></i>
                        <i class="fa-solid fa-seedling"></i>
                        <i class="fa-solid fa-broom"></i>
                        <i class="fa-solid fa-house-chimney-user"></i>
                    </div>
                </div>
            </div>
            <div id="single-offer4">
                <img src="public/img/offer.jpg" alt="img">
                <div>
                    <h1>Some title</h1>
                    <div class="single-offer-activities">
                        <i class="fa-solid fa-paw"></i>
                        <i class="fa-solid fa-seedling"></i>
                        <i class="fa-solid fa-broom"></i>
                        <i class="fa-solid fa-house-chimney-user"></i>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>