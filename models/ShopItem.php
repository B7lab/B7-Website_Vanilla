<?php
// File: models/ShopItem.php

require_once __DIR__ . '/../config/database.php';

class ShopItem {
    public static function getActiveItems() {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM shop_items WHERE is_active = 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById($id) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM shop_items WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function markAsSold($itemId, $userId, $paymentMethod) {
        $db = Database::getConnection();
        $stmt = $db->prepare("UPDATE shop_items SET is_active = 0, sold_to_user_id = :userId, payment_method = :paymentMethod WHERE id = :itemId");
        $stmt->bindParam(':itemId', $itemId);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':paymentMethod', $paymentMethod);
        return $stmt->execute();
    }
}
