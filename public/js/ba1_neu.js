import * as THREE from "../libs/three.js/build/three.module.min.js";

import { OrbitControls } from "../libs/three.js/examples/jsm/controls/OrbitControls.js";
import { GLTFLoader } from "../libs/three.js/examples/jsm/loaders/GLTFLoader.js";

// Szene, Kamera, Renderer
const scene = new THREE.Scene();
scene.background = new THREE.Color(0xe0e0e0);
const camera = new THREE.PerspectiveCamera(60, window.innerWidth / window.innerHeight, 0.1, 1000);
camera.position.set(5, 5, 10);

const renderer = new THREE.WebGLRenderer({ antialias: true });
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.appendChild(renderer.domElement);

// Licht
const ambientLight = new THREE.AmbientLight(0xffffff, 0.6);
scene.add(ambientLight);
const directionalLight = new THREE.DirectionalLight(0xffffff, 0.6);
directionalLight.position.set(10, 10, 10);
scene.add(directionalLight);

// Modell laden
const collidables = [];

const loader = new GLTFLoader();
loader.load('/public/img/ba1.glb', function (gltf) {
  const model = gltf.scene;

  // 1. Modell-Ausrichtung (falls es auf dem Kopf steht)
  model.rotation.x = Math.PI;
  model.scale.x *= -1;

  // 2. Modell-Position relativ zum Spieler:
  // Direkt 3 Einheiten vor dem Spieler
  const distance = 3;
  const direction = new THREE.Vector3(0, 0, 0); // Blickrichtung
  direction.applyEuler(player.rotation); // Aktuelle Ausrichtung des Spielers

  // Zielposition berechnen
  const position = new THREE.Vector3().copy(player.position).addScaledVector(direction, distance);

  // In Augenhöhe platzieren (z. B. +1.5 auf Y)
  position.y += -50; //Kopfhöhe
  position.x += 50;
  position.z += 200;
  
  // Kamera nach links ausrichten (90 Grad nach links drehen und 5 Einheiten nach links verschieben)
  camera.position.copy(position);
  camera.rotation.y -= 1 * Math.PI / 180; // 90 Grad nach links drehen
  camera.position.x -= 30; // 5 Einheiten nach links verschieben
  camera.position.z -= 10; // 5 Einheiten nach links verschieben

  // Die Kamera bleibt auf den Spieler ausgerichtet
  camera.lookAt(player.position);

  gltf.scene.traverse((child) => {
    if (child.isMesh) {
      child.geometry.computeBoundingBox(); // wichtig
      collidables.push(child);
    }
  });

  // Koordinatenachsen (X, Y, Z) anzeigen
  const axesHelper = new THREE.AxesHelper(5); // 5 ist die Länge der Achsen
  scene.add(axesHelper);

  model.position.copy(position);
  scene.add(model);


}, undefined, function (error) {
  console.error('Fehler beim Laden:', error);
});

const move = {
  forward: false,
  backward: false,
  left: false,
  right: false,
  rotLeft: false,
  rotRight: false,
};

document.addEventListener('keydown', (e) => {
  switch (e.code) {
    case 'KeyW': move.forward = true; break;
    case 'KeyS': move.backward = true; break;
    case 'KeyA': move.left = true; break;
    case 'KeyD': move.right = true; break;
    case 'ArrowLeft': move.rotLeft = true; break;
    case 'ArrowRight': move.rotRight = true; break;
  }
});

