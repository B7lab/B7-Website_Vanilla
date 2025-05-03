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
        pointer-events: none;
    }
    #logo{
        display: none;
    }
    #landing-page-content {
        background-color: transparent;
    }
    .contennt-container {
        background-color: transparent;
    }
</style>

<canvas id="Anim-b7-logo"></canvas>
<img src="/public/img/logo/logo.png" id="logo">

<script>
    const canvas = document.getElementById('Anim-b7-logo');
    const ctx = canvas.getContext('2d');
    canvas.width = 500;
    canvas.height = 700;

    class Cell {
        constructor(effect, x, y) {
            this.effect = effect;
            this.x = x;
            this.y = y;
            this.width = this.effect.cellWidth;
            this.height = this.effect.cellHeight;
            this.image = document.getElementById('logo');
            this.slideX = Math.random() * 10;
            this.slideY = 0;
        }
        draw(context) {
            context.drawImage(this.image, this.x + this.slideX, this.y + this.slideY, this.width, this.height, this.x, this.y, this.width, this.height);
            context.strokeRect(this.x, this.y, this.width, this.height);
        }
        update() {
            this.slideX = Math.random() * 10;
        }
    }

    class Effect {
        constructor(canvas) {
            this.canvas = canvas;
            this.ctx = canvas.getContext('2d');
            this.width = this.canvas.width;
            this.height = this.canvas.height;
            this.cellWidth = this.width / 40;
            this.cellHeight = this.height / 45;
            this.cell = new Cell(this, 0, 0);
            this.imageGrid = [];
            this.createGrid();
            console.log(this.imageGrid);
        }
        createGrid(){
            for(let y = 0; y < this.height; y += this.cellHeight){
                for(let x = 0; x < this.width; x += this.cellWidth){
                    this.imageGrid.push(new Cell(this, x, y));
                }
            }       
        }
        render(context){
            this.imageGrid.forEach((cell, i) => {
                cell.update();
                cell.draw(context);
            });
        }
    }

    const effect = new Effect(canvas);

    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        effect.render(ctx);
        requestAnimationFrame(animate);
    }
    requestAnimationFrame(animate);

    window.addEventListener('resize', function() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    });
</script>