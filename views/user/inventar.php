<?php
$pdo = new PDO('mysql:host=localhost;dbname=b7;charset=utf8', 'root', ''); // ggf. Zugangsdaten anpassen

// Alle eigenen Items laden (z. B. für user_id = 1)
$stmt = $pdo->prepare("
    SELECT ii.id, c.name AS item_name, ii.condition, ii.location, ii.quantity,
           io.offer_type, io.price, io.rental_period, io.available_from, io.available_until
    FROM inventory_items ii
    LEFT JOIN contributions c ON ii.contribution_id = c.id
    LEFT JOIN item_offers io ON ii.id = io.item_id
    WHERE ii.owner_id = :user_id
");
$stmt->execute(['user_id' => 1]);
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Mein Inventar</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; }
    </style>
</head>
<body>
    <h1>Inventar von Benutzer 1</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Zustand</th>
                <th>Ort</th>
                <th>Menge</th>
                <th>Angebot</th>
                <th>Preis</th>
                <th>Verfügbar</th>
                <th>Aktion</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['item_name']) ?></td>
                    <td><?= htmlspecialchars($item['condition']) ?></td>
                    <td><?= htmlspecialchars($item['location']) ?></td>
                    <td><?= (int)$item['quantity'] ?></td>
                    <td><?= $item['offer_type'] === 'sale' ? 'Verkauf' : ($item['offer_type'] === 'rental' ? 'Verleih' : '-') ?></td>
                    <td><?= $item['price'] !== null ? number_format($item['price'], 2) . ' €' : '-' ?></td>
                    <td>
                        <?php if ($item['available_from']): ?>
                            <?= htmlspecialchars($item['available_from']) ?> bis <?= htmlspecialchars($item['available_until']) ?>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td><a href="bearbeiten.php?id=<?= $item['id'] ?>">Bearbeiten</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
