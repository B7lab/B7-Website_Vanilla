
<div class="container">
    <h1>Willkommen im Dashboard, <?= htmlspecialchars($user['username']) ?>!</h1>
    <p>Deine E-Mail: <?= htmlspecialchars($user['email']) ?></p>
    <p>Beigetreten am: <?= htmlspecialchars($user['joined_at']) ?></p><br>

    <h3>Deine Termine</h3>

    <?php if (empty($appointments)): ?>
        <p>Keine Termine eingetragen.</p>
    <?php else: ?>
        <ul>
        <?php foreach ($appointments as $appt): ?>
            <li>
                <strong><?= htmlspecialchars($appt['title'] ?? '(kein Titel)') ?></strong><br>
                <?= isset($appt['start']) ? date('d.m.Y H:i', strtotime($appt['start'])) : 'unbekannt' ?> –
                <?= isset($appt['end']) ? date('H:i', strtotime($appt['end'])) : 'unbekannt' ?><br>
                <?= nl2br(htmlspecialchars($appt['description'] ?? '')) ?>
            </li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <br>
</div>