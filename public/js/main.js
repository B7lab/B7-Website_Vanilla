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

    let hideTimeout;

    $("#join-button").hover(
        function () {
           clearTimeout(hideTimeout);
            $(".banner-btn-label").fadeIn(500);
        },
        function () {
           hideTimeout = setTimeout(function () {
                $(".banner-btn-label").fadeOut(500);
            }, 3000);
        }
    );   
    
    $("#donate-button").hover(
        function () {
           clearTimeout(hideTimeout);
            $(".banner-btn-label").fadeIn(500);
        },
        function () {
           hideTimeout = setTimeout(function () {
                $(".banner-btn-label").fadeOut(500);
            }, 3000);
        }
    );

    $(".banner-btn-label").fadeOut(500);

    // Burger Menu Toggle
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

    $(".burger-menu").click(function(){
        toggleMenu();
    });

    $(".burger-menu").hover(
        function () {
            toggleMenu();
        },
        function () {
            //toggleMenu();
        }
    );

    $("#mainMenu").hover(
        function () {
            //toggleMenu();
        },
        function () {
            toggleMenu();
        }
    );



});


