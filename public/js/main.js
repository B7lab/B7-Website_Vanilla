$(document).ready(function () {
    // DESIGN
    const colors = [
        "var(--technikblau)",
        "var(--signalrot)",
        "var(--b7-gelb)",
        "var(--zukunftsgruen)"
    ];

    const markerClasses = [
        "marker-blau",
        "marker-rot",
        "marker-gelb",
        "marker-gruen"
    ];

    // Content Container

    $(".block-heading").each(function (index) {
        const color = colors[index % colors.length];
        const box = $("<span></span>")
        .addClass("color-box")
        .css("background-color", color);
        
        $(this).prepend(box);
    });

    $(".content-container li").each(function (index) {
        const markerClass = markerClasses[index % markerClasses.length];
        $(this).addClass(markerClass);
    });


    // Banner Button become Member and Donate

    function setupSlideButton(buttonSelector, iconWidth = 30) {
        const button = document.querySelector(buttonSelector);
        if (!button) return;

        // Verzögert ausführen, damit offsetWidth gültig ist
        requestAnimationFrame(() => {
            const buttonWidth = button.offsetWidth;
            const hiddenX = buttonWidth - iconWidth;

            // Startposition
            gsap.set(button, {
                x: 0
            });

            gsap.to(button, {
                x: hiddenX,
                delay: 1,
                duration: 0.5,
                ease: "power2.out"
            });

            button.addEventListener("mouseenter", () => {
                gsap.to(button, {
                    x: 0,
                    duration: 0.4,
                    ease: "power2.out"
                });
            });

            button.addEventListener("mouseleave", () => {
                gsap.to(button, {
                    x: hiddenX,
                    duration: 0.4,
                    ease: "power2.in"
                });
            });
        });
    }

    setupSlideButton("#join-button", 30);
    setupSlideButton("#donate-button", 30);


    // BURGER MENU
    function toggleMenu() {
        const menu = document.getElementById('mainMenu');
        const burgerIcon = document.querySelector('.burger-menu');
        const burgerLines = document.querySelectorAll('.burger-menu div'); 

        const menuDuration = 0.5; // Synchronisierter Zeitwert

        if (!menu.classList.contains('open')) {
            // Menü öffnen
            gsap.to(menu, {
                right: 0,
                duration: menuDuration,
                ease: "power2.out",
            });

            // Linienfarbe: weiß → kohlenschwarz
            gsap.to(burgerLines, {
                backgroundColor: "var(--kohlenschwarz)",
                duration: menuDuration,
                ease: "power2.out"
            });

            menu.classList.add('open');
            burgerIcon.classList.add('open');
        } else {
            // Menü schließen
            gsap.to(menu, {
                right: '-100%',
                duration: menuDuration,
                ease: "power2.in",
            });

            // Linienfarbe: kohlenschwarz → weiß
            gsap.to(burgerLines, {
                backgroundColor: "white",
                duration: menuDuration,
                ease: "power2.in"
            });

            menu.classList.remove('open');
            burgerIcon.classList.remove('open');
        }
    }


    document.querySelector('.burger-menu').addEventListener('click', toggleMenu);

    document.querySelectorAll('.has-submenu').forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            this.classList.toggle('open');
        });
    });

    $(".menu-list > li > a").each(function(index) {
        const color = colors[index % colors.length];

        const box = $("<span></span>")
            .addClass("color-box")
            .css({
                "background-color": color,
                "width": "8px",
                "height": "8px",
                "opacity": "1",
                "margin-right": "8px",
                "transition": "all 0.3s ease",
                "box-shadow": "0 4px 8px rgba(0, 0, 0, 0.1)",
                "position": "relative",
                "left": "-10px",
                "top": "0.2rem"
            });

        const linkText = $(this).contents();
        $(this).empty().append(box).append(linkText);

        $(this).on("mouseenter", function () {
            box.css({
                "width": "32px",
                "height": "32px",
                "opacity": "1"
            });
        });

        $(this).on("mouseleave", function () {
            box.css({
                "width": "8px",
                "height": "8px",
                "opacity": "1"
            });
        });
    });

});


