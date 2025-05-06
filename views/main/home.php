<?php

$pageTitle = 'Startseite';

?>
<main>
<?php include __DIR__ . '/../template/hero-banner.php'; ?>
<?php //include __DIR__ . '/../template/animated_b7logo_3.php'; ?>

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
                'title' => 'Teaser 4',
                'url' => '/area/teaser4',
                'image'=> '/public/img/teaser/teaser4.jpg',
            ],
            [
                'title' => 'Teaser 5',
                'url' => '/area/teaser5',
                'image'=> '/public/img/teaser/teaser5.jpg',
            ],
            [
                'title' => 'Unsere Partner:innen',
                'url' => '/area/partner_innen',
                'image'=> '/public/img/teaser/teaser6.jpg',
            ]
        ];
        ?>
        <div class="teaser-container">
            <section class="teaser-3grid">
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

    <!-- <div class=teaser-container>
        <section id="teaser">
            <div id="teaser-box1" class="teaser-box">
                <a href="/area/vision">
                    <div class="teaser-box-content">Vision</div>
                </a>
            </div>
            <div id="teaser-box2" class="teaser-box">
                <a href="/area/das-projekt-erkunden">
                    <div class="teaser-box-content">Das Projekt erkunden</div>
                </a>
            </div>
            <div id="teaser-box3" class="teaser-box">
                <a href="/area/veranstaltungen">
                    <div class="teaser-box-content">Veranstaltungen</div>
                </a>
            </div>
            <div id="teaser-box4" class="teaser-box">
                <a href="/area/fotogalerie">
                    <div class="teaser-box-content">Fotogalerie</div>
                </a>
            </div>
            <div id="teaser-box5" class="teaser-box">
                <a href="/area/rundgang">
                    <div class="teaser-box-content">Virtueller Rundgang</div>
                </a>
            </div>
            <div id="teaser-box6" class="teaser-box">
                <a href="/area/kooperationspartner_innen">
                    <div class="teaser-box-content">Kooperationspartner:innen</div>
                </a>
            </div>
        </section>
    </div> -->
    

    
</main>


