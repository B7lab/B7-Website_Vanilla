<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ );
$dotenv->load();

require_once __DIR__ . '/config/database.php';

$mainRouter = new AltoRouter();
$mainRouter->setBasePath('');

$areaRouter = new AltoRouter();
$areaRouter->setBasePath('/area');

$userRouter = new AltoRouter();
$userRouter->setBasePath('/user');

$authRouter = new AltoRouter();
$authRouter->setBasePath('/auth');

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

define('ROOT_PATH', __DIR__);
require __DIR__ . '/routes/mainRoutes.php';
require __DIR__ . '/routes/areaRoutes.php';
require __DIR__ . '/routes/userRoutes.php';
require __DIR__ . '/routes/authRoutes.php';

$requestUri = $_SERVER['REQUEST_URI'];

if (str_starts_with($requestUri, '/area')) {
    $match = $areaRouter->match();
} else if (str_starts_with($requestUri, '/user')) {
    $match = $userRouter->match();
} else if (str_starts_with($requestUri, '/auth')) {
    $match = $authRouter->match();
} else {
    $match = $mainRouter->match();
}


if ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    http_response_code(404);
    echo "<h1>404</h1><p>Seite nicht gefunden.</p>";
}
