<?php

$pageTitle = 'Startseite';

?>
<main>
<?php include __DIR__ . '/../template/hero-banner.php'; ?>
    <div class="content-container" id="landing-page-content">
        <h2>Überschrift Einstieg</h2>
        <p>
            Das Industriedenkmal der ehemaligen Zeche Blumenthal 7 verwandelt sich Schritt für Schritt zu einem
            lebendigen Ort für eine bunte Palette an interessierten Menschen.
        </p>
        <br>
        <p>
            <b>Auf vielfältige Art und Weise darfst auch du dich gerne einbringen.</b>
        </p>
        <?php
        $teasers = [
            [
                'title' => 'Unsere Vision',
                'url' => '/area/vision',
                'image'=> '/public/img/teaser/teaser1.jpg',
            ],
            [
                'title' => 'Entdecke das Projekt',
                'url' => '/area/projekt-erkunden',
                'image'=> '/public/img/teaser/teaser2.jpg',
            ],
            [
                'title' => 'Veranstaltungen',
                'url' => '/area/veranstaltungen',
                'image'=> '/public/img/teaser/teaser3.jpg',
            ],
            [
                'title' => 'Unsere Partner:innen',
                'url' => '/area/partner_innen',
                'image'=> '/public/img/teaser/teaser6.jpg',
            ]
        ];
        ?>
        <div class="teaser-container">
            <section class="teaser-2grid">
                <?php foreach ($teasers as $teaser): ?>
                    <div class="teaser-box">
                        <a href="<?= htmlspecialchars($teaser['url']) ?>">
                            <img src="<?= htmlspecialchars($teaser['image']) ?>" alt="" class="teaser-image">
                            <div class="teaser-box-content"><?= htmlspecialchars($teaser['title']) ?></div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </section>
        </div>
    </div>

    
    
</main>


