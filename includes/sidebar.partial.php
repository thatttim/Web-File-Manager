<div class="sidebar-list">
    <?php foreach ($baseDirDirs as $dir): ?>
        <div class="sidebar-folder <?= isCurrentOrParentDir($dir, $currentDir) ? 'active' : ''; ?>">
            <a href="<?= generateDirUrl($baseDir, basename($dir), $baseDir); ?>">
                <div class="filename">
                    <img src="assets/icons/folder.png">

                    <?= htmlspecialchars(basename($dir)); ?>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>