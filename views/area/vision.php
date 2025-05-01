<main>
    <?php
        $pageTitle = "Unsere Vision";
        $pageSubtitle = "Wir sind ein Ort der Begegnung und des Austausches";
        include __DIR__ . '/../template/page-banner.php'; 
    ?>

    <div class=content-container>
        <p>
            <canvas class="webgl"></canvas>
        </p>
    </div>
    
</main>
<style>
    body { margin: 0; overflow: hidden; }
    canvas { display: block; }
</style>
<script type="importmap">
    {
        "imports": {
            "three": "/public/libs/three.js/build/three.module.min.js"
        }
    }
</script> 
<script type="module" src="/public/js/ironman.js"></script>