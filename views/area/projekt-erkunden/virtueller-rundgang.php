<main>
    <?php
        $pageTitle = "Virtueller Rundgang";
        $pageSubtitle = "Entdecke unsere Arbeit und deine Möglichkeiten";
        include ROOT_PATH . '/views/template/page-banner.php'; 
    ?>
    <div class="content-container">
        <div id="hud" style="position: absolute; top: 10px; left: 10px; background-color: rgba(0, 0, 0, 0.5); color: white; padding: 10px; font-family: Arial, sans-serif; font-size: 14px;">
            <p><strong>Player Position:</strong> <span id="player-position">X: 0, Y: 0, Z: 0</span></p>
            <p><strong>Player Rotation:</strong> <span id="player-rotation">X: 0, Y: 0, Z: 0</span></p>
        </div>
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
        <script type="module" src="/public/js/ba1.js"></script>
    </div>  
</main>
