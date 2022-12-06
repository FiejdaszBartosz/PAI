<!DOCTYPE html>
<html lang="pl">

<head>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/offerts.css">
    <script src="https://kit.fontawesome.com/ebcb7e8a33.js" crossorigin="anonymous"></script>
    <title>offertS</title>
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
        <section class="offerts-grid">
            <div id="single-offert1">
                <img src="public/img/offerts.jpg" alt="img">
                <div>
                    <h1>Some title</h1>
                    <div class="single-offert-activities">
                        <i class="fa-solid fa-paw"></i>
                        <i class="fa-solid fa-seedling"></i>
                        <i class="fa-solid fa-broom"></i>
                        <i class="fa-regular fa-house-chimney-user"></i>
                    </div>
                </div>
            </div>
            <div id="single-offert2">
                <img src="public/img/offerts.jpg" alt="img">
                <div>
                    <h1>Some title</h1>
                    <div class="single-offert-activities">
                        <i class="fa-solid fa-paw"></i>
                        <i class="fa-solid fa-seedling"></i>
                        <i class="fa-solid fa-broom"></i>
                        <i class="fa-regular fa-house-chimney-user"></i>
                    </div>
                </div>
            </div>
            <div id="single-offert3">
                <img src="public/img/offerts.jpg" alt="img">
                <div>
                    <h1>Some title</h1>
                    <div class="single-offert-activities">
                        <i class="fa-solid fa-paw"></i>
                        <i class="fa-solid fa-seedling"></i>
                        <i class="fa-solid fa-broom"></i>
                        <i class="fa-regular fa-house-chimney-user"></i>
                    </div>
                </div>
            </div>
            <div id="single-offert4">
                <img src="public/img/offerts.jpg" alt="img">
                <div>
                    <h1>Some title</h1>
                    <div class="single-offert-activities">
                        <i class="fa-solid fa-paw"></i>
                        <i class="fa-solid fa-seedling"></i>
                        <i class="fa-solid fa-broom"></i>
                        <i class="fa-regular fa-house-chimney-user"></i>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>