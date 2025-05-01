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
});


