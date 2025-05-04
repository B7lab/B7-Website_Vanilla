const express = require('express');
const http = require('http');
const socketIo = require('socket.io');

// Erstelle die Express-App
const app = express();

// Erstelle den HTTP-Server mit Express
const server = http.createServer(app);

// Initialisiere Socket.IO auf dem HTTP-Server
const io = socketIo(server);

// Serve statische Dateien (z.B. die Whiteboard-HTML-Datei)
app.use(express.static('public'));

// Verbindungsereignis: Wenn sich ein Client verbindet
io.on('connection', (socket) => {
  console.log('Neuer Client verbunden:', socket.id);

  // Wenn ein Client zeichnet, senden wir die Zeichnung an alle anderen
  socket.on('draw', (data) => {
    // Alle anderen Clients benachrichtigen
    socket.broadcast.emit('draw', data);
  });

  socket.on('disconnect', () => {
    console.log('Client getrennt:', socket.id);
  });
});

// Starte den HTTP-Server und Socket.IO auf Port 8181
server.listen(8181, () => {
  console.log('Server läuft auf http://localhost:8181');
});
