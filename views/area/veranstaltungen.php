<main>
    <?php
        $pageTitle = "Veranstaltungen";
        $pageSubtitle = "Wir sind ein Ort der Begegnung und des Austausches";
        include ROOT_PATH . '/views/template/page-banner.php'; 
    ?>

    <div class=content-container>
        <div id="calendar"></div>
        <script src="https://unpkg.com/ical.js@1.4.0/build/ical.min.js"></script>
        <script src="/public/js/calendar.js"></script>
    </div>
    
</main>