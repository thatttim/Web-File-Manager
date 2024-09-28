<?php require_once 'controllers/preview.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars(basename($file)) . " | " . $appName?></title>
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
    <div class="preview">
        <?php require_once 'includes/preview/header.partial.php' ?>

        <div class="preview-container">
            <!-- Display the image or video or download button -->
            <div id="content">
                <?php if (in_array($fileExtension, $validImageExtensions)): ?>
                    <img src="<?= htmlspecialchars($file) ?>" alt="Image" style="max-width:100%;">
                <?php elseif (in_array($fileExtension, $validVideoExtensions)): ?>
                    <video controls style="max-width:100%;">
                        <source src="<?= htmlspecialchars($file) ?>" type="video/<?= $fileExtension ?>">
                        Your browser does not support the video tag.
                    </video>
                <?php else: ?>
                    <div style="text-align:center;">
                        <a href="<?= htmlspecialchars($file) ?>" download>
                            <button style="padding: 10px 20px;">Download File</button>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Navigation buttons -->
        <div class="nav-buttons">
            <button id="prev-btn" data-file="<?= htmlspecialchars($previousFile) ?>"
                <?= $previousFile ? '' : 'disabled' ?>>Previous</button>

            <button id="next-btn" data-file="<?= htmlspecialchars($nextFile) ?>"
                <?= $nextFile ? '' : 'disabled' ?>>Next</button>
        </div>

    </div>

    <script>
        // Function to load content via AJAX
        function loadContent(file) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'preview.php?file=' + encodeURIComponent(file), true);
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    document.open();
                    document.write(xhr.responseText);
                    document.close();
                }
            };
            xhr.send();
        }

        // Handle next button click
        var nextBtn = document.getElementById('next-btn');
        if (nextBtn) {
            nextBtn.addEventListener('click', function() {
                var nextFile = this.getAttribute('data-file');
                if (nextFile) {
                    loadContent(nextFile);
                }
            });
        }

        // Handle previous button click
        var prevBtn = document.getElementById('prev-btn');
        if (prevBtn) {
            prevBtn.addEventListener('click', function() {
                var prevFile = this.getAttribute('data-file');
                if (prevFile) {
                    loadContent(prevFile);
                }
            });
        }

        // Handle arrow key navigation
        document.addEventListener('keydown', function(event) {
            if (event.key === 'ArrowRight' && nextBtn) {
                var nextFile = nextBtn.getAttribute('data-file');
                if (nextFile) {
                    loadContent(nextFile);
                }
            } else if (event.key === 'ArrowLeft' && prevBtn) {
                var prevFile = prevBtn.getAttribute('data-file');
                if (prevFile) {
                    loadContent(prevFile);
                }
            }
        });
    </script>

</body>

</html>