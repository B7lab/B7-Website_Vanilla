<style>
    #Anim-b7-logo {
        background-color: transparent;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        width: 1500px;
        height: 1100px;
        margin: 0 auto;
    }
    #landing-page-content {
        background-color: transparent;
    }
    .contennt-container {
        background-color: transparent;
    }
</style>
<canvas id="Anim-b7-logo"></canvas>
<script>
    const canvas = document.getElementById('Anim-b7-logo');
    const ctx = canvas.getContext('2d');
    canvas.width = 200;
    canvas.height = 200;
    const logo = new Image();
    logo.src = '/public/img/logo/logo_255x331.svg'; // Pfad zum Logo-Bild

    let angle = 0;
    let scale = 1;
    let direction = 1; // 1 für Vergrößern, -1 für Verkleinern

    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.save();
        ctx.translate(canvas.width / 2, canvas.height / 2);
        ctx.rotate(angle);
        ctx.scale(scale, scale);
        ctx.drawImage(logo, -logo.width / 2, -logo.height / 2);
        ctx.restore();

        angle += 0.01; // Rotationsgeschwindigkeit
        scale += direction * 0.01; // Skalierungsgeschwindigkeit

        if (scale >= 1.5 || scale <= 0.5) {
            direction *= -1; // Richtung umkehren
        }

        requestAnimationFrame(animate);
    }

    logo.onload = function() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        animate();
    };
    window.addEventListener('resize', function() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    });
</script>