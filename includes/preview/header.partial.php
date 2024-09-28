<div class="header">
            <div class="general">
                <a href="javascript:history.back()" class="back-btn">
                    <div class="back-icon">
                        <img src="assets/icons/back.svg" alt="Back">
                    </div>
                </a>

                <h2><?= htmlspecialchars($parentDirName) ?> / <?= htmlspecialchars(basename($file)) ?></h2>
            </div>

            <div class="options">
                <!-- Add a direct download link to the button -->
                <a href="<?= htmlspecialchars($file) ?>" download>
                    <button id="download"><img src="assets/icons/folder.svg"></button>
                </a>
            </div>
        </div>