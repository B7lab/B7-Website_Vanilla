const socket = io('http://wb.midnight-worker.de'); // Server URL

const canvas = document.getElementById('whiteboard');
const ctx = canvas.getContext('2d');
let drawing = false;

// Canvas auf die Bildschirmgröße setzen
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

// Funktion, um die Mausposition relativ zum Canvas zu berechnen
function getMousePosition(event) {
  const rect = canvas.getBoundingClientRect();
  const x = event.clientX - rect.left;
  const y = event.clientY - rect.top;
  return { x, y };
}

// Wenn der Benutzer die Maus drückt, neues Zeichnen starten
canvas.addEventListener('mousedown', (e) => {
  drawing = true;
  const pos = getMousePosition(e);
  ctx.beginPath();  // Neue Linie starten
  ctx.moveTo(pos.x, pos.y);  // Startposition setzen
});

// Wenn die Maus sich bewegt und gezeichnet wird
canvas.addEventListener('mousemove', (e) => {
  if (drawing) {
    const pos = getMousePosition(e);
    ctx.lineTo(pos.x, pos.y);
    ctx.stroke();
    // Sende die Zeichnungsdaten an den Server
    socket.emit('draw', {
      x: pos.x,
      y: pos.y,
      action: 'draw',
    });
  }
});

// Wenn die Maus losgelassen wird, stoppe das Zeichnen und beende die Linie
canvas.addEventListener('mouseup', () => {
  drawing = false;
  // Sende ein "drawEnd"-Signal, um eine saubere Trennung der Linien zu ermöglichen
  socket.emit('drawEnd');
});

// Wenn die Maus das Canvas verlässt (optional), stoppe das Zeichnen
canvas.addEventListener('mouseleave', () => {
  drawing = false;
  socket.emit('drawEnd');
});

// Zeichnungsdaten vom Server empfangen und auf dem Canvas zeichnen
socket.on('draw', (data) => {
  ctx.lineTo(data.x, data.y);
  ctx.stroke();
});

// Saubere Trennung der Linien, wenn das "drawEnd"-Signal empfangen wird
socket.on('drawEnd', () => {
  ctx.closePath(); // Schliesse die aktuelle Linie
});
