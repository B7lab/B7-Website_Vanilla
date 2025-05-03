<style>
    #Anim-b7-logo {
        background-color: transparent;
        opacity: 0.5;
        position: absolute;
        left: 50%;
        top: 200px;
        transform: translateX(-50%);
        width: 500px;
        height: 700px;
        margin: 0 auto;
        z-index: 1;
        pointer-events: none;
    }
</style>

<canvas id="Anim-b7-logo"></canvas>

<script>
    const canvas = document.getElementById('Anim-b7-logo');
    const ctx = canvas.getContext('2d');
    canvas.width = 500;
    canvas.height = 700;

    class Cell {

    }

    class Effect {
        constructor(canvas) {
            this.canvas = canvas;
            this.ctx = canvas.getContext('2d');
            this.width = canvas.width;
            this.height = canvas.height;
            this.cellWidth = this.width / 35;
            this.cellHeight = this.height / 55;
            this.cell = new Cell();
            this.cells = [];

            for (let i = 0; i < 100; i++) {
                const cell = new Cell();
                this.cells.push(cell);
            }
        }
    }

    const effect = new Effect(canvas);
    console.log(effect);

    const logo = new Image();
    logo.src = '/public/img/logo/logo_255x331.svg'; // Pfad zum Logo-Bild

    let angle = 0;
    let scale = 1;
    let direction = 1;

    ctx.rotate(angle);

    

    function animate() { 
        ctx.setTransform(1, 0, 0, 1, 0, 0);
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.scale(scale, scale);
        ctx.drawImage(logo, 0, 0, canvas.width, canvas.height);
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