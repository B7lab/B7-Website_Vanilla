<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Beitragstitel - Mein Blog</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <!-- Beitrag -->
    <main class="container" id="post-content">
        <article>
            <header class="post-header">
                <h1>Beitragstitel</h1>
                <p class="post-meta">Veröffentlicht am <time datetime="2025-01-23">23. Januar 2025</time> von <a href="#author">Damian Schumacher</a></p>
            </header>

            <figure class="post-image">
                <img src="assets/img/beispielbild.jpg" alt="Titelbild für den Beitrag">
                <figcaption>Bildbeschreibung oder Urheberrechtshinweis</figcaption>
            </figure>

            <section class="post-body">
                <p>Dies ist ein Beispieltext für einen Blogbeitrag. Hier kann der eigentliche Inhalt des Artikels eingefügt werden.</p>
                <h2>Zwischenüberschrift</h2>
                <p>Weitere Inhalte des Beitrags. Hier können Bilder, Zitate oder Listen eingefügt werden.</p>
                <blockquote>
                    <p>"Das ist ein Beispiel für ein Zitat."</p>
                    <footer>– Name des Zitierten</footer>
                </blockquote>
                <ul>
                    <li>Punkt 1</li>
                    <li>Punkt 2</li>
                    <li>Punkt 3</li>
                </ul>
            </section>

            <footer class="post-footer">
                <p>Kategorie: <a href="#kategorie">Webentwicklung</a></p>
                <p>Tags: <a href="#tag-html">HTML</a>, <a href="#tag-css">CSS</a>, <a href="#tag-design">Design</a></p>
            </footer>
        </article>
    </main>

    <?php include 'footer.php'; ?>
    
</body>

</html>
