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
            <div class="burger-menu" onclick="toggleMenu()">
                <div></div>
                <div></div>
                <div></div>
            </div>

            <nav class="menu" id="mainMenu">
                <ul class="menu-list">
                    <li><a href="#">Start</a></li>
                    <li><a href="#">Über uns</a></li>
                    <li><a href="#">Partner</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Kontakt</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <?php include $viewFile; ?>
    <!-- <div class="color-band" id="footer-color-band" style="background-color: var(--technikblau);"></div>
        <footer id="main-footer">
            <div class="container">
                <div id="footer-links">
                    <ul>
                        <li><a href="kontakt.php">Kontakt</a></li>
                        <li><a href="datenschutz.php">Datenschutz</a></li>
                        <li><a href="impressum.php">Impressum</a></li>
                        <li>
                            <a href="https://facebook.com" target="_blank">
                                <img src="public/img/icon/facebook-icon_800x800.svg" alt="Facebook">
                            </a>
                        </li>
                        <li>
                            <a href="https://instagram.com" target="_blank">
                                <img src="public/img/icon/instagram-icon_800x800.svg" alt="Instagram">
                        </a>
                        </li>
                    </ul>
                </div>
                <div id="footer-copyright">
                    <p>&copy; 2025 Blumenthal 7 e.V. Alle Rechte vorbehalten.</p>
                </div>
            </div>
        </footer>
    </div> -->

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
                            <img src="public/img/icon/facebook-icon_800x800.svg" alt="Facebook">
                        </a>
                    </li>
                    <li>
                        <a href="https://instagram.com" target="_blank">
                            <img src="public/img/icon/instagram-icon_800x800.svg" alt="Instagram">
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
    <script>
    function toggleMenu() {
        const menu = document.getElementById('mainMenu');
        menu.classList.toggle('open');
        document.querySelectorAll('.has-submenu').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                this.classList.toggle('open');
            });
        });
    }
    </script>
</body>
</html>
