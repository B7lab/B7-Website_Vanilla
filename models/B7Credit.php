<?php
// File: models/B7Credit.php

require_once __DIR__ . '/../config/database.php';

class B7Credit {
    public static function getCredits($userId) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT credits FROM b7_credits WHERE user_id = :userId");
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['credits'] : 0;
    }

    public static function deductCredits($userId, $amount) {
        $db = Database::getConnection();
        $credits = self::getCredits($userId);
        
        if ($credits >= $amount) {
            $newCredits = $credits - $amount;
            $stmt = $db->prepare("UPDATE b7_credits SET credits = :newCredits WHERE user_id = :userId");
            $stmt->bindParam(':newCredits', $newCredits);
            $stmt->bindParam(':userId', $userId);
            return $stmt->execute();
        }
        
        return false; // Nicht genug Credits
    }
}
