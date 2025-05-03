<?php
$userRouter->map('GET', '/', function() {
    render('user/dashboard');
});

$userRouter->map('GET', '/[i:id]', function($id) {
    require_once __DIR__ . '/../controller/userController.php';
    showUserProfile($id);
});

$userRouter->map('GET', '/[i:id]/dashboard', function($id) {
    require_once __DIR__ . '/../controller/userController.php';
    showDashboard($id);
});

$userRouter->map('GET', '/[i:id]/inventar', function($id) {
    require_once __DIR__ . '/../controller/inventoryController.php';
    showInventory($id);
});

$userRouter->map('GET', '/[i:id]/shop', function($id) {
    require_once __DIR__ . '/../controller/shopController.php';
    showShop($id);
});

$userRouter->map('GET', '/[i:id]/calendar', function($id) {
    require_once __DIR__ . '/../controller/calendarController.php';
    showCalendar($id);
});





