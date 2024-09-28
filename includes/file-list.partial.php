<div class="file-list">
    <?php foreach ($files as $file): ?>
        <div class="row">
            <a href="<?= is_dir($currentDir . '/' . $file)
                            ? generateDirUrl($baseDir, $file, $currentDir)
                            : 'preview?file=' . $appFolder . str_replace($baseDir, '', $currentDir) . '/' . $file; ?>">
                <?php if (is_dir($currentDir . '/' . $file)): ?>
                    <div class="filename">
                        <img src="assets/icons/folder.png" alt="">
                        <?= htmlspecialchars($file); ?>
                    </div>
                <?php else: ?>
                    <div class="filename">
                        <?php
                        $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
                        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];
                        if (in_array(strtolower($fileExtension), $imageExtensions)): ?>
                            <img class="preview-image" src="<?= $appFolder . str_replace($baseDir, '', $currentDir) . '/' . $file; ?>" alt="Image">
                        <?php else: ?>
                            <img src="assets/icons/file.png" alt="">
                        <?php endif; ?>
                        <?= htmlspecialchars($file); ?>
                    </div>
                <?php endif; ?>
            </a>

            <div>
                <div class="dropdown">
                    <button class="three-dots-btn">⋮</button>
                    <div class="dropdown-content">
                        <?php if (is_dir($currentDir . '/' . $file)): ?>
                            <button class="renameBtn" data-file="<?= htmlspecialchars($file); ?>">Rename Folder</button>
                            <button class="deleteBtn" data-file="<?= htmlspecialchars($file); ?>">Delete Folder</button>
                        <?php else: ?>
                            <button class="renameBtn" data-file="<?= htmlspecialchars($file); ?>">Rename File</button>
                            <button class="deleteBtn" data-file="<?= htmlspecialchars($file); ?>">Delete File</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>