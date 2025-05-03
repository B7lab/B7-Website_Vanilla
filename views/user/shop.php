<?php
// File: views/user/shop.php
// Anzeigen der Artikel im Shop und des Guthabens für b7-Credits

if (empty($items)) {
    echo "<p>Es gibt derzeit keine verfügbaren Artikel.</p>";
} else {
    echo "<h1>Shop</h1>";
    echo "<p>Verfügbares Guthaben: " . $userCredits . " b7-Credits</p>";

    foreach ($items as $item) {
        echo "<div class='shop-item'>";
        echo "<h2>" . htmlspecialchars($item['name']) . "</h2>";
        echo "<p>" . htmlspecialchars($item['description']) . "</p>";
        echo "<p>Preis: " . htmlspecialchars($item['price']) . " EUR</p>";
        echo "<p>Verfügbar bis: " . htmlspecialchars($item['available_until']) . "</p>";
        
        // Formular für den Kauf
        echo "<form action='/shop/buy' method='POST'>";
        echo "<input type='hidden' name='item_id' value='" . $item['id'] . "'>";
        echo "<label>Bezahle mit:</label>";
        echo "<select name='payment_method'>
                <option value='CREDITS'>b7-Credits</option>
                <option value='EUR'>PayPal</option>
              </select>";
        echo "<button type='submit'>Kaufen</button>";
        echo "</form>";
        echo "</div>";
    }
}
?>
<br><br>
