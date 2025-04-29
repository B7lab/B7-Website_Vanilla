<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'B7 Website'; ?></title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>

<header id="main-header">
    <div id="sponsors">
        <p>Gefördert durch</p>
        <div class="sponsor-logos">
            <img src="assets/img/sponsor1.png" alt="Sponsor 1">
            <img src="assets/img/sponsor2.png" alt="Sponsor 2">
            <img src="assets/img/sponsor3.png" alt="Sponsor 3">
            <img src="assets/img/sponsor4.png" alt="Sponsor 4">
            <img src="assets/img/sponsor5.png" alt="Sponsor 5">
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
                <li><a href="index.php">Start</a></li>
                <li class="has-submenu">
                    <a href="#">Über uns</a>
                    <ul class="sub-menu">
                        <li><a href="team.php">Team</a></li>
                        <li><a href="geschichte.php">Geschichte</a></li>
                    </ul>
                </li>
                <li><a href="partner.php">Partner</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="kontakt.php">Kontakt</a></li>
            </ul>
        </nav>
    </div>
</header>

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
