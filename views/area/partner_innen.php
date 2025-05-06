<main>
    <?php
        $pageTitle = "Unsere Kooperationspartner:innen";
        $pageSubtitle = "Wir sind ein Ort der Begegnung und des Austausches";
        include ROOT_PATH . '/views/template/page-banner.php'; 
    ?>

    <div class=content-container>
        <h2 class="block-heading">Vielen Dank für die Zusammenarbeit</h2>
        <p>
            An dieser Stelle wollen wir uns für die teilweise jahrelange Zusammenarbeit bedanken... [TEXT TEXT TEXT]
        </p>
        <?php
        $teasers = [
            [
                'title' => 'Kystlys',
                'url' => '/area/partner_innen/kystlys',
                'image'=> '/public/img/area/partner_innen/kystlys.png',
            ],
            [
                'title' => 'Waldritter',
                'url' => '/area/partner_innen/waldritter',
                'image'=> '/public/img/area/partner_innen/waldritter.jpg',
            ],
            [
                'title' => 'Skulpturengarten',
                'url' => '/area/partner_innen/kulturengarten',
                'image'=> '/public/img/area/partner_innen/teaser3.jpg',
            ],
            [
                'title' => 'c3re',
                'url' => '/area/partner_innen/c3re',
                'image'=> '/public/img/area/partner_innen/c3re.png',
            ],
            [
                'title' => 'Teaser 5',
                'url' => '/area/partner_innen/teaser5',
                'image'=> '/public/img/area/partner_innen/teaser5.jpg',
            ],
            [
                'title' => 'Teaser 6',
                'url' => '/area/partner_innen/teaser6',
                'image'=> '/public/img/area/partner_innen/teaser6.jpg',
            ]
        ];
        ?>
        <div class="teaser-container">
            <section class="teaser-4grid">
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