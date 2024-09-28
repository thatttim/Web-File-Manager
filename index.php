<?php require_once 'controllers/general.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars(basename($currentDir)) ?></title>
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
    <div class="container <?= $appMode ?>">

        <div class="sidebar">
            <div class="sidebar-content">
                <?php require_once 'includes/sidebar.partial.php' ?>
            </div>
        </div>

        <div class="main-content">
            <?php require_once 'includes/header.partial.php' ?>
            <?php require_once 'includes/file-list.partial.php' ?>
            <?php require_once 'includes/breadcrumbs.partial.php' ?>
        </div>
    </div>

    <?php require_once 'includes/modals.partial.php'; ?>

    <script src="assets/js/app.js"></script>
    
</body>

</html>
