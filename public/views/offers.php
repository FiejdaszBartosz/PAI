<!DOCTYPE html>
<html lang="pl">

<head>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/offers.css">
    <script src="https://kit.fontawesome.com/ebcb7e8a33.js" crossorigin="anonymous"></script>
    <title>offers</title>
</head>

<body>
<div class="container-main-page">
    <nav>
        <div class="logo-nav">
            <img src="public/img/logo.svg" alt="logo">
        </div>
        <div class="nav-links">
            <a href="offers">oferty</a>
            <a href="addOffer">dodaj ogłoszenie</a>
            <?php
            if(!isset($_COOKIE['user_name'])) {
                echo "<a href='login'>zaloguj</a>";
            }
            ?>
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
    <section class="offers">
        <?php foreach ($offers as $singleOffer): ?>
            <div id="singleOffer">
                <?
                $url = 'offerDetails?id='.$singleOffer->getOfferId();
                echo "<a href='$url'>"
                ?>
                    <div class="img-container">
                        <img src="public/uploads/<? print_r($singleOffer->getImage()); ?>" alt="img">
                    </div>
                    <div>
                        <h1><? print_r($singleOffer->getTitle()); ?></h1>
                        <div class="singleOfferActivities">
                            <?
                            if ($singleOffer->getAnimals()) {
                                echo "<i class='fa-solid fa-paw' style='color:green;'></i>";
                            } else {
                                echo "<i class='fa-solid fa-paw'></i>";
                            }

                            if ($singleOffer->getPlants()) {
                                echo "<i class='fa-solid fa-seedling' style='color:green;'></i>";
                            } else {
                                echo "<i class='fa-solid fa-seedling'></i>";
                            }

                            if ($singleOffer->getCleaning()) {
                                echo "<i class='fa-solid fa-broom' style='color:green;'></i>";
                            } else {
                                echo "<i class='fa-solid fa-broom'></i>";
                            }

                            if ($singleOffer->getHouseCare()) {
                                echo "<i class='fa-solid fa-house-chimney-user' style='color:green;'></i>";
                            } else {
                                echo "<i class='fa-solid fa-house-chimney-user'></i>";
                            }
                            ?>
                        </div>
                    </div>
                </a>
            </div>

        <?php endforeach; ?>
    </section>
</div>
</body>

</html>