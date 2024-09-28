<div class="header">
    <div class="general">
        <a href="<?= ($currentDir !== $baseDir) ? '?dir=' . urlencode(trim($parentDir, '/')) : '#'; ?>"
            class="back-btn <?= ($currentDir === $baseDir) ? 'disabled' : ''; ?>">
            <div class="back-icon">
                <img src="assets/icons/back.svg" alt="">
            </div>
        </a>
        <h2><?= ($currentDir === $baseDir) ? $appName : htmlspecialchars(basename($currentDir)); ?></h2>
    </div>

    <div class="options">
        <button id="newDirBtn"><img src="assets/icons/folder.svg"></button>
        <button id="uploadBtn"><img src="assets/icons/upload.svg"></button>
    </div>
</div>