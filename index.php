<?php
$pageTitle = "Startseite";
include 'php/header.php';
?>

<main>
    <!-- Banner -->
    <div id="hero-banner">
        <div class="hero-buttons">
            <button id="join-button">
                <span class="btn-icon">👤</span>
                <span class="btn-gap"></span>
                <span class="btn-label">Mitglied werden</span>
            </button>
            <button id="donate-button">
                <span class="btn-icon">💶</span>
                <span class="btn-gap"></span>
                <span class="btn-label">Jetzt spenden</span>
            </button>
    </div>
        <img src="assets/logo/logo4.png" alt="B7 Logo" id="hero-banner-logo">
        <div id="hero-sub-banner-1">
            <p>Die Zeche</p>
        </div>
        <div id="hero-sub-banner-2">
            <p>zum Mitmachen</p>
        </div>
    </div>

    <div class=content-container>
    <section id="teaser">
        <div id="teaser-box1" class="teaser-box">
            <a href="#">
                <div class="teaser-box-content">Teaser 1</div>
            </a>
        </div>
        <div id="teaser-box2" class="teaser-box">
            <a href="#">
                <div class="teaser-box-content">Teaser 2</div>
            </a>
        </div>
        <div id="teaser-box3" class="teaser-box">
            <a href="#">
                <div class="teaser-box-content">Teaser 3</div>
            </a>
        </div>
        <div id="teaser-box4" class="teaser-box">
            <a href="#">
                <div class="teaser-box-content">Teaser 4</div>
            </a>
        </div>
        <div id="teaser-box5" class="teaser-box">
            <a href="#">
                <div class="teaser-box-content">Teaser 5</div>
            </a>
        </div>
        <div id="teaser-box6" class="teaser-box">
            <a href="#">
                <div class="teaser-box-content">Teaser 6</div>
            </a>
        </div>
    </section>
    </div>
    
</main>


<?php include 'php/footer.php'; ?>