document.addEventListener('keyup', (e) => {
  switch (e.code) {
    case 'KeyW': move.forward = false; break;
    case 'KeyS': move.backward = false; break;
    case 'KeyA': move.left = false; break;
    case 'KeyD': move.right = false; break;
    case 'ArrowLeft': move.rotLeft = false; break;
    case 'ArrowRight': move.rotRight = false; break;
  }
});

  const player = new THREE.Object3D();
  player.position.set(0, -10, 0);
  player.rotation.y = -135 * Math.PI / 180; // Spieler schaut nach vorne

  scene.add(player);
  
  // PitchObject für vertikale Kamerabewegung
  const pitchObject = new THREE.Object3D();
  pitchObject.position.set(0, 1.5, 0); // Augenhöhe
  pitchObject.rotation.x = 0;
  player.add(pitchObject);

  // Kamera im PitchObject
  camera.position.set(0, 0, 0);
  pitchObject.add(camera);
  
  let keys = { forward: false, backward: false };
  let yaw = 0;      
  let pitch = 0;
  const pitchLimit = Math.PI / 2 - 0.1; // max. ±90° mit etwas Spielraum
  
  let lastMouseX = null;
  let lastMouseY = null;
  let isHovering = false;
  const speed = 2; // <-- Schneller!
  const forwardSpeed = 0.2; // für W/S
  const sidespeed = 0.05;  // für A/D
  
  // Tastatursteuerung
  document.addEventListener('keydown', (e) => {
    if (e.code === 'KeyW') keys.forward = true;
    if (e.code === 'KeyS') keys.backward = true;
    if (e.code === 'KeyA') keys.left = true;
    if (e.code === 'KeyD') keys.right = true;
  });
  document.addEventListener('keyup', (e) => {
    if (e.code === 'KeyW') keys.forward = false;
    if (e.code === 'KeyS') keys.backward = false;
    if (e.code === 'KeyA') keys.left = false;
    if (e.code === 'KeyD') keys.right = false;
  });
  

  // Maussteuerung Pointer Lock
  renderer.domElement.addEventListener('click', () => {
    renderer.domElement.requestPointerLock();
  });


  document.addEventListener('pointerlockchange', () => {
    if (document.pointerLockElement === renderer.domElement) {
      document.addEventListener('mousemove', onMouseMove, false);
    } else {
      document.removeEventListener('mousemove', onMouseMove, false);
    }
  });


  window.addEventListener('mousemove', (e) => {
    if (lastMouseX !== null && lastMouseY !== null) {
      const deltaX = e.movementX || 0;
      const deltaY = e.movementY || 0;
  
      yaw -= deltaX * 0.005;
      pitch -= deltaY * 0.005;
  
      const pitchLimit = Math.PI / 2 - 0.1;
      pitch = Math.max(-Math.PI / 2, Math.min(Math.PI / 2, pitch));
  
      player.rotation.y = yaw;
      pitchObject.rotation.x = pitch;
    }
  
    lastMouseX = e.clientX;
    lastMouseY = e.clientY;
  });


  // Kollision deaktivieren (beispielsweise durch 'C'-Taste)
  document.addEventListener('keydown', (e) => {
    if (e.code === 'KeyC') {
      collisionEnabled = !collisionEnabled; // Schaltet zwischen aktiviert und deaktiviert um
      console.log(`Kollisionserkennung: ${collisionEnabled ? 'Aktiviert' : 'Deaktiviert'}`);
    }
  } );

  function checkCollision(position) {
    const playerBox = new THREE.Box3().setFromCenterAndSize(
      position.clone().add(new THREE.Vector3(0, 1, 0)), // Y etwas anheben, je nach Modellhöhe
      new THREE.Vector3(1, 2, 1) // Breite, Höhe, Tiefe des Spielers anpassen
    );
    if(!collisionEnabled) {
      for (const obj of collidables) {
        const objectBox = obj.geometry.boundingBox.clone();
        objectBox.applyMatrix4(obj.matrixWorld);
        
        if (playerBox.intersectsBox(objectBox)) {
          return true; // Kollidiert
        }
      }
    }
  
    return false;
  }

  const raycaster = new THREE.Raycaster();
  const collisionDistance = 0.5;
  let collisionEnabled = true; // Standardmäßig aktiviert

  
  // Animation / Spiel-Loop
  function animate() {
    requestAnimationFrame(animate);
  
    const dir = new THREE.Vector3();
  
    if (keys.forward) dir.z -= forwardSpeed;
    if (keys.backward) dir.z += forwardSpeed;
    if (keys.left) dir.x -= sidespeed;
    if (keys.right) dir.x += sidespeed;
  
    // Kollisionsabfrage
    if (dir.length() > 0) {
      dir.normalize().applyEuler(player.rotation);
  
      const nextPosition = player.position.clone().addScaledVector(dir, speed);
  
    
      if (!checkCollision(nextPosition)) {
        player.position.copy(nextPosition);
      }
      
    }
  
    const position = player.position;
    const rotation = player.rotation;
  
    // Formatieren der Position und Rotation
    const positionText = `X: ${position.x.toFixed(2)}, Y: ${position.y.toFixed(2)}, Z: ${position.z.toFixed(2)}`;
    const rotationText = `X: ${(rotation.x * (180 / Math.PI)).toFixed(2)}°, Y: ${(rotation.y * (180 / Math.PI)).toFixed(2)}°, Z: ${(rotation.z * (180 / Math.PI)).toFixed(2)}°`;
  
    // Setze die Werte in das HUD
    document.getElementById('player-position').innerText = positionText;
    document.getElementById('player-rotation').innerText = rotationText;

    //pitchObject.rotation.x = 1;
    //camera.position.set(1, 1, 2); // Abstand von hinten
    camera.lookAt(player.position);
  
    renderer.render(scene, camera);

  }
  animate();
  

// Responsive
window.addEventListener('resize', () => {
  camera.aspect = window.innerWidth / window.innerHeight;
  camera.updateProjectionMatrix();
  renderer.setSize(window.innerWidth, window.innerHeight);
});