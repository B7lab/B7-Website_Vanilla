<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Benutzerprofil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .profile-picture {
            width: 150px;
            height: 150px;
            background-color: #ccc;
            border-radius: 50%;
            margin: 0 auto 15px;
            background-size: cover;
            background-position: center;
        }
        .profile-info dt {
            width: 120px;
        }
        .profile-info dd {
            margin-left: 140px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="profile-header">
        <div class="profile-picture"
             style="background-image: url('<?php echo htmlspecialchars($user['profile_picture_url'] ?? "https://via.placeholder.com/150"); ?>');">
        </div>
        <h2><?php echo htmlspecialchars($user['username']); ?></h2>
        <p class="text-muted"><?php echo htmlspecialchars($user['profile_description'] ?? ""); ?></p>
    </div>

    <div class="row">
        <!-- Linke Spalte: Benutzerinfos -->
        <div class="col-md-6 profile-section">
            <h3>Profilinformationen</h3>
            <dl class="dl-horizontal profile-info">
                <dt>Benutzername:</dt>
                <dd><?php echo htmlspecialchars($user['username']); ?></dd>

                <dt>E-Mail:</dt>
                <dd><?php echo htmlspecialchars($user['email']); ?></dd>

                <dt>Geburtsdatum:</dt>
                <dd><?php echo htmlspecialchars($user['birthdate'] ?? ''); ?></dd>

                <dt>Ort:</dt>
                <dd><?php echo htmlspecialchars($user['location']); ?></dd>

                <dt>Mitglied seit:</dt>
                <dd><?php echo htmlspecialchars($user['joined_at']); ?></dd>

                <dt>Superkräfte:</dt>
                <dd>
                    <?php if (!empty($skills)): ?>
                        <ul>
                            <?php foreach ($skills as $skill): ?>
                                <li><?php echo htmlspecialchars($skill); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <em>Keine Superkräfte angegeben.</em>
                    <?php endif; ?>
                </dd>
            </dl>
        </div>

        <!-- Rechte Spalte: Maschinen / Geräte / Materialien -->
        <div class="col-md-6 profile-section">
            <h3>Eingebrachte Geräte & Materialien</h3>
            <?php if (!empty($contributions)): ?>
                <ul class="list-group equipment-list">
                    <?php foreach ($contributions as $item): ?>
                        <li class="list-group-item">
                            <strong><?php echo htmlspecialchars($item['name']); ?></strong>
                            <?php if (!empty($item['description'])): ?>
                                <br><small><?php echo htmlspecialchars($item['description']); ?></small>
                            <?php endif; ?>
                            <?php if (!empty($item['category'])): ?>
                                <span class="label label-info pull-right"><?php echo htmlspecialchars($item['category']); ?></span>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <em>Keine Geräte oder Materialien angegeben.</em>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
