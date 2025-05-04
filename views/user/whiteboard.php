<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Whiteboard</title>
  <style>
    html, body, canvas {
      margin: 0;
      padding: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
    }
  </style>
</head>
<body>
  <canvas id="board"></canvas>
  <script>
    const canvas = document.getElementById('board');
    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    const ws = new WebSocket('ws://localhost:8080');

    let drawing = false;

    canvas.addEventListener('mousedown', e => {
      drawing = true;
      sendDraw(e);
    });

    canvas.addEventListener('mousemove', e => {
      if (drawing) sendDraw(e);
    });

    canvas.addEventListener('mouseup', () => drawing = false);
    canvas.addEventListener('mouseleave', () => drawing = false);

    function sendDraw(e) {
      const pos = { x: e.clientX, y: e.clientY };
      ws.send(JSON.stringify({ type: 'draw', pos }));
      draw(pos); // lokal zeichnen
    }

    function draw({ x, y }) {
      ctx.fillStyle = 'black';
      ctx.beginPath();
      ctx.arc(x, y, 2, 0, Math.PI * 2);
      ctx.fill();
    }

    ws.onmessage = msg => {
      const data = JSON.parse(msg.data);
      if (data.type === 'draw') draw(data.pos);
    };
  </script>
</body>
</html>
