<?php
function showInventory($id) {
    //session_start();
    if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != $id) {
        header("Location: /login");
        exit;
    }

    $pdo = getDatabaseConnection();

    $stmt = $pdo->prepare("    
            SELECT ii.id, c.name AS item_name, ii.condition, ii.location, ii.quantity,
            io.offer_type, io.price, io.rental_period, io.available_from, io.available_until
            FROM inventory_items ii
            LEFT JOIN contributions c ON ii.contribution_id = c.id
            LEFT JOIN item_offers io ON ii.id = io.item_id
            WHERE ii.owner_id = :user_id"
    );
    $stmt->execute(['user_id' => 1]);
    $inventory = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$inventory) {
        die("Benutzer nicht gefunden.");
    }

    render('user/inventar', [
        'title' => 'Benutzerprofil',
        'inventory' => $inventory
    ]);
}
