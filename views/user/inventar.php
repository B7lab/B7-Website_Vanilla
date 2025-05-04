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
