<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'B7 Website'; ?></title>
    <link rel="stylesheet" href="/public/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>
    <header id="main-header">
        <div id="sponsors">
            <p>Gefördert durch</p>
            <div class="sponsor-logos">
                <img src="/public/img/sponsor/sponsor1.png" alt="Sponsor 1">
                <img src="/public/img/sponsor/sponsor2.png" alt="Sponsor 2">
                <img src="/public/img/sponsor/sponsor3.png" alt="Sponsor 3">
                <img src="/public/img/sponsor/sponsor4.png" alt="Sponsor 4">
                <img src="/public/img/sponsor/sponsor5.png" alt="Sponsor 5">
            </div>
        </div>

        <div id="menu-container">
            <div class="burger-menu">
                <div></div>
                <div></div>
                <div></div>
            </div>

            <div class="menu-color-band"></div>
            
            <nav class="menu" id="mainMenu">
                <ul class="menu-list">
                    <li><a href="/">Home</a></li>
                    <li><a href="/projekt-erkunden">Das Projekt</a>
                        <ul class="sub-menu">
                            <li><a href="/mitglied-werden">Die Vision</a></li>
                            <li><a href="/mitglied-werden">Offene Bürgerwerkstatt</a></li>
                            <li><a href="/mitglied-werden">Co-Working Space</a></li>
                             <li><a href="/mitglied-werden">Veranstaltungen</a></li>
                        </ul>
                    </li>
                    <li><a href="/projekt-erkungen">Unterstützung</a>
                        <ul class="sub-menu">
                            <li><a href="/mitglied-werden">Mitglied werden</a></li>
                            <li><a href="/spenden">Spenden</a></li>
                        </ul>
                    </li>

                    <li><a href="/kontakt">Kontakt</a></li>
                    <li><a href="/impressum">Impressum</a></li>
                    <li><a href="/datenschutz">Datenschutz</a></li>
                </ul>
            </nav>
        </div>
        <div class="banner-buttons">
            <a href="/unterstuetzung#mitglied-werden" id="join-button" class="banner-button">
                <span class="banner-btn-icon">
                    <img class="banner-btn-icon" src="/public/img/icon/schlaegel-und-eisen_icon.png" alt="schlaegel-und-eisen_icon">                
                </span>
                <span class="banner-btn-gap"></span>
                <span class="banner-btn-label">Mitglied werden</span>
            </a>
            <a href="/unterstuetzung#spenden" id="donate-button" class="banner-button">
                <span class="banner-btn-icon">
                    <img class="banner-btn-icon" src="/public/img/icon/heart_icon.png" alt="heart_icon">                
                </span>               
                <span class="banner-btn-gap"></span>
                <span class="banner-btn-label">Jetzt spenden</span>
            </a>
        </div>
    </header>
    
    <?php include $viewFile; ?>
    
    <footer id="main-footer">
        <div class="color-band" id="footer-color-band" style="background-color: var(--technikblau);">
            <div class="container">
                <div id="footer-links">
                    <ul>
                        <li><a href="/kontakt">Kontakt</a></li>
                        <li><a href="/datenschutz">Datenschutz</a></li>
                        <li><a href="/impressum">Impressum</a></li>
                        <li>
                            <a href="https://facebook.com" target="_blank">
                                <img src="/public/img/icon/facebook-icon_800x800.svg" alt="Facebook">
                            </a>
                        </li>
                        <li>
                            <a href="https://instagram.com" target="_blank">
                                <img src="/public/img/icon/instagram-icon_800x800.svg" alt="Instagram">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>    
        <div id="footer-copyright">
            <p>&copy; 2025 Blumenthal 7 e.V. Alle Rechte vorbehalten.</p>
        </div>
    </footer>
    <script src="/public/libs/jquery.js"></script>
    <script src="/public/libs/gsap/gsap.min.js"></script>
    <script src="/public/js/main.js"></script>
</body>
</html>
