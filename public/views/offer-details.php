<!DOCTYPE html>
<html lang="pl">

<head>
    <title>offer-DETAILS</title>
    <link rel="stylesheet" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/ebcb7e8a33.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-main-page">
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
        <div class="about-house-container">
            <div class="about-house">
                <div class="about-house-img-container">
                <img src="public/uploads/<? print_r($offer->getImage()); ?>" alt="house-img">
                </div>
                <div>
                    <div>
                        <h1>
                            <?php
                                print_r($offer->getTitle());
                            ?>
                        </h1>
                        <p><b>Lokalizacja:</b> <?print_r($offer->getLocalization())?></p>
                    </div>
                    <p><?print_r($offer->getOfferDescription())?></p>
                    <form action="" method="POST">
                    <button class="medium-color-button" type="submit" name="submit">Wybierz</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="details-with-title-container">
            <div class="details-with-title">
                <p><b>Dostępność</b></p>
                <div class="availability">
                    <div>
                        <i class="fa-regular fa-calendar"></i>
                        <p><?print_r($offer->getAvailableFrom())?> — <?print_r($offer->getAvailableTo())?></p>
                    </div>
                    <div>
                        <?
                        if ($offer->getAnimals()) {
                            echo "<i class='fa-solid fa-paw'></i>";
                        }
                        if ($offer->getPlants()) {
                            echo "<i class='fa-solid fa-seedling'></i>";
                        }
                        if ($offer->getCleaning()) {
                            echo "<i class='fa-solid fa-broom'></i>";
                        }
                        if ($offer->getHouseCare()) {
                            echo "<i class='fa-solid fa-house-chimney-user'></i>";
                        }
                        ?>
                    </div>
                    <div>
                        <i class="fa-solid fa-user"></i>
                        <p>7 osób</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="details-with-title-container">
            <div class="details-with-title">
                <p><b>Wymagania</b></p>
                <div class="requirements">
                    <div>
                        <?
                        if ($offer->getAnimals()) {
                            echo "<i class='fa-solid fa-paw' style='color:green;'></i>";
                        }
                        if ($offer->getPlants()) {
                            echo "<i class='fa-solid fa-seedling' style='color:green;'></i>";
                        }
                        if ($offer->getCleaning()) {
                            echo "<i class='fa-solid fa-broom' style='color:green;'></i>";
                        }
                        if ($offer->getHouseCare()) {
                            echo "<i class='fa-solid fa-house-chimney-user' style='color:green;'></i>";
                        }
                        ?>
                    </div>
                    <div>
                        <p><?print_r($offer->getRequirementsDescription())?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>