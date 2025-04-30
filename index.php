<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';

$router = new AltoRouter();
$router->setBasePath(''); // falls dein Projekt unter /area liegt

function render($view, $data = []) {
    extract($data);
    $viewFile = __DIR__ . "/views/$view.php";

    if (!file_exists($viewFile)) {
        http_response_code(500);
        echo "View $view nicht gefunden";
        return;
    }

    include __DIR__ . "/views/template/layout.php";
}

// Route-Dateien einbinden
require __DIR__ . '/routes/mainRoutes.php';
require __DIR__ . '/routes/areaRoutes.php';

// Routing starten
$match = $router->match();

if ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    http_response_code(404);
    echo "<h1>404</h1><p>Seite nicht gefunden.</p>";
}
